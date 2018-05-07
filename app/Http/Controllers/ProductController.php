<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Bill;
use App\Sale;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        $products_new = Product::orderBy('created_at', 'desc')->get();
        return view('shop.index', [
            'products' => $products,
            'products_new' => $products_new,
        ]);
    }

    public function getAddToCart(Request $request, $id)
    {
        if(session()->has('id')) {
            $product = Product::find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id);

            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
        else{
            return redirect()->route('product.index');
        }
    }

    public function getReduceByOne($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->reduceByOne($id);

            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
            return redirect()->route('product.shoppingCart');
        }
    }

    public function getRemoveItem($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);

            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
            return redirect()->route('product.shoppingCart');
        }
    }

    public function getCart()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            if (!Session::has('cart')) {
                return view('shop.shopping-cart', [
                    'product' => null
                ]);
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('shop.shopping-cart', [
                'products' => $cart->items,
                'totalPrice' => $cart->totalPrice
            ]);
        }
    }

    public function getCheckout()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            if (!Session::has('cart')) {
                return view('shop.shopping-cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            foreach ($cart->items as $c) {
                $product_id = $c['item']['id'];
                $amount = $c['qty'];
                $product = Product::find($product_id);
                $quantity = $product->quantity;
                $product->quantity = $quantity - $amount;
                if ($product->quantity < 0) {
                    $message = "ร้านค้ามี " . $product->title . " เหลือเพียง " . $quantity . " ชิ้น";
                    return redirect()->route('product.shoppingCart')->with('empty', $message);
                }
            }
            return view('shop.checkout');
        }
    }

    public function getCancelCart()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            if (!Session::has('cart')) {
                return view('shop.shopping-cart');
            }
            Session::forget('cart');
            return redirect()->back();
        }
    }

    public function postCheckout(Request $request)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            if (!Session::has('cart')) {
                return redirect()->route('product.shopping-cart');
            }

            $id = (session()->get('id'))[0]['id'];

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            $message = "สั่งซื้อเสร็จสิ้น กรุณายืนยันการโอนเงินที่ประวัติการสั่งซื้อ";
            $bill = [
                'status' => 0,
                'amount' => $cart->totalPrice,
                'user_id' => $id,
                'address' => $request->input('address')
            ];
            Bill::create($bill);

            $bill = Bill::all();
            $bill_count = Bill::all()->count();
            $bill_id = $bill[$bill_count - 1]['id'];


            foreach ($cart->items as $c) {
                $product_id = $c['item']['id'];
                $amount = $c['qty'];
                $totalprice = $c['price'];
                $sale = [
                    'bill_id' => $bill_id,
                    'product_id' => $product_id,
                    'amount' => $amount,
                    'totalprice' => $totalprice
                ];

                $product = Product::find($product_id);
                $quantity = ($product->quantity) - $amount;
                $product->quantity = $quantity;
                $product->save();

                Sale::create($sale);
            }
            Session::forget('cart');
            return redirect()->route('product.index')->with('success', $message);
        }
    }

    public function getSearch(Request $request)
    {
        $search = $request->search;
        $products = Product::where( 'title', 'LIKE', '%'.$search.'%')->paginate(15);
        $result = Product::where( 'title', 'LIKE', '%'.$search.'%')->count();
        return view('shop.search', [
                'products' => $products,
                'search' => $search,
        ]);
    }

    public function getPageCategory()
    {
        $categories = Category::all();
        return view('shop.categories', [
            'categories' => $categories
        ]);
    }

    public function getCategoryByType($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id)->paginate(15);;
        return view('shop.categoryOne',[
            'category' => $category,
            'products' => $products
        ]);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('shop.product', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function getTransfer($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            $bill = Bill::find($id);
            return view('shop.accept-transfer', [
                'bill' => $bill
            ]);
        }
    }

    public function postTransfer(Request $request)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else {
            $bill_id = $request->input('bill_id');
            $bill = Bill::find($bill_id);

            if ($request->hasFile('imgPath')) {
                $image_filename = $request->file('imgPath')->getClientOriginalName();
                $image_name = date("Ymd-His") . $image_filename;
                $public_path = '/img/bills/';
                $destination = base_path() . "/public/" . $public_path;
                $request->file('imgPath')->move($destination, $image_name);
                $bill->imgPath = $public_path . $image_name;
                $bill->status = 1;
                $bill->save();
                return redirect()->route('product.index')->with('success', 'ยืนยันการโอนเงินเรียบร้อย');
            }
            return redirect()->back();
        }
    }

    public function getShowProduct()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $products = Product::all();
            $products_alert = Product::where('quantity', '<', 5)->get();
            return view('admin.show_product', [
                'products' => $products,
                'products_alert' => $products_alert
            ]);
        }
    }

    public function getCreateProduct(){
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $categories = Category::all();
            return view('admin.create', [
                'categories' => $categories
            ]);
        }
    }

    public function postCreateProduct(Request $request){
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $data = $request->all();

            if ($request->hasFile('img1')) {
                $image_filename = $request->file('img1')->getClientOriginalName();

                $image_name = date("Ymd-His") . $image_filename;
                $public_path = '/img/products/';
                $destination = base_path() . "/public/" . $public_path;
                $request->file('img1')->move($destination, $image_name);
                $data['img1'] = $public_path . $image_name;
            }
            if ($request->hasFile('img2')) {
                $image_filename = $request->file('img2')->getClientOriginalName();
                $image_name = date("Ymd-His") . $image_filename;
                $public_path = '/img/products/';
                $destination = base_path() . "/public/" . $public_path;
                $request->file('img2')->move($destination, $image_name);
                $data['img2'] = $public_path . $image_name;
            }
            if ($request->hasFile('img3')) {
                $image_filename = $request->file('img3')->getClientOriginalName();
                $image_name = date("Ymd-His") . $image_filename;
                $public_path = '/img/products/';
                $destination = base_path() . "/public/" . $public_path;
                $request->file('img3')->move($destination, $image_name);
                $data['img3'] = $public_path . $image_name;
            }

            $category = $request->input('category_id');
            $categories = Category::all();
            foreach ($categories as $cate) {
                if ($cate->type == $category) {
                    $data['category_id'] = $cate->id;
                }
            }
            Product::create($data);

            return redirect()->route('admin.showProduct')->with('message', 'เพิ่มสินค้าเรียบร้อย');
        }
    }

    public function getEditProduct($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $product = Product::find($id);
            $categories = Category::all();
            return view('admin.edit', [
                'product' => $product,
                'categories' => $categories
            ]);
        }
    }

    public function postEditProduct(Request $request, $id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $product = Product::find($id);
            $data = $request->all();

            $category = $request->input('category_id');
            $categories = Category::all();
            foreach ($categories as $cate) {
                if ($cate->type == $category) {
                    $data['category_id'] = $cate->id;
                }
            }

            $product->update($data);
            return redirect()->route('admin.showProduct')->with('message', 'แก้ไขสินค้าเรียบร้อย');
        }
    }

    public function getDeleteProduct($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $product = Product::find($id);
            $product->destroy($id);
            return redirect()->route('admin.showProduct')->with('message', 'ลบสินค้าเรียบร้อย');
        }
    }

    public function getCreateCategory()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            return view('admin.create_category');
        }
    }

    public function postCreateCategory(Request $request)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $data = $request->all();
            Category::create($data);
            return redirect()->route('admin.showProduct')->with('message', 'เพิ่มหมวดหมู่เรียบร้อย');
        }
    }

    public function getDeleteCategory()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $categories = Category::all();
            return view('admin.delete_category', [
                'categories' => $categories
            ]);
        }
    }

    public function getDeleteCategoryOne($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $category = Category::find($id);
            $category->destroy($id);
            return redirect()->route('admin.showProduct')->with('message', 'ลบหมวดหมู่เรียบร้อย');
        }
    }
    public function getCheckBill()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bills = Bill::where('status', '=', 1)->paginate(10);
            $users = User::all();
            return view('admin.check_bill', [
                'bills' => $bills,
                'users' => $users
            ]);
        }
    }
    public function getAcceptBill($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bill = Bill::find($id);
            $bill->status = 2;
            $bill->save();
            return redirect()->route('admin.showProduct')->with('message', 'ตรวจสอบการโอนเรียบร้อย');
        }
    }
    public function getCancelBill($id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bill = Bill::find($id);
            $bill_id = $bill->id;
            $sales = Sale::all();

            foreach ($sales as $sale) {
                if ($sale->bill_id == $bill_id) {
                    $product = Product::find($sale->product_id);
                    $amount = $sale->amount;
                    $quantity = $product->quantity;
                    $product->quantity = $quantity + $amount;
                    $product->save();
                    $sale->destroy($sale->id);
                }
            }

            $bill->destroy($id);
            return redirect()->route('admin.showProduct')->with('message', 'ยกเลิกการโอนเรียบร้อย');
        }
    }

    public function getCheckSend()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bills = Bill::where('status', '=', 2)->paginate(10);
            $users = User::all();
            return view('admin.check_send', [
                'bills' => $bills,
                'users' => $users
            ]);
        }
    }

    public function getAcceptSend(Request $request,$id)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bill = Bill::find($id);
            $bill->status = 3;
            $bill->trackNo = $request->input('trackNo');
            $bill->save();
            return redirect()->route('admin.showProduct')->with('message', 'ยืนยันการส่งรียบร้อย');
        }
    }

    public function getSend()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bills = Bill::where('status', '=', 3)->paginate(10);
            $users = User::all();
            return view('admin.send', [
                'bills' => $bills,
                'users' => $users
            ]);
        }
    }

    public function getReport()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $bills = Bill::all();
            $sales = Sale::all();
            $products = Product::all();
            $categories = Category::all();

            $totalprice = 0;
            $totalamount = 0;
            foreach ($sales as $sale) {
                $totalprice += $sale->totalprice;
                $totalamount += $sale->amount;
            }
            return view('admin.report', [
                'bills' => $bills,
                'sales' => $sales,
                'products' => $products,
                'categories' => $categories,
                'totalprice' => $totalprice,
                'totalamount' => $totalamount
            ]);
        }
    }
    public function getCustomReport(Request $request)
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else if(session()->get('id')[0]['id'] != 1){
            return redirect()->route('product.index');
        }
        else {
            $from = $request->input('from');
            $to = $request->input('to');
            $sub_to = substr($to, 8) + 1;
            if ($sub_to < 10) {
                $sub_to = '0' . $sub_to;
            }
            $to = substr($to, 0, 8) . $sub_to;

            $sales = Sale::whereBetween('created_at', [$from, $to])->get();

            $totalprice = 0;
            $totalamount = 0;
            foreach ($sales as $sale) {
                $totalprice += $sale->totalprice;
                $totalamount += $sale->amount;
            }

            $bills = Bill::all();
            $products = Product::all();
            $categories = Category::all();
            return view('admin.report', [
                'bills' => $bills,
                'sales' => $sales,
                'products' => $products,
                'categories' => $categories,
                'totalprice' => $totalprice,
                'totalamount' => $totalamount
            ]);
        }
    }
}

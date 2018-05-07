<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Bill;
use App\Sale;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
        if(session()->has('id')){
            return redirect()->route('product.index');
        }
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        if($request->input('password') == $request->input('confirmpassword')){
            $this->validate($request,[
                'username' => 'unique:user|min:8|max:30',
                'password' => 'min:8',
                'email' => 'email|unique:user',
            ]);
            $user = new User([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password'=> md5($request->input('password')),
                'address' => $request->input('address'),
            ]);
            $user->save();
            return redirect()->route('product.index')->with('success', "สมัครสมาชิกเรียบร้อย");
        }
        return redirect()->back()->with('error', "password not match.");
    }

    public function getSignin()
    {
        if(session()->has('id')){
            return redirect()->route('product.index');
        }
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8'
        ]);
        $user = User::whereRaw( 'username = ? and password = ?', [$request->username, md5($request->password)])->get();
        if (json_decode($user)){
            session(['id' => $user]);
            return redirect()->route('user.profile');
        }
        else{
            return redirect()->route('user.signin')->with('error', "username or password is wrong.");
        }
    }

    public function getProfile()
    {
        if(!session()->has('id')){
            return redirect()->route('product.index');
        }
        else{
            $data = session('id');
            return view('user.profile',[
                'data' => $data
            ]);
        }
    }

    public function getHistory()
    {
        if(session()->has('id')){
            $data = session('id');
            $bills = Bill::where( 'user_id', '=', $data[0]['id'])->get();
            $sales = Sale::all();
            $products = Product::all();
            return view('user.history', [
                'data' => $data,
                'bills' => $bills,
                'sales' => $sales,
                'products' => $products,
            ]);
        }
        else{
            return redirect()->route('product.index');
        }
    }

    public function getLogout()
    {
        if(session()->has('id')){
            session()->pull('id');
            Session::flush();
        }
        return redirect()->route('product.index');
    }

    public function getHowTo()
    {
        return view('user.howto');
    }
}

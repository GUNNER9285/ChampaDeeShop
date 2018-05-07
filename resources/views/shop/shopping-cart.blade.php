@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <h2> ตะกร้าสินค้า </h2>
    @if(Session::has('cart'))
        @if(Session::has('empty'))
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-danger">
                        {{ Session::get('empty') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row" style="margin-top:2%">
            <div class="col-lg-9">
                <div class="col-lg-6" style="text-align:center;">
                    <p style="font-size:20px"><b>สินค้า</b></p>
                </div>
                <div class="col-lg-2" style="text-align:center;">
                    <p style="font-size:20px">ราคา</p>
                </div>
                <div class="col-lg-2" style="text-align:center;">
                    <p style="font-size:20px">จำนวน</p>
                </div>
                <div class="col-lg-2" style="text-align:center;">
                    <p style="font-size:20px">ราคารวม</p>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <!--รายการสินค้า-->
        @foreach($products as $product)
            <div class="row">
                <div class="col-lg-9">
                    <div class="col-lg-6">
                        <div class="col-lg-8">
                            <img src="{{$product['item']['img1']}}" style="height:150px;">
                        </div>
                        <div class="col-lg-4" style="padding-top:12%" align="center">
                            <p>{{$product['item']['title']}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2" style="padding-top:6%;" align="center">
                        <p>{{$product['item']['price']}}</p>
                    </div>
                    <div class="col-lg-2" style="padding-top:6%;" align="center">
                        <p>{{ $product['qty'] }}</p>
                    </div>
                    <div class="col-lg-2" style="padding-top:6%;" align="center">
                        <p>{{ $product['price'] }}</p>
                    </div>
                </div>
                <div class="col-lg-1" style="padding-top:4.6%" align="center">
                    <a href="{{ route('product.addToCart', ['id'=>$product['item']['id']]) }}">
                        <button type="button" class="btn btn-primary">เพิ่ม</button>
                    </a>
                </div>
                <div class="col-lg-1" style="padding-top:4.6%" align="center">
                    <a href="{{ route('product.reduceByOne', ['id'=>$product['item']['id']]) }}">
                        <button type="button" class="btn btn-warning">ลด</button>
                    </a>
                </div>
                <div class="col-lg-1" style="padding-top:4.6%" align="center">
                    <a href="{{ route('product.removeItem', ['id'=>$product['item']['id']]) }}">
                        <button type="button" class="btn btn-danger">ลบสินค้า</button>
                    </a>
                </div>
            </div>
        @endforeach
        <!--รายการสินค้า-->
        <hr>
        <!--วิธีการจัดส่งสินค้า-->
        <div class="row" style="margin-top:2%">
            <!--
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <p style="font-size:20px">วิธีการจัดส่งสินค้า</p>


                <div class="radio">
                    <label><input type="radio" name="sender" value="0" id="normal">ลงทะเบียน ฟรีค่าจัดส่ง</label><br>
                    <label><input type="radio" name="sender" value="50" id="ems">EMS ค่าจัดส่ง 80 บาท</label>
                </div>


            </div>
            <div class="col-lg-1"></div>
            -->
        </div>
        <!--ราคาสินค้าทั้งหมด-->
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-6"></div>
            <div class="col-lg-2" align="right" style="margin-top:2%">
                <p style="display:inline-block; font-size:20px;">ราคารวมทั้งหมด : </p>
            </div>
            <div class="col-lg-2" align="right" style="margin-top:2%">
                <p style="display:inline-block; font-size:20px;">{{ $totalPrice }}</p>
                <p style="display:inline-block; font-size:20px;">บาท</p>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <!--ราคาสินค้าทั้งหมด-->
        <hr>
        <!--ปุ่มสั่งซื้อสินค้า||ปุ่มยกเลิกสินค้า-->
        <div class="row" style="margin-top:3%;">
            <div class="col-lg-1"></div>
            <div class="col-lg-5" align="center">
                <a href="{{ route('cancelCart') }}">
                    <button type="button" class="btn btn-danger">ยกเลิกรายการสินค้าทั้งหมด</button>
                </a>
            </div>
            <div class="col-lg-5" align="center">
                <a href="{{ route('checkout') }}">
                    <button type="button" class="btn btn-success">สั่งซื้อสินค้า</button>
                </a>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <br>
        <!--ปุ่มสั่งซื้อสินค้า||ปุ่มยกเลิกสินค้า-->
    @else
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h3>ไม่พบสินค้าในตะกร้า</h3>
        </div>
    @endif
@endsection
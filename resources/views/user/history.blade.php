@extends('layouts.master')

@section('title')
    ประวัติการสั่งซื้อ
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h2>ประวัติการสั่งซื้อ</h2>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <hr>
    @foreach($bills as $bill)
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <p id="orderhstyle" style="margin-top:3%"><b>หมายเลขคำสั่งซื้อ :  </b></p>
                <p id="orderhstyle">{{$bill['id']}}</p>
            </div>
            <div class="col-sm-3">
                @if($bill['status'] == 0)
                    <p id="orderbstyle"  class="state" align="center">สถานะ : ยังไม่ได้ยืนยันการชำระเงิน</p>
                @elseif($bill['status'] == 1)
                    <p id="orderbstyle" class="state" align="center">สถานะ : รอการยืนยัน</p>
                @elseif($bill['status'] == 2)
                    <p id="orderbstyle" class="state" align="center">สถานะ : รอการจัดส่ง</p>
                @else
                    <p id="orderbstyle" class="state" align="center">สถานะ : จัดส่งแล้ว</p>
                @endif
            </div>
            <div class="col-sm-3">
                @if($bill['status'] == 0)
                    <a href="{{ route('product.transfer', ['id'=>$bill['id']] )}}">
                        <button type="button" class="btn btn-danger">ยืนยันการโอน</button>
                    </a>
                @elseif($bill['status'] == 3)
                    <p id="orderbstyle" class="state" align="center">Tracking No.{{$bill['trackNo']}}</p>
                @endif
            </div>
            <div class="col-sm-1"></div>
        </div>
        @foreach($sales as $sale)
            @if($bill['id'] == $sale['bill_id'])
                @foreach($products as $product)
                    @if($product->id == $sale['product_id'])
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3">
                                <img src="{{$product->img1}}" style="height:150px; margin-top:3%">
                            </div>
                            <div class="col-sm-7"style="margin-top:4%;">
                                <div class="col-sm-6">
                                    <p id="orderbstyle">{{$product->title}}</p>
                                </div>
                                <div class="col-sm-3" align="center">
                                    <p id="orderbstyle">ราคา :</p>
                                    <p id="orderbstyle">{{$product->price * $sale['amount']}}</p>
                                    <p id="orderbstyle">บาท</p>
                                </div>
                                <div class="col-sm-3" align="center">
                                    <p id="orderbstyle">จำนวน :</p>
                                    <p id="orderbstyle">{{$sale['amount']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3">รวมทั้งสิ้น {{$bill->amount}} บาท</div>
        </div>
        <hr>
    @endforeach

@endsection
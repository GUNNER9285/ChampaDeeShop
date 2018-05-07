@extends('layouts.master')

@section('title')
    มุมมองผู้ดูแลระบบ
@endsection

@section('content')
        @if(Session::has('message'))
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @foreach($products_alert as $product)
                    <div class="alert alert-danger">
                        <p>{{ $product['title'] }} เหลือไม่ถึง 5 ชิ้น</p>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="row col-md-offset-2">
            <a href="{{route('admin.createProduct')}}" class="btn btn-success" style="margin-top: 1%">เพิ่มสินค้า</a>
            <a href="{{route('admin.createCategory')}}" class="btn btn-primary" style="margin-top: 1%">เพิ่มหมวดหมู่สินค้า</a>
            <a href="{{route('admin.delCategory')}}" class="btn btn-danger" style="margin-top: 1%">ลบหมวดหมู่สินค้า</a>
            <a href="{{route('admin.checkBill')}}" class="btn btn-warning" style="margin-top: 1%">ตรวจสอบการโอนเงิน</a>
            <a href="{{route('admin.checkSend')}}" class="btn btn-warning" style="margin-top: 1%">ยืนยันการส่ง</a>
            <a href="{{route('admin.send')}}" class="btn btn-warning" style="margin-top: 1%">ส่งสำเร็จแล้ว</a>
            <a href="{{route('admin.report')}}" class="btn btn-info" style="margin-top: 1%">รายงานการขาย</a>
        </div>
        <br>
    @if(count($products) > 0)
        <div class="row" >
            <table class="table table-striped">
                <tr>
                    <th>หมายเลขสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนคงเหลือ</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><a href="{{route('admin.editProduct', ['id'=>$product['id']])}}"><button type="button" class="btn btn-warning">แก้ไขสินค้า</button></a></td>
                    <td><a href="{{route('admin.deleteProduct', ['id'=>$product['id']])}}"><button type="button" class="btn btn-danger">ลบสินค้า</button></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    @else
        <h1> ไม่มีสินค้าตอนนี้ </h1>
    @endif
@endsection
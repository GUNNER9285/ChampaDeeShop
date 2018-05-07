@extends('layouts.master')

@section('title')
    รายงานการขาย
@endsection

@section('content')
    <br>
        <form class="form-inline" action="{{route('admin.customReport')}}" method="post">
            <div class="form-group">
                <label for="from">จากวันที่:</label>
                <input type="text" class="form-control" name="from">
            </div>
            <div class="form-group">
                <label for="to">ถึงวันที่:</label>
                <input type="text" class="form-control" name="to">
            </div>
            <button type="submit" class="btn btn-default">ค้นหา</button>
            <div class="form-group">
                <label for="to">รูปแบบ YYYY-MM-DD (ปีเป็นคริสต์ศักราช)</label>
            </div>
            {{csrf_field()}}
        </form>
    <br>
    @if(count($sales) > 0)
        <div class="panel panel-default">
            <div class="panel-heading" style='font-size:200%'>Report</div>
            <div class='row'>
                <div class='col-sm-1'></div>
                <div class='col-sm-10'>
                    <table style="width:100%">
                        <tr>
                            <td>
                                <table class="table table-bordered table-striped" style="margin:1%;font-size:120%;width:98%;text-align:right">
                                    <thead>
                                    <tr style="background-color:black;color:white">
                                        <th style="text-align:center">หมวดหมู่</th>
                                        <th style="text-align:center">ชื่อสินค้า</th>
                                        <th style="text-align:center">จำนวนสินค้า</th>
                                        <th style="text-align:center">ราคาสินค้า(บาท)</th>
                                        <th style="text-align:center">วันเวลาที่ขาย</th>
                                    </tr>
                                    </thead>
                                    @foreach($categories as $category)
                                        <tbody>
                                            <tr>
                                                <td rowspan="1" style="text-align:left">{{$category->type}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach($products as $product)
                                                @if($category->id == $product->category_id )
                                                    @foreach($sales as $sale)
                                                        @if($product->id == $sale->product_id)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{$product->title}}</td>
                                                            <td>{{$sale->amount}}</td>
                                                            <td>{{$sale->totalprice}}</td>
                                                            <td>{{$sale->created_at}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                    <tbody>
                                    <tr>
                                        <td style="text-align:left">รวมทั้งสิ้น</td>
                                        <td></td>
                                        <td>{{$totalamount}}</td>
                                        <td>{{$totalprice}}</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class='col-sm-1'></div>
            </div>
        </div>
    @else
        <h2> ไม่พบผลลัพธ์ </h2>
    @endif
    <div class="row" style="margin-top:5%;margin-left:3%">
        <div class="col-lg-2"><div class="form-group">
                <a href="{{ route('admin.showProduct') }}">
                    <button type="button" class="btn btn-default">
                        <span style='font-size:150%'>ย้อนกลับ</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection


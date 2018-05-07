@extends('layouts.master')

@section('title')
    เพิ่มหมวดหมู่สินค้า
@endsection

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading" style='font-size:120%'><b>เพิ่มหมวดหมู่สินค้า</b></div>
        <div class="panel-body">
            <div class='row' style='font-size:100%;margin-left:auto;margin-right:auto'>
                <form method='POST' action='{{route('admin.createCategory')}}' class='form-horizontal'>
                    <div class="form-group">
                        <label for="product_name" class="col-sm-4 control-label">ชื่อหมวดหมู่สินค้า</label>
                        <div class="col-sm-6">
                            <input id="type" type="text" class="form-control" name="type" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4">
                            <button type="submit" class="btn btn-success">
                                <span style='font-size:100%'>เพิ่มหมวดหมู่สินค้า</span>
                            </button>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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


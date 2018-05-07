@extends('layouts.master')

@section('title')
    เพิ่มสินค้า
@endsection

@section('content')
        <span style="color: #FF0000">* จำเป็นต้องใส่</span>
        <br>
        <div class="panel panel-success">
            <div class="panel-heading" style='font-size:120%'><b>เพิ่มสินค้า</b></div>
            <div class="panel-body">
                <div class='row' style='font-size:100%;margin-left:auto;margin-right:auto'>
                    <form method='POST' action='{{route('admin.createProduct')}}' class='form-horizontal' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_name" class="col-sm-4 control-label">ชื่อสินค้า <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <input id="product_name" type="text" class="form-control" name="title" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_path" class="col-sm-4 control-label">ภาพสินค้า 1 <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <input id="file_path" type="file" name="img1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img2" class="col-sm-4 control-label">ภาพสินค้า 2</label>
                            <div class="col-sm-6">
                                <input id="img2" type="file" name="img2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img3" class="col-sm-4 control-label">ภาพสินค้า 3</label>
                            <div class="col-sm-6">
                                <input id="img3" type="file" name="img3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-4 control-label">รายละเอียดสินค้า <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="" rows="4" cols="50" required autofocus></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">ราคาสินค้า (บาท) <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <input id="price" type="number" class="form-control" name="price" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">จำนวนสินค้า <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-4 control-label">หมวดหมู่สินค้า <span style="color: #FF0000">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="category_id" required autofocus>
                                    @foreach($categories as $category)
                                        <option value="{{$category->type}}">{{$category->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">ชนิดเสื้อ</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="type" autofocus>
                                        <option value="">ไม่ใช่เสื้อ</option>
                                        <option value="คอกลม">คอกลม</option>
                                        <option value="คอวี">คอวี</option>
                                        <option value="โปโล">โปโล</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">ขนาดสินค้า</label>
                            <div class="col-sm-6">
                                <input id="size" type="text" class="form-control" name="size" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">สีสินค้า</label>
                            <div class="col-sm-6">
                                <input id="color" type="text" class="form-control" name="color" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">เพศสำหรับผู้ใช้สินค้า</label>
                            <div class="col-sm-6">
                                <input id="sex" type="text" class="form-control" name="sex" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <span style='font-size:100%'>เพิ่มสินค้า</span>
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


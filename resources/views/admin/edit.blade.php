@extends('layouts.master')

@section('title')
    แก้ไขสินค้า
@endsection

@section('content')
    <span style="color: #FF0000">* จำเป็นต้องใส่</span>
    <br>
    <div class="panel panel-warning">
        <div class="panel-heading" style='font-size:120%'><b>แก้ไขสินค้า</b></div>
        <div class="panel-body">
            <div class='row' style='font-size:100%;margin-left:auto;margin-right:auto'>
                <form method='POST' action='{{route('admin.editProduct', ['id'=>$product['id']])}}' class='form-horizontal'>
                    <div class="form-group">
                        <label for="product_name" class="col-sm-4 control-label">ชื่อสินค้า <span style="color: #FF0000">*</span></label>
                        <div class="col-sm-6">
                            <input id="product_name" type="text" class="form-control" name="title" value="{{$product->title}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-4 control-label">รายละเอียดสินค้า <span style="color: #FF0000">*</span></label>
                        <div class="col-sm-6">
                            <textarea id="description" type="text" class="form-control" name="description" value="" rows="4" cols="50" required autofocus>{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-4 control-label">ราคาสินค้า (บาท) <span style="color: #FF0000">*</span></label>
                        <div class="col-sm-6">
                            <input id="price" type="number" class="form-control" name="price" value="{{$product->price}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-4 control-label">จำนวนสินค้า <span style="color: #FF0000">*</span></label>
                        <div class="col-sm-6">
                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{$product->quantity}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="col-sm-4 control-label">หมวดหมู่สินค้า <span style="color: #FF0000">*</span></label>
                        <div class="col-sm-6">

                            <select class="form-control" name="category_id" required autofocus>
                                @foreach($categories as $category)
                                    @if($product->category_id == $category->id)
                                        <option value="{{$category->type}}" selected>{{$category->type}}</option>
                                    @else
                                        <option value="{{$category->type}}">{{$category->type}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-4 control-label">ชนิดเสื้อ</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="type" autofocus>
                                @if($product->type == "คอกลม")
                                    <option value="">ไม่ใช่เสื้อ</option>
                                    <option value="คอกลม" selected>คอกลม</option>
                                    <option value="คอวี">คอวี</option>
                                    <option value="โปโล">โปโล</option>
                                @elseif($product->type == "คอวี")
                                    <option value="">ไม่ใช่เสื้อ</option>
                                    <option value="คอกลม">คอกลม</option>
                                    <option value="คอวี" selected>คอวี</option>
                                    <option value="โปโล">โปโล</option>
                                @elseif($product->type == "โปโล")
                                    <option value="">ไม่ใช่เสื้อ</option>
                                    <option value="คอกลม">คอกลม</option>
                                    <option value="คอวี">คอวี</option>
                                    <option value="โปโล" selected>โปโล</option>
                                @else
                                    <option value="" selected>ไม่ใช่เสื้อ</option>
                                    <option value="คอกลม">คอกลม</option>
                                    <option value="คอวี">คอวี</option>
                                    <option value="โปโล">โปโล</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-4 control-label">ขนาดสินค้า</label>
                        <div class="col-sm-6">
                            <input id="size" type="text" class="form-control" name="size" value="{{$product->size}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-4 control-label">สีสินค้า</label>
                        <div class="col-sm-6">
                            <input id="color" type="text" class="form-control" name="color" value="{{$product->color}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-4 control-label">เพศสำหรับผู้ใช้สินค้า</label>
                        <div class="col-sm-6">
                            <input id="sex" type="text" class="form-control" name="sex" value="{{$product->sex}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4">
                            <button type="submit" class="btn btn-warning">
                                <span style='font-size:100%'>แก้ไขสินค้า</span>
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


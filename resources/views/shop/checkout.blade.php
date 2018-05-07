@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style='font-size:200%'>กรุณากรอกรายละเอียดเพื่อจัดส่งสินค้า</div>
            <div class="panel-body">
                <div class='row' style='font-size:140%;margin-left:auto;margin-right:auto'>
                    <form method='POST' action='{{ route('checkout') }}' class='form-horizontal'>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>
                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstname" value="{{session()->get('id')[0]->firstname}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">นามสกุล</label>
                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastname" value="{{session()->get('id')[0]->lastname}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">อีเมล</label>
                            <div class="col-md-6">
                                <input id="eMail" type="text" class="form-control" name="email" value="{{session()->get('id')[0]->email}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">ที่อยู่</label>
                            <div class="col-md-6">
                                <input style="height:30%"id="address" type="text" class="form-control" name="address" value="{{session()->get('id')[0]->address}}" required autofocus>
                            </div>
                        </div>
                        <!--ปุ่ม-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4" align="center" style="margin-top:5%">
                                        <button type="submit" class="btn btn-success">
                                            <span style='font-size:150%'>ยืนยันการสั่งซื้อ</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4" align="center" style="margin-top:5%">
                                        <a href="{{ route('cancelCart') }}">
                                            <button type="submit" class="btn btn-danger">
                                                <span style='font-size:150%'>ยกเลิกคำสั่งซื้อ</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <!--ปุ่ม-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('title')
    สมัครสมาชิก
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(Session::has('error'))
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style='font-size:120%'>สมัครสมาชิก</div>
            <div class="panel-body">
                <div class='row' style='font-size:100%; margin-left:auto; margin-right:auto;'>
                    <form id="regisForm" method='POST' action="{{ route('user.signup') }}" name="f1" class='form-horizontal'>
                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>
                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control" name="username">
                                <small id="usernameHelpBlock" class="text-muted">ใช้อักขระ 8 ตัวขึ้นไป</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>
                            <div class="col-md-6 md-3">
                                <input id="firstName" type="text" class="form-control" name="firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">นามสกุล</label>
                            <div class="col-md-6 md-3">
                                <input id="lastName" type="text" class="form-control" name="lastname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">อีเมล</label>
                            <div class="col-md-6">
                                <input id="eMail" type="text" class="form-control" name="email" placeholder="email@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>
                            <div class="col-md-6">
                                <input id="passWord" type="password" class="form-control" name="password">
                                <small id="passwordHelpBlock" class="text-muted">ใช้อักขระ 8 ตัวขึ้นไป</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-md-4 control-label">ยืนยันรหัสผ่าน</label>
                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control" name="confirmpassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">ที่อยู่</label>
                            <div class="col-md-6">
                                <textarea id="address" type="text" rows="4" cols="50" class="form-control" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span style='font-size:100%'>สมัครสมาชิก</span>
                                </button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
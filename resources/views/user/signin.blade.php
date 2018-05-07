@extends('layouts.master')

@section('title')
    เข้าสู่ระบบ
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
    <div class="panel panel-primary">
        <div class="panel-heading" style='font-size:120%'>เข้าสู่ระบบ</div>
        <div class="panel-body">
            <div class='row' style='font-size:100%; margin-left:auto; margin-right:auto;'>
                <form method='POST' action='' class='form-horizontal'>
                    <div class="form-group">
                        <label for="username" class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>
                        <div class="col-md-6">
                            <input id="userName" type="text" class="form-control" name="username" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>
                        <div class="col-md-6">
                            <input id="passWord" type="password" class="form-control" name="password" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <span style='font-size:100%'>เข้าสู่ระบบ</span>
                            </button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
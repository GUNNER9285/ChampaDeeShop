@extends('layouts.master')

@section('title')
    ข้อมูลส่วนตัว
@endsection

@section('content')
    <div style="padding:10px">
        <!--ส่วนหัว-->
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <h2>ข้อมูลส่วนตัว</h2>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <!--ส่วนหัว-->

        <!--ชื่อ-->
        <div class="row" style="margin-top:3%">
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <img src="/img/champadee_head.png" style="border-radius:50%"; width="350px">
            </div>
            <div class="col-lg-6" style="margin-top:3%; border-style:solid; border-color:#9396A3; border-radius:20px;">
                <p class="fontthispage" >ชื่อผู้ใช้งาน</p>
                <p style="margin-left:2%; font-size:24px; display:inline-block;"><b>{{$data[0]->username}}</b></p>
                <br>
                <p class="fontthispage">ชื่อ</p>
                <p class="fontthispage" style="margin-left:2%">{{$data[0]->firstname}}</p>
                <br>
                <p class="fontthispage">นามสกุล</p>
                <p class="fontthispage" style="margin-left:2%">{{$data[0]->lastname}}</p>
                <br>
                <p class="fontthispage">อีเมล</p>
                <p class="fontthispage" style="margin-left:2%">{{$data[0]->email}}</p>
                <br>
                <p class="fontthispage">ที่อยู่</p>
                <p class="fontthispage" style="margin-left:2%">{{$data[0]->address}}</p>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <!--ชื่อ-->
    </div>

@endsection
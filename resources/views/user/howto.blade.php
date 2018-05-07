@extends('layouts.master')

@section('title')
    วิธีการชำระเงิน
@endsection

@section('content')
    <!--ส่วนหัว-->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h2 class="kanit">วิธีการสั่งซื้อสินค้า</h2>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!--ส่วนหัว-->

    <!---ขั้น 1_3-->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="col-sm-4">
                <p class="fontstyledetail itim" style="margin-top:3%">1. เลือกสินค้าที่คุณต้องการโดยคลิกปุ่มเพิ่มสินค้าลงตะกร้า</p>
                <img src="/img/addtocart.png"></div>
            <div class="col-sm-4">
                <p class="fontstyledetail itim" style="margin-top:3%">2. เมื่อเลือกสินค้าครบแล้ว ให้คลิกปุ่มสั่งซื้อสินค้าใน ตะกร้าสินค้า</p>
                <img src="/img/buy.png"></div>
            <div class="col-sm-4">
                <p class="fontstyledetail itim" style="margin-top:3%">3. กรอกรายละเอียดที่จำเป็นในการส่งสินค้าให้ครบถ้วนจากนั้นคลิกปุ่มยืนยันการสั่งซื้อ</p>
                <img src="/img/form.png"></div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!---ขั้น 1_3-->

    <!---ขั้น 4_6-->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="col-sm-4">
                <p class="fontstyledetail itim" style="margin-top:3%">4. ชำระค่าสินค้าและบริการ</p>
                <img src="/img/transfer.jpg">
            </div>
            <div class="col-sm-4">
                <p class="fontstyledetail itim" style="margin-top:3%">5. แจ้งการชำระเงินผ่านปุ่มยืนยันการโอนเงิน ในหน้าประวัติการสั่งซื้อ</p>
                <img src="/img/history.png">
            </div>
            <div class="col-sm	4">
                <p class="fontstyledetail itim" style="margin-top:1%">6. รอรับสินค้า</p>
                <img src="/img/sending.jpg">
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!---ขั้น 4_6-->

    <!--ช่องการชำระเงิน-->
    <div class="row" style="margin-top:5%">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h2 class="kanit">ช่องทางชำระเงิน</h2>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!--วิธีการชำระเงิน-->

    <!--ช่องทางชำระเงิน กรุงศรี-->
    <div class="row" style="margin-top:2%">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="/img/ayudhya.jpeg" style="width:70%">
        </div>
        <div class="col-sm-8">
            <p class="itim" style="font-size: 20px">ธนาคารกรุงศรีอยุธยา สาขามหาวิทยาลัยศิลปากร พระราชวังสนามจันทร์</p>
            <br>
            <p class="itim" style="font-size: 20px">ชื่อ นามสกุลเจ้าของบัญชี</p>
            <br>
            <p class="itim" style="font-size: 20px">xxx-x-xxxxx-x</p>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!--ช่องทางชำระเงิน กรุงศรี-->
    <hr>
    <!--ช่องทางชำระเงิน กรุงไทย-->
    <div class="row" style="margin-top:2%">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="/img/ktbthai.jpg" style="width:70%">
        </div>
        <div class="col-sm-8">
            <p class="itim" style="font-size: 20px">ธนาคารกรุงไทย สาขามหาวิทยาลัยศิลปากร พระราชวังสนามจันทร์</p>
            <br>
            <p class="itim" style="font-size: 20px">ชื่อ นามสกุลเจ้าของบัญชี</p>
            <br>
            <p class="itim" style="font-size: 20px">xxx-x-xxxxx-x</p>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!--ช่องทางชำระเงิน กรุงไทย-->

@endsection
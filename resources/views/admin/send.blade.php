@extends('layouts.master')

@section('title')
    สินค้าที่ทำการส่งแล้ว
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading" style='font-size:200%'>ส่งสินค้าเรียบร้อยเเล้ว</div>
        <div class='row' style='margin-top:1%;margin-bottom:1%'>
            <div class='col-sm-1'></div>
            <div class='col-sm-10'>
                <table class='table table-striped'>
                    <thead>
                    <tr style='font-size:150%'>
                        <th>รูป</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ที่อยู่</th>
                        <th>สถานะ</th>
                    </tr>
                    </thead>
                    @foreach($bills as $bill)
                        <tbody>
                        <tr>
                            <td style='width:30%;'>
                                <img src='{{$bill->imgPath}}'
                                     style='width:50%;' id='{{$bill->id}}' alt='{{$bill->imgPath}}' onclick='imageClick(id)'>
                            </td>
                            <td style='font-size:150%'>
                                {{$users[($bill->user_id)-1]->firstname}} {{$users[($bill->user_id)-1]->lastname}}
                            </td>
                            <td style='font-size:150%'>
                                {{$bill->address}}
                            </td>
                            <td align='center'><button class='btn btn-success'>ส่งสินค้าเรียบร้อยเเล้ว</button></td>
                        </tr>
                        </tbody>
                    @endforeach
                    {{ $bills->links() }}
                </table>
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
                <script>
                    var modal = document.getElementById('myModal');
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    function imageClick(bill_id){
                        modal.style.display = "block";
                        modalImg.src = document.getElementById(bill_id).src;
                        captionText.innerHTML = this.alt;
                    }
                    var span = document.getElementsByClassName("close")[0];
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>
            </div>
            <div class='col-sm-1'></div>
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


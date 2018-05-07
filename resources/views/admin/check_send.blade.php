@extends('layouts.master')

@section('title')
    ยืนยันการส่งสินค้า
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading" style='font-size:200%'>ยืนยันการส่งสินค้า</div>
        <div class='row' style='margin-top:1%;margin-bottom:1%'>
            <div class='col-sm-1'></div>
            <div class='col-sm-10'>
                <table class='table table-striped'>
                    <thead>
                    <tr style='font-size:150%'>
                        <th>รูป</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ที่อยู่</th>
                        <th>Tracking No.</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($bills as $bill)
                        <tbody>
                        <tr>
                            <td style='width:30%;'>
                                <img src='{{$bill->imgPath}}'
                                     style='width:50%;' id='{{$bill->id}}' alt='{{$bill->imgPath}}' onclick='imageClick(id)'>
                            </td>
                            <td style='font-size:100%'>
                                {{$users[($bill->user_id)-1]->firstname}} {{$users[($bill->user_id)-1]->lastname}}
                            </td>
                            <td style='font-size:100%'>
                                {{$bill->address}}
                            </td>
                            <form action='{{ route('admin.acceptSend', ['id'=>$bill['id']] )}}' method='POST'>
                                <td>
                                    <input type='text' name="trackNo" required>
                                </td>
                                <td align='center'><button class='btn btn-success' type='submit'>ยืนยันการส่งสินค้า</button></td>
                                {{csrf_field()}}
                            </form>
                            <td align='center'>
                                <a href="{{ route('admin.cancelBill', ['id'=>$bill['id']] )}}">
                                    <button class='btn btn-danger'>ยกเลิก</button>
                                </a>
                            </td>
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


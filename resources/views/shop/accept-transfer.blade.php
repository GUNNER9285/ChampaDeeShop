@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading" style='font-size:120%'>ยืนยันการโอนเงิน</div>
            <div class="panel-body">
                <div class='row' style='font-size:100%;margin-left:auto;margin-right:auto'>
                    <form method='POST' action='{{route('product.acceptTransfer')}}' class='form-horizontal' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="file_path" class="col-sm-4 control-label">ภาพหลักฐานการโอนเงิน (file path)</label>
                            <div class="col-sm-6">
                                <input id="file_path" type="file" name="imgPath" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input id="bill_id" type="hidden" class="form-control" name="bill_id" value="{{$bill->id}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" id='submit' required>
                                    <span style='font-size:100%'>ยืนยันการโอนเงิน</span>
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
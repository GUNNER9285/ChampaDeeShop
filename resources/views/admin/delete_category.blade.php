@extends('layouts.master')

@section('title')
    ลบหมวกหมู่สินค้า
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-warning">
            <div class="panel-heading" style='font-size:200%'>เลือกหมวดหมู่ที่ต้องการลบ</div>
            <div class="panel-body">
                @foreach($categories->chunk(6) as $categoriesChunk)
                    <div class='row' style='font-size:140%;margin-left:auto;margin-right:auto;margin-top:1%'>
                        @foreach($categoriesChunk as $category)
                            <div class="col-lg-2">
                                <a href="{{route('admin.delCategoryOne', ['id'=>$category['id']])}}">
                                    <button type="button" class="btn btn-danger" style="margin-top:1%">
                                        {{$category->type}}
                                    </button>
                                </a>
                            </div>
                        @endforeach
                        <div class="col-sm-1"></div>
                    </div>
            @endforeach
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


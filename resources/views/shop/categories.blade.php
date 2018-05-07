@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <div class='row' style='margin-bottom:1%'>
        <div class='col-lg-1'></div>
        <div class='col-lg-11'>
            <a href='{{route('product.index')}}' style='color:gray'><i class="fas fa-home"> หน้าหลัก</i></a>
            <i class="fas fa-angle-right" style='color:gray'></i>
            <a href='{{route('product.category')}}' style='color:gray'>หมวดหมู่</a>
        </div>
    </div>
    <br>
    <div class='row' style='margin-bottom:1%'>
        <div class='col-lg-1'></div>
        <div class='col-lg-11'><br><span class="kanit" style='font-size:200%;'>หมวดหมู่สินค้า</span></div>
    </div>
    <br>
    @foreach($categories->chunk(5) as $categoriesChunk)
        <div class="row">
            <div class="col-sm-1"></div>
            @foreach($categoriesChunk as $category)
                <div class="col-sm-2">
                    <a href="{{ route('product.categoryByType', ['id'=>$category['id']]) }}" class="btn btn-default btn-lg kanit" role="button" style="margin-top: 10%;">{{$category->type}}</a>
                </div>
            @endforeach
            <div class="col-sm-1"></div>
        </div>
    @endforeach
@endsection
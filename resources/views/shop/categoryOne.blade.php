@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <div class='row' style='margin-bottom:1%'>
        <div class='col-sm-1'></div>
        <div class='col-sm-11'>
            <a href='{{route('product.index')}}' style='color:gray'><i class="fas fa-home"> หน้าหลัก</i></a>
            <i class="fas fa-angle-right" style='color:gray'></i>
            <a href='{{route('product.category')}}' style='color:gray'>หมวดหมู่</a>
            <i class="fas fa-angle-right" style='color:gray'></i>
            <a href='{{ route('product.categoryByType', ['id'=>$category['id']]) }}' style='color:gray'>{{$category->type}}</a>
        </div>
    </div>
    <br>
    <div class='row' style='margin-bottom:1%'>
        <div class='col-sm-1'></div>
        <div class='col-sm-11'><br><span class="kanit" style='font-size:200%'>{{$category->type}}</span></div>
    </div>
    <br>
    @foreach($products->chunk(5) as $productChunk)
        <div class="row">
            <div class="col-sm-1"></div>
            @foreach($productChunk as $product)
                <div class="col-sm-2" align="center">
                    <div class="newitem" align="center">
                        <a href="{{route('product.show', ['id'=>$product->id])}}">
                            <img src="{{$product->img1}}" style="height:150px">
                        </a>
                        <br>
                        <a href="{{route('product.show', ['id'=>$product->id])}}" id="productstyle">
                            <p class="marginimde kanit">{{$product->title}}</p>
                        </a>
                        <p id="fontsize" class="kanit">{{$product->price}}</p>
                        <p id="displayblockline" class="kanit">บาท</p>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-1"></div>
        </div>
    @endforeach
    {{ $products->links() }}
@endsection
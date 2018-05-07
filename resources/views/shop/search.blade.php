@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    <h3 class="kanit"> ค้นพบสินค้าสำหรับ "{{$search}}" {{count($products)}} รายการในหน้านี้</h3>
    @if(count($products) > 0)
        @foreach($products->chunk(5) as $productChunk)
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10" align="center">
                    @foreach($productChunk as $product)
                        <div class="newitem col-lg-2" style="margin-left: 1.75%">
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
                    @endforeach
                </div>
                <div class="col-lg-1"></div>
            </div>
        @endforeach
        {{ $products->links() }}
    @endif
@endsection
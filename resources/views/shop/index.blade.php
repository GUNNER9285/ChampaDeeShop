@extends('layouts.master')

@section('title')
    ChampaDeeShop
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
<!--
    @if(session()->has('id'))
        <h1> has session </h1>
    @else
        <h1> not has session </h1>
    @endif
-->
    @if(count($products) > 0)
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="margin-bottom:20px">

                <div class="slideshow-container" style="margin-top:3%">
                    @for($i=0; $i<3; $i++)
                        <div class="mySlides fade">
                            <a href="{{route('product.show', ['id'=>$products_new[$i]->id])}}"><img src="{{$products_new[$i]->img1}}" style="width:100%"></a>
                        </div>
                    @endfor
                        <div class="col-lg-1"></div>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <script>
                    var slideIndex = 0;
                    showSlides();

                    function showSlides() {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        slideIndex++;
                        if (slideIndex > slides.length) {slideIndex = 1}
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";
                        dots[slideIndex-1].className += " active";
                        setTimeout(showSlides, 3000); // Change image every 2 seconds
                    }
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" align="center">
                <h2 align="left" class="kanit"><b>สินค้าใหม่</b></h2>
                @for($i=0; $i<5; $i++)
                    <div class="newitem col-lg-2" style="margin-left: 1.75%">
                        <a href="{{route('product.show', ['id'=>$products_new[$i]->id])}}"><img src="{{$products_new[$i]->img1}}" style="height:150px";></a>
                        <br>
                        <a href="{{route('product.show', ['id'=>$products_new[$i]->id])}}" id="productstyle"><p class="marginimde kanit">{{$products_new[$i]->title}}</p></a>
                        <p id="fontsize" class="kanit">{{$products_new[$i]->price}}</p>
                        <p id="displayblockline" class="kanit">บาท</p>
                    </div>
                @endfor
            </div>
            <div class="col-lg-1"></div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" align="center">
                <h2 align="left" class="kanit"><b>สินค้าขายดี</b></h2>
                @for($i=0; $i<5; $i++)
                    <div class="newitem col-lg-2" style="margin-left: 1.75%">
                        <a href="{{route('product.show', ['id'=>$products[$i]->id])}}"><img src="{{$products[$i]->img1}}" style="height:150px"></a>
                        <br>
                        <a href="{{route('product.show', ['id'=>$products[$i]->id])}}" id="productstyle"><p class="marginimde kanit">{{$products[$i]->title}}</p></a>
                        <p id="fontsize" class="kanit">{{$products[$i]->price}}</p>
                        <p id="displayblockline" class="kanit">บาท</p>
                    </div>
                @endfor
            </div>
            <div class="col-lg-1"></div>
        </div>
    @else
        <h1> ไม่มีสินค้าตอนนี้ </h1>
    @endif

@endsection
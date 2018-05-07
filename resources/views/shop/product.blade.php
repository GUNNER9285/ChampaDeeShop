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
            @foreach($categories as $category)
                @if($category->id == $product->category_id)
                    <a href='{{ route('product.categoryByType', ['id'=>$category['id']]) }}' style='color:gray'>{{$category->type}}</a>
                @endif
            @endforeach
            <i class="fas fa-angle-right" style='color:gray'></i>
            <a href='{{route('product.show', ['id'=>$product->id])}}' style='color:gray'>{{$product->title}}</a>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-7'>
            <div class="w3-content" style="max-width:100%;">
                <img class="mySlides" src="{{$product->img1}}" style="width:50%;
					display:block;margin-left:auto;margin-right:auto" alt='{{$product->title}}' id='img1'>
                <img class="mySlides" src="{{$product->img2}}" style="width:50%;
					display:block;margin-left:auto;margin-right:auto" alt='{{$product->title}}' id='img2'>
                <img class="mySlides" src="{{$product->img3}}" style="width:50%;
					display:block;margin-left:auto;margin-right:auto" alt='{{$product->title}}' id='img3'>
                <div class="w3-row-padding w3-section">
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="{{$product->img1}}"
                             style="width:60%;display:block;margin-left:auto;margin-right:auto" onclick="currentDiv(1)">
                    </div>
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="{{$product->img2}}"
                             style="width:60%;display:block;margin-left:auto;margin-right:auto" onclick="currentDiv(2)">
                    </div>
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="{{$product->img3}}"
                             style="width:60%;display:block;margin-left:auto;margin-right:auto" onclick="currentDiv(3)">
                    </div>
                </div>
            </div>
        </div>
        <div class='col-sm-5' style='font-size:200%;'>
            <p class="kanit">{{$product->title}}</p>
            <p style="color: #FF6E00" class="kanit">ราคา: <span style='font-size:100%'>{{$product->price}}</span> บาท</p>
            @if(session()->has('id'))
                <a href="{{ route('product.addToCart', ['id'=>$product->id]) }}">
                    <button type="button" class="btn btn-warning btn-lg" style='align:center;margin-top:42px'>
                        <span style='font-size:75%'>เพิ่มสินค้าลงตะกร้า</span></button>
                </a>
            @else
                <button type="button" class="btn btn-warning btn-lg disabled" style='align:center;margin-top:42px'>
                    <span style='font-size:75%'>เพิ่มสินค้าลงตะกร้า</span></button>
            @endif
        </div>
            @if(!(session()->has('id')))
                <span class="itim" style="color:#FF0000;">กรุณาลงชื่อเข้าใช้ก่อนเลือกสินค้าลงตะกร้า</span>
            @endif

        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
        <script>
            var modal = document.getElementById('myModal');
            var img1 = document.getElementById('img1');
            var img2 = document.getElementById('img2');
            var img3 = document.getElementById('img3');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img1.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
            img2.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
            img3.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function currentDiv(n) {
                showDivs(slideIndex = n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                }
                x[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " w3-opacity-off";
            }
        </script>
    </div>
    <div>
        <div class="col-sm-12">
            <span class="kanit" style='font-size:150%'>รายละเอียดสินค้า</span>
            <p class="itim" style="margin-top:18px;font-size:140%">{{$product->description}}<p>
            <br>
        </div>
    </div>

@endsection
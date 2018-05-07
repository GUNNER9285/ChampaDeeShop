<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/img/champadee_banner.png" style="width: 200px; padding-bottom: 5%">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-right" action="{{route('product.search')}}">
                <input type="text" class="form-control" placeholder="Search.." name="search">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
            @if(session()->has('id'))
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('product.shoppingCart')}}"> <i class="fas fa-shopping-basket"></i> ตะกร้าสินค้า
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a></li>
                <li><a href="{{ route('user.howto') }}">วิธีการสั่งซื้อ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> ข้อมูลผู้ใช้งาน <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.profile') }}">ข้อมูลส่วนตัว</a></li>
                        <li><a href="{{ route('user.history') }}">ประวัติการสั่งซื้อ</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('user.logout') }}">ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('user.howto') }}">วิธีการสั่งซื้อ</a></li>
                    <li><a href="{{ route('user.signup') }}">สมัครสมาชิก</a></li>
                    <li><a href="{{ route('user.signin') }}">ลงชื่อเข้าใช้</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('product.index') }}">หน้าแรก</a></li>
                <li><a href="{{ route('product.category') }}">หมวดหมู่สินค้า</a></li>
            </ul>
        </div>
    </div>
</nav>
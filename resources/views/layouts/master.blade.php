<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/img/champadee_head.png"/>

    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('css/product.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/sildeshow.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/productOne.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/history.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/partials.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/font.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/validation.css') }}">

    @yield('styles')
</head>
<body>
<i id="myBtn" onclick="topFunction()" class="fas fa-arrow-up fa-3x" ></i>
@include('partials.header')
<br><br><br>
<div  class="container">
    @yield('content')
</div>

<script src="{{ URL::to('js/back2top.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@yield('script')

<br>
@include('partials.footer')
</body>
</html>
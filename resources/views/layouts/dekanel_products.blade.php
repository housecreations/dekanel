
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>{{App\ApplicationInformation::whereOption('title')->first()->value}}</title>
    <!--
    App Starter Template
    http://www.templatemo.com/tm-492-app-starter
    -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">



    <link href='https://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">


</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->

<div class="preloader">
    <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation Section -->

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><img src="/images/dekanel-logo.png" alt="" class="logo-position"></a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/#about" class="smoothScroll">Nosotros</a></li>
                <li><a href="/#products" class="smoothScroll">Productos</a></li>
                <li><a href="/#consultants" class="smoothScroll">Consultores</a></li>
                <li><a href="/#clients" class="smoothScroll">Clientes</a></li>
                <li><a href="/#contact" class="smoothScroll">Contacto</a></li>

            </ul>
        </div>

    </div>
</div>

@yield('content')


<!-- Footer Section -->

<footer>
    <div class="container">
        <div class="row">

            <a href="index.html" class=""><img src="/images/dekanel-logo.png" alt="" class="logo-position"></a>

        </div>
    </div>
</footer>




<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- SCRIPTS -->

<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>

<script src="{{ asset('js/smoothscroll.js')}}"></script>
<script src="{{ asset('js/wow.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>











</body>
</html>

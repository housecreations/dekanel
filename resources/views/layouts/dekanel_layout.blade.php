
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <!--Slider-->
    <link rel="stylesheet" href="{{ asset('css/slider/sl-slide.css')}}">
    <script src="{{ asset('js/slider/modernizr.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/slider/flexslider.css')}}">

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
                <li><a href="#about" class="smoothScroll">Nosotros</a></li>
                <li><a href="#products" class="smoothScroll">Productos</a></li>
                <li><a href="#consultants" class="smoothScroll">Consultores</a></li>
                <li><a href="#clients" class="smoothScroll">Clientes</a></li>
                <li><a href="#contact" class="smoothScroll">Contacto</a></li>
        
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

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>




<!-- Required javascript files for Slider -->

<script src="js/slider/jquery.ba-cond.min.js"></script>
<script src="js/slider/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript">
    $(function() {
        var Page = (function() {

            var $navArrows = $( '#nav-arrows' ),
                slitslider = $( '#slider' ).slitslider( {
                    autoplay : false
                } ),

                init = function() {
                    initEvents();
                },
                initEvents = function() {
                    $navArrows.children( ':last' ).on( 'click', function() {
                        slitslider.next();
                        return false;
                    });

                    $navArrows.children( ':first' ).on( 'click', function() {
                        slitslider.previous();
                        return false;
                    });
                };

            return { init : init };

        })();

        Page.init();
    });
</script>








</body>
</html>

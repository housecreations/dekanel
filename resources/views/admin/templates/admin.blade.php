<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Default')</title>

    <meta name="author" content="HouseCreations">
    <meta name="owner" content="HouseCreations">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Nunito:800" rel="stylesheet">





    {{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   {{-- <link rel="stylesheet" href="{{ asset('css/sl-slide.css')}}">
    <link rel="stylesheet" href="{{ asset('css/blue-scheme.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('cpanel/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('cpanel/css/component.css')}}">
    <link rel="stylesheet" href="{{ asset('cpanel/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('cpanel/css/demo.css')}}">

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
          rel="stylesheet">
  {{--  <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">--}}

    <script src="{{ asset('cpanel/js/modernizr.custom.js')}}"></script>


    <!--Color Picker-->
    <link rel="stylesheet" href="{{ asset('cpanel/colorpicker/css/bootstrap-colorpicker.css')}}">



    <script src="{{ asset('cpanel/js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('cpanel/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('cpanel/js/bootstrap.js') }}"></script>
    <script src="{{ asset('cpanel/colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('cpanel/js/custom.js')}}"></script>

</head>
<body>

<div id="preloader">
    <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<div class="container admin-container">
    <ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
            <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
            <nav class="gn-menu-wrapper">
                <div class="gn-scroller">
                    <ul class="gn-menu">

                        <li>
                            <a class="fa fa-home" href="{{ url('admin/')}}">Dashboard</a>

                        </li>
                        <li>
                            <a class="fa fa-users" href="{{ route('admin.consultants.index')}}">Consultores</a>
                        </li>
                        <li><a class="fa fa-briefcase" href="{{ route('admin.clients.index')}}">Clientes</a></li>
                        <li><a class="fa fa-bolt" href="{{ route('admin.products.index')}}">Productos</a></li>
                        <li>
                            <a class="fa fa-cog" href="{{ route('admin.configuration.index')}}">Configuración</a>

                        </li>


                        <li>

                            <a class="fa fa-sign-out" href="{{ url('/logout') }}">Salir</a>
                        </li>
                    </ul>
                </div><!-- /gn-scroller -->
            </nav>
        </li>

        <li><a class="codrops-icon codrops-icon-prev" href="/"><span>Volver al sitio web</span></a></li>
        <li><a class="" href="/admin"><span>{{Auth::user()->name}}</span></a></li>
    </ul>


    <!-- fin navegacion -->

    <!--flash messages -->
    @if (Session::has('flash_notification.message'))
        @if (Session::has('flash_notification.overlay'))
            @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
        @else
            <div class="alert alert-{{ Session::get('flash_notification.level') }} admin-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! Session::get('flash_notification.message') !!}
            </div>
        @endif
    @endif
<!--flash messages -->
    @include('admin.templates.partials.errors')

    @yield('content')


</div><!-- /container -->


<footer>
    <div>
        <p class="text-center admin">Panel de control | <a href="http://housecreations.com.ve" target="_blank">HouseCreations</a>
            <?php echo date("Y"); ?> &copy;</p>
    </div>
</footer>


<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{--<script src="{{ asset('js/min/plugins.min.js') }}"></script>
<script src="{{ asset('js/medigo-custom.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/validator.js') }}"></script>--}}


@yield('js')

<script src="{{ asset('cpanel/js/classie.js') }}"></script>
<script src="{{ asset('cpanel/js/gnmenu.js') }}"></script>
<script>
    new gnMenu(document.getElementById('gn-menu'));
</script>
</body>
</html>
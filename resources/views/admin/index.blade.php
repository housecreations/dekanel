@extends('admin.templates.admin')

@section('title', 'Panel administracion')


@section('content')
    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Dashboard</h2>
                    <p>Administre el banner de la aplicación</p>
                </div>


                <div class="admin-slider">

                    <div class="col-md-12">
                        <h2>Slider</h2>

                  {{--<div class="front">
                            <a href="{{ route('admin.front.edit')}}">
                                @if(sizeof($carousel) > 0)
                                    <img src="images/slider/{{$carousel[0]->image_url}}" alt="">
                                @else
                                    <img src="images/slider/" alt="">
                                @endif
                                <div class="templatemo-gallery-image-overlay"></div>


                            </a>
                        </div>--}}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
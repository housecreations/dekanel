@extends('layouts.dekanel_layout')
@section('content')







<!-- Home Section -->



<section id="home">



<div class="slider-container">
            <div id="slider" class="sl-slider-wrapper">

                <!--Slider Items-->
                <div class="sl-slider">

                @foreach($carousel as $image)
                    <!--Slider Item2-->
                        <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="0" data-slice2-rotation="0" data-slice1-scale="1.5" data-slice2-scale="1.5">
                            <div class="sl-slide-inner">
                                <div class="">

                                        <img class="slider-img" src="/images/carousel/{{$image->image_url}}" alt="Imagen {{$image->id}}" />

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!--/Slider Items-->

                <!--Slider Next Prev button-->
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev"><i class="fa fa-angle-left"></i></span>
                    <span class="nav-arrow-next"><i class="fa fa-angle-right"></i></span>
                </nav>
                <!--/Slider Next Prev button-->

            </div>
            <!-- /slider-wrapper -->

</div>



       </section>





<!-- About Section -->

<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class=" section-title">
                    <h2>Nosotros</h2>

                </div>
            </div>


            <div class="col-md-12">
                <div class="col-md-6">

                    <img src="/images/foto-grupal.png" alt="" class="photo-group">

                </div>

                <div class="col-md-6">

                    <p class="intro">Somos un equipo de consultores integrales con más de 20 años impulsando el desarrollo de las personas y organizaciones.
                    </p>

                    <p>DISEÑAMOS programas de formación y talleres orientados a inspirar a la gente y a los equipos para obtener los mejores resultados.</p>
                    <hr class="hr-md">

                    <p>UTILIZAMOS técnicas tradicionales de aprendizaje experiencial y disciplinas de última generación.</p>
                    <hr class="hr-md">

                    <p>CONTAMOS con un equipo profesional especializado, creativo y en constante actualización.</p>
                    <hr class="hr-md">

                    <p>MANEJAMOS metodologías para la construcción de relaciones y el desarrollo cultural de las personas.</p>
                    <hr class="hr-md">

                    <p>BUSCAMOS cambios positivos que perduren en las organizaciones.</p>


                </div>
                <div class="col-md-12">
                <hr class="hr-lg">
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class=" section-title">
                    <h2>¿Cómo trabajamos?</h2>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 how-we-work">

                <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="col-md-2">
                        <p class="number-work">1</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">METODOLOGÍA <br> PRÁCTICO-EXPERIENCIAL Practicando lo aprendido.</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">

                    <div class="col-md-2">
                        <p class="number-work">2</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">CONSULTORES EXPERIMENTADOS <br> Compartiendo conocimientos de primera mano...</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.9s">

                    <div class="col-md-2">
                        <p class="number-work">3</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">CONTENIDO A LA MEDIDA <br> Experimentando el contenido desde tu necesidad.</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="1.2s">

                    <div class="col-md-2">
                        <p class="number-work">4</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">FEEDBACK <br> Intercambiando ideas y resultados</p>
                    </div>

                </div>

            </div>





          {{--  <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                <h2>Our Mobile App Team</h2>
                <h3 class="wow fadeInUp" data-wow-delay="0.8s">App Starter page is provided by templatemo that can be used for any site.</h3>
                <p class="wow fadeInUp" data-wow-delay="0.4s">This is a responsive <a href="https://plus.google.com/+templatemo" target="_blank">HTML CSS template</a> designed for your mobile app pages. You can modify and use it to fit your needs.</p>
            </div>

            <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                <div class="about-thumb">
                    <img src="images/team-img1.jpg" class="img-responsive" alt="Team">
                    <div class="about-overlay">
                        <h3>Sandar Lynn</h3>
                        <h4>UI Designer</h4>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                        </ul>
                    </div>
                </div>
            </div>--}}

            {{--<div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                <div class="about-thumb">
                    <img src="images/team-img2.jpg" class="img-responsive" alt="Team">
                    <div class="about-overlay">
                        <h3>Candy </h3>
                        <h4>UX Specialist</h4>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                </div>
            </div>--}}

        </div>
    </div>
</section>


<!-- Divider Section -->

<section id="products">
    <div class="container">
        <div class="row">


            <div class="col-md-12 col-sm-12">
                <div class="w section-title">
                    <h2>Nuestros productos</h2>

                </div>
            </div>

            <div class="col-md-12">

                @foreach($products as $product)
                
                <div class="col-md-2-4">
                    
                    <div class="col-md-12 text-center">
                        <img src="/images/products/{{$product->image_url}}" alt="" class="product-img">
                    </div>

                    <div class="col-md-12">

                        <p class="products-name">{{$product->name}}</p>

                    </div>

                    <div class="col-md-12">

                        <p class="products-description">{{$product->short_description}}</p>

                    </div>

                    <div class="col-md-12 text-center">

                        <a href="{{route('products.show', $product->slug)}}" class="product-link">Ver +</a>

                    </div>

                </div>
                
                @endforeach
                

            </div>

        </div>
    </div>
</section>




<section id="consultants">
    <div class="container">
        <div class="row">


            <div class="col-md-12 col-sm-12">
                <div class=" section-title">
                    <h2>Nuestros Consultores</h2>

                </div>
            </div>

            <div class="col-md-12">

                @foreach($consultants as $consultant)

                    <div class="col-md-6 consultants">

                        <div class="col-md-4 text-right">
                            <img src="/images/consultants/{{$consultant->profile_image_url}}" alt="" class="consultant-img">
                        </div>

                        <div class="col-md-8">

                            <p class="consultants-name">{{$consultant->name}} {{$consultant->last_name}}</p>
                            <p class="consultants-speciality">{{$consultant->speciality}}</p>
                            <p class="consultants-description">{{$consultant->description}}</p>
                        </div>

                    </div>

                @endforeach


            </div>

        </div>
    </div>
</section>


<!-- Screenshot Section -->

<section id="clients">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class=" section-title">
                    <h2>Nuestros Clientes</h2>

                </div>
            </div>

            <!-- Screenshot Owl Carousel -->
            <div id="screenshot-carousel" class="owl-carousel">



                @foreach($clients as $client)

                <div class="item col-md-12 text-center wow fadeInUp" data-wow-delay="0.9s">

                        <img src="/images/clients/{{$client->logo_url}}" class="img-clients" alt="screenshot">

                </div>

                @endforeach








            </div>

        </div>
    </div>
</section>


<!-- Pricing Section -->

<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class=" section-title">
                    <h2>Contáctenos</h2>

                </div>
            </div>

            <div class="col-md-12 contact-info">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="col-md-12 padding-bottom">
<div class="col-md-2">
                            <i class="fa fa-phone info-red"></i>
</div>
                            <div class="col-md-10">  {{App\ApplicationInformation::whereOption('phone_number')->first()->value}}
                            </div>
                    </div>
                    <div class="col-md-12 padding-bottom">
                        <div class="col-md-2">
                        <i class="fa fa-paper-plane info-yellow"></i>
                        </div>
                        <div class="col-md-10">
                        {{App\ApplicationInformation::whereOption('email')->first()->value}}
                        </div>
                    </div>

                    <div class="col-md-12 padding-bottom">
                        <div class="col-md-2">
                        <i class="fa fa-map-marker info-green"></i>
                        </div>
                        <div class="col-md-10">
                        {{App\ApplicationInformation::whereOption('address')->first()->value}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 padding-bottom">
                        <div class="col-md-2">
                            <i class="fa fa-linkedin info-blue"></i>
                        </div>
                        <div class="col-md-10">
                        <a class="dk-link" href="{{App\ApplicationInformation::whereOption('linked_in_url')->first()->value}}">Linked In</a>
                        </div>
                    </div>
                    <div class="col-md-12 padding-bottom">
                        <div class="col-md-2">
                            <i class="fa fa-facebook-f info-dark-blue"></i>
                        </div>
                        <div class="col-md-10">
                        <a class="dk-link" href="{{App\ApplicationInformation::whereOption('facebook_url')->first()->value}}">Facebook</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>



@endsection
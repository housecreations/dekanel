@extends('layouts.dekanel_layout')
@section('content')







<!-- Home Section -->

<section id="home" class="main">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
                <img src="images/home-img.png" class="img-responsive" alt="Home">
            </div>

            <div class="col-md-6 col-sm-7 col-xs-12">
                <div class="home-thumb">
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">App Starter Page</h1>
                    <p class="wow fadeInUp" data-wow-delay="0.8s">The optimal way to present your beautiful mobile app for your startup team. Let us create amazing things!</p>
                    <a href="#pricing" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Download App</a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- About Section -->

<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="wow bounceIn section-title">
                    <h2>Nosotros</h2>

                </div>
            </div>


            <div class="col-md-12">
                <div class="col-md-6"></div>

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
                <div class="wow bounceIn section-title">
                    <h2>¿Cómo trabajamos?</h2>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 how-we-work">

                <div class="col-md-3 col-sm-3">
                    <div class="col-md-2">
                        <p class="number-work">1</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">METODOLOGÍA <br> PRÁCTICO-EXPERIENCIAL Practicando lo aprendido.</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

                    <div class="col-md-2">
                        <p class="number-work">2</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">CONSULTORES EXPERIMENTADOS <br> Compartiendo conocimientos de primera mano...</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

                    <div class="col-md-2">
                        <p class="number-work">3</p>
                    </div>
                    <div class="col-md-10">
                        <p class="text-work">CONTENIDO A LA MEDIDA <br> Experimentando el contenido desde tu necesidad.</p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

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
                <div class="wow bounceIn section-title">
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

                        <a href="#" class="product-link">Ver +</a>

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
                <div class="wow bounceIn section-title">
                    <h2>Nuestros consultores</h2>

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

<section id="screenshot">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="section-title">
                    <h1>App Screenshots</h1>
                    <p class="wow fadeInUp" data-wow-delay="0.8s">Nulla nisi purus, ultrices et scelerisque at, ullamcorper et ex. Phasellus at nisi lobortis, semper tortor sed, gravida neque.</p>
                </div>
            </div>

            <!-- Screenshot Owl Carousel -->
            <div id="screenshot-carousel" class="owl-carousel">

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img1.jpg" class="image-popup">
                        <img src="images/screenshot-img1.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img2.jpg" class="image-popup">
                        <img src="images/screenshot-img2.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img3.jpg" class="image-popup">
                        <img src="images/screenshot-img3.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img4.jpg" class="image-popup">
                        <img src="images/screenshot-img4.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img5.jpg" class="image-popup">
                        <img src="images/screenshot-img5.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img6.jpg" class="image-popup">
                        <img src="images/screenshot-img6.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img7.jpg" class="image-popup">
                        <img src="images/screenshot-img7.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="images/screenshot-img8.jpg" class="image-popup">
                        <img src="images/screenshot-img8.jpg" class="img-responsive" alt="screenshot">
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- Pricing Section -->

<section id="pricing">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h1>App Pricing</h1>
                    <hr>
                </div>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.4s">
                <div class="pricing-plan">
                    <div class="pricing-month">
                        <h2>$60</h2>
                    </div>
                    <div class="pricing-title">
                        <h3>Starter</h3>
                    </div>
                    <p>40 Users</p>
                    <p>10GB per user</p>
                    <p>Unlimited Support</p>
                    <p>1 Year License</p>
                    <button class="btn btn-default section-btn">Register now</button>
                </div>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                <div class="pricing-plan">
                    <div class="pricing-month">
                        <h2>$120</h2>
                    </div>
                    <div class="pricing-title">
                        <h3>Business</h3>
                    </div>
                    <p>100 Users</p>
                    <p>20GB per user</p>
                    <p>Unlimited Support</p>
                    <p>2 Years License</p>
                    <button class="btn btn-default section-btn">Register now</button>
                </div>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.8s">
                <div class="pricing-plan">
                    <div class="pricing-month">
                        <h2>$200</h2>
                    </div>
                    <div class="pricing-title">
                        <h3>Advanced</h3>
                    </div>
                    <p>200 Users</p>
                    <p>30GB per user</p>
                    <p>Unlimted Support</p>
                    <p>3 Years License</p>
                    <button class="btn btn-default section-btn">Register now</button>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Newsletter Section -->

<section id="newsletter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="wow bounceIn section-title">
                    <h2>Subscribe Newsletter</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.5s">Maecenas orci sem, mollis quis risus a, venenatis condimentum felis. Integer ut bibendum ipsum. Etiam a tristique sapien, ut dictum augue.</p>
                </div>
                <div class="wow fadeInUp newsletter-form" data-wow-delay="0.8s">
                    <form action="#" method="post">
                        <div class="col-md-8 col-sm-7">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Your Email here">
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <input name="submit" type="submit" class="form-control" id="submit" value="Send Newsletter">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
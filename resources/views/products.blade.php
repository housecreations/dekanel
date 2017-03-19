@extends('layouts.dekanel_products')
@section('content')

    <section id="introduction">


        <div class="col-md-12">
            <div class="col-md-3"><img src="/images/products/beside/{{$product->beside_image_url}}" alt="Imagen" class="beside-img"></div>
            <div class="col-md-6">
                <div class="col-md-12">
                <h2>{{$product->name}}</h2>
                </div>
                <div class="col-md-12">
                <p><?php echo nl2br($product->description) ?></p>
                </div>
            </div>
            <div class="col-md-2">

                <img src="/images/products/consultants/{{$product->consultant_image_url}}" alt="" class="product-consultant-img">
                
            </div>
        </div>


    </section>
    <section id="workshops">

        <div class="col-md-12">

            @foreach($product->topics as $topic)

                <div class="col-md-12 product-container">
                    <div class="col-md-3">
                        <div class="col-md-12">
                        <p class="text-center topic-name">{{$topic->name}}</p>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <img src="/images/workshops/{{$topic->image_url}}" alt="" class="workshop-image">

                        </div>

                    </div>
                    <div class="col-md-7 topic-container">

                        @foreach($topic->subTopics as $subTopic)

                            <div class="col-md-12">
                                <p class="topic-description"><i class="fa fa-circle"></i> {{$subTopic->title}}</p>
                            </div>

                        @endforeach

                    </div>
                </div>

                <hr class="long-hr">
            @endforeach

        </div>


    </section>


@endsection
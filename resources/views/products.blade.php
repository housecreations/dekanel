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
            <div class="col-md-2"></div>
        </div>


    </section>
    <section id="workshops">

        <div class="col-md-12">

            @foreach($product->topics as $topic)

                <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="/images/workshops/{{$topic->image_url}}" alt="" class="workshop-image">
                    </div>
                    <div class="col-md-7">
                        @foreach($topic->subTopics as $subTopic)

                            <div class="col-md-12">
                                <p>{{$subTopic->title}}</p>
                            </div>

                        @endforeach
                    </div>
                </div>

            @endforeach

        </div>


    </section>


@endsection
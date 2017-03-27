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

            @foreach($product->topics()->orderBy('position', 'asc')->get() as $i => $topic)

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

                @if(! ($i == count($product->topics()->orderBy('position', 'asc')->get())-1) )
                <hr class="long-hr">
                @endif
            @endforeach

        </div>


    </section>

    <section id="other-products">
        <div class="container">
            <div class="row">


                <div class="col-md-12">

                    <div class="col-md-4">
                        <h2>Otros Productos</h2>

                    </div>

                    @foreach($otherProducts as $otherProduct)

                        <div class="col-md-4 products-container">

                            <div class="col-md-12 text-center">
                                <img src="/images/products/{{$otherProduct->image_url}}" alt="" class="product-img">
                            </div>

                            <div class="col-md-12">

                                <p class="products-name">{{$otherProduct->name}}</p>

                            </div>

                            <div class="col-md-12">

                                <p class="products-description">{{$otherProduct->short_description}}</p>

                            </div>

                            <div class="col-md-12 text-center">

                                <a href="{{route('products.show', $otherProduct->slug)}}" class="product-link">Ver +</a>

                            </div>

                        </div>

                    @endforeach


                </div>

            </div>
        </div>
    </section>


@endsection
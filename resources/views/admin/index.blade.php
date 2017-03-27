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
                        <a data-toggle="modal" data-target="#addCarousel" class="btn btn-success pull-right">Agregar nueva imagen</a>
                        <br>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">


                        @foreach($images as $i => $image)

                        <div class="col-md-6 thumbnail" id="{{$image->position}}">

                            <div class="carousel-image-container">
                            <img src="/images/carousel/{{$image->image_url}}" alt="" class="" style="height: 190px;">

                            <p class="carousel-text {{$image->position_class}}" style="color: {{$image->color_code}};">{{$image->text}}</p>
                            </div>
                            <hr>
                            <div class="col-md-12">

                                <a data-toggle="modal" data-target="#editCarousel" data-image="{{$image->id}}" href="#" class="btn btn-primary edit_carousel">Editar</a>
                                <a data-toggle="modal" data-target="#deleteCarousel" data-image="{{$image->id}}" href="#" class="btn btn-danger delete_carousel">Eliminar</a>

                                <a class="btn btn-default change_text_color" id="change_text_color">Cambiar color</a>


                                    @if($i == count($images)-1)
                                <a class="btn btn-warning to_change pull-right hidden" data-side="right" data-url="carousel"><i class="fa fa-arrow-right"></i> </a>
                                    @else
                                    <a class="btn btn-warning to_change pull-right" data-side="right" data-url="carousel"><i class="fa fa-arrow-right"></i> </a>
                                    @endif

                                @if($i == 0)
                                <a  style="margin-right: 5px;" class="btn btn-warning to_change pull-right hidden" data-side="left" data-url="carousel"><i class="fa fa-arrow-left"></i> </a>
                                @else
                                <a  style="margin-right: 5px;" class="btn btn-warning to_change pull-right" data-side="left" data-url="carousel"><i class="fa fa-arrow-left"></i> </a>
                                @endif
                            </div>

                        </div>
                        @endforeach
                        
                    </div>



                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="addCarousel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nueva imagen</h4>
                </div>

                {!! Form::open(['route' => 'admin.carousel.store', 'method' => 'POST', 'files' => true ]) !!}

                <div class="modal-body">

                    <div class="form-group">

                        {!! Form::text('text', null, ['class' => 'form-control', 'required', 'placeholder' => 'Texto del banner']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('position_class', 'Posición del texto') !!}
                        {!! Form::select('position_class', ['top-left' => 'Superior Izquierdo',
                                                                 'top-right' => 'Superior Derecho',
                                                                 'bottom-left' => 'Inferior Izquierdo',
                                                                 'bottom-right' => 'Inferior Derecho',
                                                                 'center' => 'Centro'], null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione la posición']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image_url', 'Imagen del banner') !!}
                        {!! Form::file('image_url', ['required']) !!}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCarousel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar imagen</h4>
                </div>

                {!! Form::open(['route' => 'admin.carousel.update', 'method' => 'PUT', 'files' => true ]) !!}
                {!! Form::hidden('edit_image_id', null, ['id' => 'edit_image_id']) !!}
                <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('edit_text', 'Texto del banner') !!}
                        {!! Form::text('edit_text', null, ['class' => 'form-control', 'required', 'placeholder' => 'Texto del banner']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_position_class', 'Posición del texto') !!}
                        {!! Form::select('edit_position_class', ['top-left' => 'Superior Izquierdo',
                                                                 'top-right' => 'Superior Derecho',
                                                                 'bottom-left' => 'Inferior Izquierdo',
                                                                 'bottom-right' => 'Inferior Derecho',
                                                                 'center' => 'Centro'], null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_image_url', 'Imagen del banner') !!}
                        {!! Form::file('edit_image_url') !!}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteCarousel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar imagen</h4>
                </div>

                {!! Form::open(['route' => 'admin.carousel.destroy', 'method' => 'DELETE', 'files' => true ]) !!}
                {!! Form::hidden('delete_image_id', null, ['id' => 'delete_image_id']) !!}
                <div class="modal-body">


                        <p>¿Seguro que desea eliminar la imagen?</p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger pull-right">Sí, eliminar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
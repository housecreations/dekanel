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
                        
                        @foreach($images as $image)
                        <div class="col-md-6 thumbnail">
                            <img src="/images/carousel/{{$image->image_url}}" alt="" class="" style="height: 190px;">

                            <hr>
                            <div class="col-md-12">
                                <a data-toggle="modal" data-target="#editCarousel" data-image="{{$image->id}}" href="#" class="btn btn-primary edit_carousel">Editar</a>
                                <a data-toggle="modal" data-target="#deleteCarousel" data-image="{{$image->id}}" href="#" class="btn btn-danger delete_carousel">Eliminar</a>

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
                        {!! Form::label('edit_image_url', 'Imagen del banner') !!}
                        {!! Form::file('edit_image_url', ['required']) !!}

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
@extends('admin.templates.admin')


@section('title', 'Lista de talleres')


@section('content')

    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Talleres de {{$product->name}}</h2>
                    <p>Gestione los talleres para {{$product->name}}</p>
                </div>

                <div class="admin-slider">

                    <div class="col-md-12">
                        <a href="{{ url('admin/products')}}" class="btn btn-default">Atrás</a>
                        <a data-toggle="modal" data-target="#addWorkshop" class="btn btn-success pull-right">Registrar nuevo taller</a>
                        <hr>
                    </div>

                    <!-- Buscador de usuarios -->

                    <div class="col-md-12">

                        <div class="col-md-8">
                            <h5>Lista de talleres</h5>
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::open(['route' => ['admin.products.workshops.index', $product->id], 'method' => 'GET', 'class' => 'navbar-form']) !!}

                            <div class="input-group">

                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar taller por nombre...', 'aria-describedby' => 'searchWorkshops']) !!}
                                <span class="input-group-addon" id="searchWorkshops"><span class="glyphicon glyphicon-search"
                                                                                          aria-hidden="true"></span></span>

                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>

                    <!-- Fin buscador-->

                    <div class="col-md-12">
                        <table class='table table-hover'>

                            <thead>

                            <th>Imagen</th>
                            <th>Título</th>
                            <th style="width: 250px;">Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($workshops as $workshop)
                                <tr>

                                    <td><img src="/images/workshops/{{$workshop->image_url}}" alt="" class="thumbnail thumbnail-table"></td>
                                    <td>{{$workshop->name}}</td>
                                    <td style="width: 250px;">
                                        <a href="" data-toggle="modal" data-workshop="{{$workshop->id}}" data-target="#showWorkshop" class='show_workshop'><span class="label label-default">Ver</span></a>
                                        <a href="" data-toggle="modal" data-workshop="{{$workshop->id}}" data-target="#editWorkshop" class='edit_workshop'><span class="label label-primary">Editar</span></a>
                                        <a href="" data-toggle="modal" data-workshop="{{$workshop->id}}" data-target="#addDescription" class='add_description'><span class="label label-info">Descripción</span></a>
                                        <a href="" data-toggle="modal" data-workshop="{{$workshop->id}}" data-target="#deleteWorkshop" class='remove_workshop'><span class="label label-danger">Eliminar</span></a></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            {!! $workshops->render() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addWorkshop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo taller</h4>
                </div>

                {!! Form::open(['route' => 'admin.products.workshops.store', 'method' => 'POST', 'files' => true ]) !!}


                {!! Form::hidden('product_id', $product->id) !!}

                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del taller']) !!}
                        </div>


                    </div>

                    <div class="form-group">
                        {!! Form::label('image_url', 'Imagen del taller') !!}
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


    <div class="modal fade" id="deleteWorkshop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">¿Está seguro que desea eliminar este taller?</h4>
                </div>

                {!! Form::open(['route' => ['admin.products.workshops.destroy', $product->id], 'method' => 'DELETE']) !!}

                {!! Form::hidden('workshop_id', null, ['id' => 'workshop_id_field']) !!}
                <div class="modal-body">

                    <div id="workshop-info">
                        {{--Llenar con ajax--}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger pull-right">Eliminar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="showWorkshop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Información del taller</h4>
                </div>




                <div class="modal-body">

                    <div id="show-workshop-info">

                        <div class="col-md-4 text-center">
                            <img id="workshop-img" src="" alt="" class="thumbnail">
                        </div>

                        <p>Nombre: <span id="workshop-name"></span></p>

                        <br><br>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editWorkshop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar taller</h4>
                </div>

                {!! Form::open(['route' => ['admin.products.workshops.update', $product->id], 'method' => 'PUT', 'files' => true, 'id' => 'editWorkshop' ]) !!}

                {!! Form::hidden('edit_workshop_id', null, ['id' => 'edit_workshop_id']) !!}
                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('edit_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del taller']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_image_url', 'Imagen del taller') !!}
                        {!! Form::file('edit_image_url') !!}

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnEditWorkshop">Actualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <div class="modal fade" id="addDescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Descripciones de taller</h4>
                </div>

                {!! Form::open(['route' => ['admin.products.workshops.descriptions.update',0], 'method' => 'PUT' ]) !!}

                {!! Form::hidden('workshop_id', null, ['id' => 'workshop_id']) !!}
                <div class="modal-body">
                    <p>Descripciones</p>

                    <div id="properties">
                    </div>
                    <div class="form-group">
                        <a href="#" id="addPropertyLink">Agregar otra descripción <i class="fa fa-plus-square"></i></a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success ">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>



@endsection
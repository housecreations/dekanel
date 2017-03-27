@extends('admin.templates.admin')


@section('title', 'Lista de consultores')


@section('content')

    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Consultores</h2>
                    <p>Gestione los consultores</p>
                </div>

                <div class="admin-slider">

                    <div class="col-md-12">
                    <a href="{{ url('admin/')}}" class="btn btn-default">Atrás</a>
                    <a data-toggle="modal" data-target="#addConsultant" class="btn btn-success pull-right">Registrar nuevo consultor</a>
                        <hr>
                    </div>

                    <!-- Buscador de usuarios -->

                    <div class="col-md-12">

                        <div class="col-md-8">
                            <h5>Lista de consultores</h5>
                        </div>
                        <div class="col-md-4 pull-right">
                        {!! Form::open(['route' => 'admin.consultants.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}

                        <div class="input-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar consultor por nombre...', 'aria-describedby' => 'searchConsultants']) !!}
                            <span class="input-group-addon" id="searchConsultants"><span class="glyphicon glyphicon-search"
                                                                                  aria-hidden="true"></span></span>

                        </div>

                            {!! Form::close() !!}
                        </div>

                    </div>

                <!-- Fin buscador de usuarios -->

                    <div class="col-md-12">
                        <table class='table table-hover'>

                            <thead>

                            <th>Posición</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Descripción</th>

                            <th style="width: 200px">Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($consultants as $i => $consultant)
                                <tr id="{{$consultant->position}}">

                                    <td>
                                        @if($i == 0)
                                        <a class="btn btn-warning to_change hidden" data-side="left" data-url="consultants"><i class="fa fa-arrow-up"></i> </a>
                                        @else
                                            <a class="btn btn-warning to_change" data-side="left" data-url="consultants"><i class="fa fa-arrow-up"></i> </a>
                                        @endif

                                            @if($i == count($consultants)-1)
                                        <a  style="margin-top: 5px;" class="btn btn-warning to_change hidden" data-side="right" data-url="consultants"><i class="fa fa-arrow-down"></i> </a>
                                        @else
                                            <a  style="margin-top: 5px;" class="btn btn-warning to_change" data-side="right" data-url="consultants"><i class="fa fa-arrow-down"></i> </a>
                                            @endif
                                    </td>
                                    <td><img src="/images/consultants/{{$consultant->profile_image_url}}" alt="" class="thumbnail thumbnail-table"></td>
                                    <td>{{$consultant->name}}</td>
                                    <td>{{$consultant->last_name}}</td>
                                    <td>{{$consultant->description}}</td>



                                    <td>
                                        <a href="" data-toggle="modal" data-consultant="{{$consultant->id}}" data-target="#editConsultant" class='edit_consultant'><span class="label label-primary">Editar</span></a>
                                        <a href="" data-toggle="modal" data-consultant="{{$consultant->id}}" data-target="#showConsultant" class='show_consultant'><span class="label label-default">Ver</span></a>
                                    <a href="" data-toggle="modal" data-consultant="{{$consultant->id}}" data-target="#deleteConsultant" class='remove_consultant'><span class="label label-danger">Eliminar</span></a></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            {!! $consultants->render() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addConsultant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo consultor</h4>
                </div>

                {!! Form::open(['route' => 'admin.consultants.store', 'method' => 'POST', 'files' => true ]) !!}

                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del consultor']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::text('last_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido del consultor']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del consultor']) !!}
                        </div>



                    </div>

                    <div class="form-group">
                        {!! Form::label('profile_image_url', 'Imagen del consultor (230x230)') !!}
                        {!! Form::file('profile_image_url', ['required']) !!}

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


    <div class="modal fade" id="deleteConsultant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar consultor</h4>
                </div>

                {!! Form::open(['route' => ['admin.consultants.destroy', 0], 'method' => 'DELETE']) !!}

                {!! Form::hidden('consultant_id', null, ['id' => 'consultant_id_field']) !!}
                <div class="modal-body">

                    <div id="consultant-info">
                        <p>¿Está seguro que desea eliminar este consultor?</p>
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

    <div class="modal fade" id="showConsultant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Información del consultor</h4>
                </div>

                <div class="modal-body">

                    <div id="show-consultant-info">

                        <div class="col-md-4 text-center">
                            <img id="consultant-img" src="" alt="" class="thumbnail">
                        </div>

                        <div class="col-md-8">
                        <p>Nombre: <span id="consultant-name"></span></p>
                        <p>Apellido: <span id="consultant-last-name"></span></p>
                        <p>Descripcion: <span id="consultant-description"></span></p>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editConsultant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar consultor</h4>
                </div>

                {!! Form::open(['route' => ['admin.consultants.update', 0], 'method' => 'PUT', 'files' => true, 'id' => 'editConsultant' ]) !!}

                {!! Form::hidden('edit_consultant_id', null, ['id' => 'edit_consultant_id']) !!}
                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('edit_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del consultor']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::text('edit_last_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido del consultor']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::textarea('edit_description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del consultor']) !!}
                        </div>



                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_profile_image_url', 'Imagen del consultor (230x230)') !!}
                        {!! Form::file('edit_profile_image_url') !!}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnEditConsultant">Actualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
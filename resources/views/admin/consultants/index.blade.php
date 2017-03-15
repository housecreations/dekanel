@extends('admin.templates.admin')


@section('title', 'Lista de usuarios')


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

                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Descripción</th>
                            <th>Especialidad</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($consultants as $consultant)
                                <tr>

                                    <td>Imagen</td>
                                    <td>{{$consultant->name}}</td>
                                    <td>{{$consultant->last_name}}</td>
                                    <td>{{$consultant->description}}</td>
                                    <td>{{$consultant->speciality}}</td>


                                    <td>
                                        <a href="" class=''><span class="label label-primary">Editar</span></a>
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

                        <div class="form-group">

                            {!! Form::text('speciality', null, ['class' => 'form-control', 'required', 'placeholder' => 'Especialidad del consultor']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::label('profile_image_url', 'Imagen del consultor') !!}
                        {!! Form::file('profile_image_url') !!}

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
                    <h4 class="modal-title" id="myModalLabel">¿Está seguro que desea eliminar este consultor?</h4>
                </div>

                {!! Form::open(['route' => ['admin.consultants.destroy', 0], 'method' => 'DELETE']) !!}

                {!! Form::hidden('consultant_id', null, ['id' => 'consultant_id_field']) !!}
                <div class="modal-body">

                    <div id="consultant-info">
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


@endsection
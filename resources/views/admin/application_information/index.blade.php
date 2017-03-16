@extends('admin.templates.admin')

@section('title', 'Configuración')


@section('content')
    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Configuración</h2>
                    <p>Administre la información de la aplicación</p>
                </div>


                <div class="admin-slider">


                        <div class="col-md-12">
                            <a href="{{ url('admin/')}}" class="btn btn-default">Atrás</a>

                            <hr>
                        </div>

                    <div class="col-md-12">

                        <div class="col-md-8">
                            <h5>Lista de configuraciones</h5>
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::open(['route' => 'admin.configuration.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}

                            <div class="input-group">

                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar configuración por nombre...', 'aria-describedby' => 'searchConfigurations']) !!}
                                <span class="input-group-addon" id="searchConfigurations"><span class="glyphicon glyphicon-search"
                                                                                         aria-hidden="true"></span></span>

                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>

                    <div class="col-md-12">
                        <table class='table table-hover'>

                            <thead>

                            <th>Título</th>
                            <th>Valor</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($configurations as $configuration)
                                <tr>


                                    <td>{{$configuration->label}}</td>
                                    <td>{{$configuration->value}}</td>
                                    <td>
                                        <a href="" data-toggle="modal" data-configuration="{{$configuration->id}}" data-target="#editConfiguration" class='edit_configuration'><span class="label label-primary">Editar</span></a>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            {!! $configurations->render() !!}
                        </div>
                    </div>



                    </div>



            </div>
        </div>
    </div>


    <div class="modal fade" id="editConfiguration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar configuración</h4>
                </div>

                {!! Form::open(['route' => ['admin.configuration.update', 0], 'method' => 'PUT', 'id' => 'editConfiguration' ]) !!}

                {!! Form::hidden('edit_configuration_id', null, ['id' => 'edit_configuration_id']) !!}
                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('edit_value', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nueva configuración']) !!}
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnEditConfiguration">Actualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
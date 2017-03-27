@extends('admin.templates.admin')


@section('title', 'Lista de clientes')


@section('content')

    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Clientes</h2>
                    <p>Gestione los clientes</p>
                </div>

                <div class="admin-slider">

                    <div class="col-md-12">
                        <a href="{{ url('admin/')}}" class="btn btn-default">Atrás</a>
                        <a data-toggle="modal" data-target="#addClient" class="btn btn-success pull-right">Registrar nuevo cliente</a>
                        <hr>
                    </div>

                    <!-- Buscador de usuarios -->

                    <div class="col-md-12">

                        <div class="col-md-8">
                            <h5>Lista de clientes</h5>
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::open(['route' => 'admin.clients.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}

                            <div class="input-group">

                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar cliente por nombre...', 'aria-describedby' => 'searchClients']) !!}
                                <span class="input-group-addon" id="searchClients"><span class="glyphicon glyphicon-search"
                                                                                             aria-hidden="true"></span></span>

                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>

                    <!-- Fin buscador de usuarios -->

                    <div class="col-md-12">
                        <table class='table table-hover'>

                            <thead>

                            <th style="width: 100px;">Posición</th>
                            <th>Logo</th>

                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($clients as $i => $client)
                                <tr id="{{$client->position}}">

                                    <td>

                                        @if($i == 0)
                                            <a class="btn btn-warning to_change hidden" data-side="left" data-url="clients"><i class="fa fa-arrow-up"></i> </a>
                                        @else
                                            <a class="btn btn-warning to_change" data-side="left" data-url="clients"><i class="fa fa-arrow-up"></i> </a>
                                        @endif

                                        @if($i == count($clients)-1)
                                            <a  style="margin-top: 5px;" class="btn btn-warning to_change hidden" data-side="right" data-url="clients"><i class="fa fa-arrow-down"></i> </a>
                                        @else
                                            <a  style="margin-top: 5px;" class="btn btn-warning to_change" data-side="right" data-url="clients"><i class="fa fa-arrow-down"></i> </a>
                                        @endif

                                    </td>

                                    <td><img src="/images/clients/{{$client->logo_url}}" alt="" class="thumbnail clients-logo"></td>

                                    <td>
                                        <a href="" data-toggle="modal" data-client="{{$client->id}}" data-target="#editClient" class='edit_client'><span class="label label-primary">Editar</span></a>

                                        <a href="" data-toggle="modal" data-client="{{$client->id}}" data-target="#deleteClient" class='remove_client'><span class="label label-danger">Eliminar</span></a></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            {!! $clients->render() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo cliente</h4>
                </div>

                {!! Form::open(['route' => 'admin.clients.store', 'method' => 'POST', 'files' => true ]) !!}

                <div class="modal-body">

                    <div class="to-hide">




                    </div>

                    <div class="form-group">
                        {!! Form::label('logo_url', 'Imagen del cliente') !!}
                        {!! Form::file('logo_url', ['required']) !!}

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


    <div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">¿Está seguro que desea eliminar este cliente?</h4>
                </div>

                {!! Form::open(['route' => ['admin.clients.destroy', 0], 'method' => 'DELETE']) !!}

                {!! Form::hidden('client_id', null, ['id' => 'client_id_field']) !!}
                <div class="modal-body">

                    <div id="client-info">
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

    <div class="modal fade" id="showClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Información del cliente</h4>
                </div>




                <div class="modal-body">

                    <div id="show-client-info">

                        <div class="col-md-4 text-center">
                            <img id="client-img" src="" alt="" class="thumbnail">
                        </div>


                        <br><br><br>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar cliente</h4>
                </div>

                {!! Form::open(['route' => ['admin.clients.update', 0], 'method' => 'PUT', 'files' => true, 'id' => 'editClient' ]) !!}

                {!! Form::hidden('edit_client_id', null, ['id' => 'edit_client_id']) !!}
                <div class="modal-body">

                    <div class="to-hide">



                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_logo_url', 'Imagen del cliente') !!}
                        {!! Form::file('edit_logo_url') !!}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnEditClient">Actualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
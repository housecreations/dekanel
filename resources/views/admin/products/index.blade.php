@extends('admin.templates.admin')


@section('title', 'Lista de productos')


@section('content')

    <div class="container">

        <div class='admin-container'>

            <div class="col-md-12 col-xs-12">

                <div class="admin-breadcrumb">
                    <h2>Productos</h2>
                    <p>Gestione los productos</p>
                </div>

                <div class="admin-slider">

                    <div class="col-md-12">
                        <a href="{{ url('admin/')}}" class="btn btn-default">Atrás</a>
                        <a data-toggle="modal" data-target="#addProduct" class="btn btn-success pull-right">Registrar nuevo producto</a>
                        <hr>
                    </div>

                    <!-- Buscador de usuarios -->

                    <div class="col-md-12">

                        <div class="col-md-8">
                            <h5>Lista de productos</h5>
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::open(['route' => 'admin.products.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}

                            <div class="input-group">

                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar producto por nombre...', 'aria-describedby' => 'searchProducts']) !!}
                                <span class="input-group-addon" id="searchProducts"><span class="glyphicon glyphicon-search"
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
                            <th>Imagen consultor</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>

                                    <td><img src="/images/products/{{$product->image_url}}" alt="" class="thumbnail thumbnail-table"></td>
                                    <td><img src="/images/products/{{$product->consultant_image_url}}" alt="" class="thumbnail thumbnail-table"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <a href="" data-toggle="modal" data-product="{{$product->id}}" data-target="#showProduct" class='show_product'><span class="label label-default">Ver</span></a>
                                        <a href="" data-toggle="modal" data-product="{{$product->id}}" data-target="#editProduct" class='edit_product'><span class="label label-primary">Editar</span></a>
                                        <a href="{{route('admin.products.workshops.index', $product->id)}}" ><span class="label label-default">Talleres</span></a>
                                        <a href="" data-toggle="modal" data-product="{{$product->id}}" data-target="#deleteProduct" class='remove_product'><span class="label label-danger">Eliminar</span></a></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            {!! $products->render() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo producto</h4>
                </div>

                {!! Form::open(['route' => 'admin.products.store', 'method' => 'POST', 'files' => true ]) !!}

                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del producto']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del producto']) !!}
                        </div>



                    </div>

                    <div class="form-group">
                        {!! Form::label('image_url', 'Imagen del producto') !!}
                        {!! Form::file('image_url', ['required']) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::label('consultant_image_url', 'Imagen del consultor') !!}
                        {!! Form::file('consultant_image_url', ['required']) !!}

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


    <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">¿Está seguro que desea eliminar este producto?</h4>
                </div>

                {!! Form::open(['route' => ['admin.products.destroy', 0], 'method' => 'DELETE']) !!}

                {!! Form::hidden('product_id', null, ['id' => 'product_id_field']) !!}
                <div class="modal-body">

                    <div id="product-info">
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

    <div class="modal fade" id="showProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Información del producto</h4>
                </div>




                <div class="modal-body">

                    <div id="show-product-info">

                        <div class="col-md-4 text-center">
                            <img id="product-img" src="" alt="" class="thumbnail">
                            <img id="product-consultant-img" src="" alt="" class="thumbnail">
                        </div>

                        <p>Nombre: <span id="product-name"></span></p>
                        <p>Descripcion: <span id="product-description"></span></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar producto</h4>
                </div>

                {!! Form::open(['route' => ['admin.products.update', 0], 'method' => 'PUT', 'files' => true, 'id' => 'editProduct' ]) !!}

                {!! Form::hidden('edit_product_id', null, ['id' => 'edit_product_id']) !!}
                <div class="modal-body">

                    <div class="to-hide">

                        <div class="form-group">

                            {!! Form::text('edit_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del producto']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::textarea('edit_description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del producto']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_image_url', 'Imagen del producto') !!}
                        {!! Form::file('edit_image_url') !!}

                    </div>

                    <div class="form-group">
                        {!! Form::label('edit_consultant_image_url', 'Imagen del consultor') !!}
                        {!! Form::file('edit_consultant_image_url') !!}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnEditProduct">Actualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">

    <div class="row align-items-start">
        <div class="col-12">
            <h2 style="text-align:center">Agregar producto</h2>
            <form method="POST" action="{{action('App\Http\Controllers\ProductosController@store')}}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($msg))
                {{$msg}}
                @endif

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <label for="descripcion">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <label for="descripcion">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <label for="imagen">Imagen referencial</label>
                            <input type="file" class="form-control" name="file" id="imagen">
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="estado" id="estado">
                            <label class="form-check-label" for="estado">¿Publicar?</label>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row text-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success" id="botonAgregar">Agregar producto</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>





                <br>


            </form>

        </div>

    </div>

</div>


@stop
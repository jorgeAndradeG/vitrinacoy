<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">

    <div class="row align-items-start">
        <div class="col-12">
            <h2 style="text-align:center">Editar producto</h2>
            <form method="POST" action="{{action('App\Http\Controllers\ProductosController@update',$producto->id)}}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @if(isset($msg))
                <p style="color:red; text-align:center;">{{$msg}}</p>
                @endif
                <div class="form-floating mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}"
                        required>
                </div>
                <div class="form-floating mb-3">
                    <label for="descripcion">descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" required>
                </div>
                <div class="form-floating mb-3">
                    <label for="imagen">Imagen</label>
                    <img src="/{{$producto->foto}}" class="img-thumbnail" alt="..." width="200" height="100">
                    <br>
                    <input type="file" class="form-control" name="file" id="imagen">
                </div>
                <div class="form-check">
                    @if($producto->estado == 1)
                    <input class="form-check-input" type="checkbox" name="estado" id="estado" checked>
                    @else
                    <input class="form-check-input" type="checkbox" name="estado" id="estado">
                    @endif
                    <label class="form-check-label" for="estado">¿Publicar?</label>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="botonAgregar">Editar producto</button>
            </form>
        </div>
    </div>
</div>


@stop
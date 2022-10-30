<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <div class="row align-items-start">
        <div class="col-12">
            <h2 style="text-align:center">Agregar producto</h2>
            <form method="POST" action="{{action('App\Http\Controllers\ProductosController@store')}}" enctype="multipart/form-data">
                @csrf
                @if(isset($msg))
                {{$msg}}
                @endif
                <div class="form-floating mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required >
                </div>
                <div class="form-floating mb-3">
                    <label for="descripcion">descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-floating mb-3">
                    <label for="imagen">imagen</label>
                    <input type="file" class="form-control" name="file" id="imagen">
                </div>
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="estado" id="estado">
                        <label class="form-check-label" for="estado">¿Publicar?</label>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="botonAgregar">Agregar producto</button>
                    

            </form>

        </div>

    </div>

</div>


@stop
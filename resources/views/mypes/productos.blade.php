<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@extends('adminlte::page')

@section('title', 'Productos')


@section('content')

<div class="container-fluid">
    <h3 style="text-align:center">Productos</h3>
    <div class="form-floating mb-3" style="text-align: right;">
            <a href="{{action('App\Http\Controllers\ProductosController@create')}}" type="button" class="btn btn-success">Agregar Producto</a>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>descripcion</th>
                <th>Estado</th>
                <th>Foto</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            @if($producto->estado == 1)
                    <td><p style="color:green">Activo</p></td>
                @else
                    <td><p style="color:red">Inactivo</p></td>
                @endif
            <td>{{$producto->foto}}</td>
            <td><a href="{{action('App\Http\Controllers\ProductosController@edit', $producto->id)}}" type="button" class="btn btn-success btn-sm"> <i class="far fa-edit"></i></a></td>
            <td><a href="" type="button" class="btn btn-danger btn-sm ventana" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='{{$producto->id}}'> <i class="far fa-trash-alt"></i></a></td>
            <td></td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>
@stop 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\ProductosController@eliminar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea eliminar este producto? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Eliminar</button>
                        </div>
                </form>
               
                    
                </div>
            </div>
</div>

<script>
$(document).on("click",".ventana",function(){
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#exampleModal').modal('show');
});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@extends('adminlte::page')

@section('title', 'Productos')


@section('content')

<div class="container-fluid">
    <h3 style="text-align:center">Productos</h3>
    <div class="form-floating mb-3" style="text-align: right;">
        <a href="{{action('App\Http\Controllers\ProductosController@create')}}" type="button"
            class="btn btn-success">Agregar Producto</a>
    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Habilitar/Deshabilitar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td scope="row"><img src="{{$producto->foto}}" width="100" height="100"></td>
                    <td scope="row">{{$producto->nombre}}</td>
                    <td scope="row">{{$producto->precio}}</td>
                    <td scope="row">{{$producto->stock}}</td>
                    @if($producto->estado == 1)
                    <td scope="row">
                        <p style="color:green">Activo</p>
                    </td>
                    @else
                    <td scope="row">
                        <p style="color:red">Inactivo</p>
                    </td>
                    @endif
                    <td scope="row"><a href="{{action('App\Http\Controllers\ProductosController@edit', $producto->id)}}"
                            type="button" class="btn btn-success btn-sm"> <i class="far fa-edit"></i></a></td>

                    @if($producto->estado == 1)
                    <td scope="row"><a type="button" class="btn btn-danger btn-sm ventana" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id='{{$producto->id}}'><small style="color:white"><b>Deshabilitar</b></small></a>
                    </td>
                    @else
                    <td scope="row"><a type="button" class="btn btn-success btn-sm ventana-habilitar" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id='{{$producto->id}}'><small style="color:white"><b>Habilitar</b></small></a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deshabilitar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{action('App\Http\Controllers\ProductosController@eliminar')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>¿Está seguro que desea deshabilitar este producto? </p>
                    <input type="hidden" name="modalid" id="modalid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deshabilitar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalHabilitar" tabindex="-1" aria-labelledby="exampleModalHabilitarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalHabilitarLabel">Habilitar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{action('App\Http\Controllers\ProductosController@eliminar')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>¿Está seguro que desea habilitar este producto? </p>
                    <input type="hidden" name="modalid" id="modalidhabilitar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Habilitar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on("click", ".ventana", function() {
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#exampleModal').modal('show');
});

$(document).on("click", ".ventana-habilitar", function() {
    var Id = $(this).data('id');
    $(".modal-body #modalidhabilitar").val(Id);
    $('#exampleModalHabilitar').modal('show');
});
</script>
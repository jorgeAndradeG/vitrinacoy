<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('adminlte::page')

@section('title', 'Beneficios')

@section('content')
<div class="container-fluid">
    <h3 style="text-aling:center">Listado de Beneficios</h3>
    <div class="form-floating mb-3" style="text-align: right;">
        <a href="{{action('App\Http\Controllers\BeneficiosController@create')}}" type="button"
            class="btn btn-success">Agregar Beneficio</a>
    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Habilitar/Deshabilitar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beneficios as $beneficio)
                <tr>
                    <th>{{$beneficio->nombre}}</th>
                    @if($beneficio->estado == 1)
                    <td>
                        <p style="color:green">Activo</p>
                    </td>
                    @else
                    <td>
                        <p style="color:red">Inactivo</p>
                    </td>
                    @endif
                    <td><a href="{{action('App\Http\Controllers\BeneficiosController@edit', $beneficio->id)}}"
                            type="button" class="btn btn-success btn-sm"> <i class="far fa-edit"></i></a></td>
                    @if($beneficio->estado == 1)
                    <td><a type="button" class="btn btn-danger btn-sm ventana" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id='{{$beneficio->id}}'><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                    @else
                    <td><a type="button" class="btn btn-success btn-sm restore" data-bs-toggle="modal-restore"
                            data-bs-target="#restoreModal" data-id='{{$beneficio->id}}'><i
                                class="fas fa-trash-restore"></i></a></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Deshabilitar Beneficio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>

            <form method="POST" action="{{action('App\Http\Controllers\BeneficiosController@deshabilitar')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>¿Esta seguro que desea deshabilitar este Beneficio? </p>
                    <input type="hidden" name="modalid" id="modalid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Deshabilitar</button>
                </div>
            </form>


        </div>
    </div>
</div>

<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Habilitar Beneficio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>

            <form method="POST" action="{{action('App\Http\Controllers\BeneficiosController@deshabilitar')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>¿Esta seguro que desea habilitar este beneficio? </p>
                    <input type="hidden" name="modalid" id="modalid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
</script>

<script>
$(document).on("click", ".restore", function() {
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#restoreModal').modal('show');
});
</script>
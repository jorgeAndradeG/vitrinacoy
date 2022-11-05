<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid" >
        <h3 style="text-aling:center">Listado de Mypes</h3>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rubro</th>
            <th scope="col">Estado</th>
            <th scope="col">Estadisticas</th>
            <th scope="col">Habilitar/Deshabilitar</th>
    
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        @if($user->es_admin == 0)
            <tr>
                <th>{{$user->name}}</th>
                <th>{{$user->email}}</th>
                <th>{{$user->id_rubro}}</th>
                @if($user->estado == 1)
                    <td><p style="color:green">Activo</p></td>
                @else
                    <td><p style="color:red">Inactivo</p></td>
                @endif
                <td><a type="button" class="btn btn-success btn-sm" href=""><i class="bi bi-bar-chart-line"></i></a></td>
                @if($user->estado == 1)
                <td><a type="button" class="btn btn-danger btn-sm ventana"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='{{$user->id}}'><i class="far fa-trash-alt"></i></a></td>
                @else
                <td><a type="button" class="btn btn-success btn-sm restore"  data-bs-toggle="modal-restore" data-bs-target="#restoreModal" data-id='{{$user->id}}'><i class="fas fa-trash-restore"></i></a></td>
                @endif
            </tr>
        @endif
        @endforeach
    </tbody>
</table>

</div>
@stop 


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\AdminController@deshabilitar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea deshabilitar a este usuario? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Habilitar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\AdminController@deshabilitar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea habilitar a este usuario? </p>
                            <input type="hidden" name="modalid" id="modalid">
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
$(document).on("click",".ventana",function(){
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#exampleModal').modal('show');
});
</script>

<script>
$(document).on("click",".restore",function(){
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#restoreModal').modal('show');
});
</script>
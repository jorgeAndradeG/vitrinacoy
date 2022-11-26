<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container overflow-auto">
        <div class="row align-items-start">
            <div class="col-12">
                <h3 style="text-align:center;">Datos de Perfil
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title=" Editar Perfil " onclick=editarPerfil()><i class="far fa-edit"></i></button></h3>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{action('App\Http\Controllers\PerfilController@update',$usuario->id)}}" enctype="multipart/form-data"> 

                    @csrf 
                    @method('PATCH') 
                    @if(isset($msg))
                        <p style="color:red; text-align:center;">{{$msg}}</p>
                    @endif
                    <div class="form-floating mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nombre" value="{{$usuario->name}}" disabled required>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="mail">Mail</label>
                        <input type="text" class="form-control" name="mail" id="mail" value="{{$usuario->email}}" disabled required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{$usuario->direccion}}" disabled>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="telefono">Teléfono</label>
                        <div class="row">
                            <div class="col-1">
                                <input type="number" class="form-control" placeholder="+569" disabled>
                            </div>
                            <div class="col-11">
                                <input type="number" class="form-control" name="telefono" id="telefono" value="{{$usuario->telefono}}" disabled>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="form-floating mb-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{$usuario->instagram}}" disabled>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$usuario->facebook}}" disabled>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="tiktok">TikTok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{$usuario->tiktok}}" disabled>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="sitio_web">Pagina Web</label>
                        <input type="text" class="form-control" name="sitio_web" id="sitio_web" value="{{$usuario->sitio_web}}" disabled>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="whatsapp_business">Whatsapp Business</label>
                        <input type="text" class="form-control" name="whatsapp_business" id="whatsapp_business" value="{{$usuario->whatsapp_business}}" disabled>
                    </div>

                    <hr>
                    <div class="form-floating mb-3">
                        <label for="imagen">Imagen de Perfil</label><br>
                        @if(isset($usuario->foto)) 
                            <img src="{{$usuario->foto}}" class="img-thumbnail" alt="..." width="200" height="100">
                        @else 
                            <p style="text-align:center; color:red;">Sin Imagen de Perfil... Aún! Recuerda que sin imagen de perfil, no saldrás en las búsquedas ni
                            en inicio.</p>
                        @endif
                        <br>
                        <label for="imagen">Cambiar Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="file" disabled>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-6" style="text-align:left">
                        <button type="submit" class="btn btn-success" id="botonEditar" disabled>Actualizar Datos</button>
                        </div>
                   
                    </div>
                   

                   
                </form>
                
            </div>

        </div>
    </div>
@stop




<script>
    function editarPerfil(){
        if(document.getElementById("nombre").disabled == true){
            document.getElementById("nombre").disabled = false;
            document.getElementById("direccion").disabled = false;
            document.getElementById("telefono").disabled = false;
            document.getElementById("instagram").disabled = false;
            document.getElementById("facebook").disabled = false;
            document.getElementById("tiktok").disabled = false;
            document.getElementById("sitio_web").disabled = false;
            document.getElementById("whatsapp_business").disabled = false;
            document.getElementById("imagen").disabled = false;
            document.getElementById("botonEditar").disabled = false;

        }
        else{ 
            document.getElementById("nombre").disabled = true;
            document.getElementById("direccion").disabled = true;
            document.getElementById("telefono").disabled = true;
            document.getElementById("instagram").disabled = true;
            document.getElementById("facebook").disabled = true;
            document.getElementById("tiktok").disabled = true;
            document.getElementById("sitio_web").disabled = true;
            document.getElementById("whatsapp_business").disabled = true;
            document.getElementById("imagen").disabled = true;
            document.getElementById("botonEditar").disabled = true;

        }
    }
    
</script>

<script>
    $(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
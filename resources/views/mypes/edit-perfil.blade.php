<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div class="container overflow-auto">
    <div class="row align-items-start">
        <div class="col-12">
            <h3 style="text-align:center;">Datos de Perfil</h3>
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
            <form method="POST" action="{{action('App\Http\Controllers\PerfilController@update',$usuario->id)}}"
                enctype="multipart/form-data">

                @csrf
                @method('PATCH')
                @if(isset($msg))
                <p style="color:red; text-align:center;">{{$msg}}</p>
                @endif
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="name" id="nombre" value="{{$usuario->name}}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3">
                            <label for="mail">Mail</label> <small><i class="fa-solid fa-circle-info"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="El mail no se puede modificar"></i></small>
                            <input type="text" class="form-control" name="mail" id="mail" value="{{$usuario->email}}"
                                required disabled>
                        </div> -->
                        <div class="form-floating mb-3">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono"
                                value="{{$usuario->telefono}}" placeholder="987654321">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                value="{{$usuario->direccion}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="whatsapp_business">Whatsapp Business</label> <small><i
                                    class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Numero completo sin '+'"></i></small>
                            <input type="number" class="form-control" name="whatsapp_business" id="whatsapp_business"
                                value="{{$usuario->whatsapp_business}}" placeholder="56987654321">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="instagram">Instagram</label> <small><i class="fa-solid fa-circle-info"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Solo el nombre de usuario"></i></small>
                            <input onChange="removeChar();" type="text" class="form-control" name="instagram"
                                id="instagram" value="{{$usuario->instagram}}" placeholder="nombre de usuario">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="facebook">Facebook</label> <small><i class="fa-solid fa-circle-info"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Link completo"></i></small>
                            <input onChange="removeChar();" type="text" class="form-control" name="facebook"
                                id="facebook" value="{{$usuario->facebook}}"
                                placeholder="www.facebook.com/nombre-de-usuario">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="tiktok">TikTok</label> <small><i class="fa-solid fa-circle-info"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Solo el nombre de usuario"></i></small>
                            <input onChange="removeChar();" type="text" class="form-control" name="tiktok" id="tiktok"
                                value="{{$usuario->tiktok}}" placeholder="nombre de usuario">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="sitio_web">Pagina Web</label> <small><i class="fa-solid fa-circle-info"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Link completo"></i></small>
                            <input onChange="removeChar();" type="text" class="form-control" name="sitio_web"
                                id="sitio_web" value="{{$usuario->sitio_web}}" placeholder="www.tusitio.cl">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">


                    </div>
                    <div class="col-md-6">


                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="imagen">Imagen de Perfil</label><br>
                            @if(isset($usuario->foto))
                            <img src="/{{$usuario->foto}}" class="img-thumbnail" alt="..." width="200" height="100">
                            @else
                            <p style="text-align:center; color:red;">Sin Imagen de Perfil... Aún! Recuerda que sin
                                imagen de
                                perfil, no saldrás en las búsquedas ni
                                en inicio.</p>
                            @endif

                        </div>
                        <input type="file" class="form-control" id="imagen" name="file">

                    </div>
                    <div class="col-md-6" style="text-align:center">
                        <button type="submit" class="btn btn-success" id="botonEditar">Actualizar Datos</button>
                    </div>
                </div>
                <br>




            </form>
            <div class="row">

                <div class="col-md-6" style="text-align:center">
                </div>
                <div class="col-md-6" style="text-align:center">
                    <button type="submit" class="btn btn-danger restore" id="deshabilitarButton" data-bs-toggle="modal-restore"
                        data-bs-target="#restoreModal" data-id='{{$usuario->id}}'>Deshabilitar
                        perfil</button>
                </div>


            </div>
        </div>

    </div>
</div>
@stop

<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deshabilitar cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>

            <form method="POST" action="{{action('App\Http\Controllers\PerfilController@deshabilitar')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>¿Está seguro que desea deshabilitar su cuenta? Todos sus productos también se deshabilitarán y tendrá que activarlos 
                        manualmente cuando vuelva a iniciar sesión.</p>
                    <input type="hidden" name="userid" id="userid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Sí</button>
                </div>
            </form>


        </div>
    </div>
</div>

<script>
$(document).on("click", ".restore", function() {
    var Id = $(this).data('id');
    $(".modal-body #userid").val(Id);
    $('#restoreModal').modal('show');
});

$(document).ready(function() {
    $('[data-bs-toggle="tooltip"]').tooltip();
    removeChar();
});

function removeChar() {
    var a = $("#instagram").val();
    var e = $("#tiktok").val();
    var link = $("#sitio_web").val();
    var facebook = $("#facebook").val();
    a = a.replace('@', '');
    e = e.replace('@', '');
    link = link.replace('http://', '');
    link = link.replace('https://', '');
    facebook = facebook.replace('http://', '');
    facebook = facebook.replace('https://', '');
    $("#instagram").val(a);
    $("#tiktok").val(e);
    $("#sitio_web").val(link);
    $("#facebook").val(facebook);
}
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <div class="form-floating mb-3" style="text-align:right;">

    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Correo Usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ver Problema</th>

                </tr>
            </thead>
            <tbody>
                @foreach($preguntas as $pregunta)
                @foreach($users as $user)
                @if($user->id == $pregunta->id_mype)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($pregunta->estado == 1)
                    <td>
                        <p style="color:green">Activo</p>
                    </td>
                    @else
                    <td>
                        <p style="color:red">Inactivo</p>
                    </td>
                    @endif
                    <td><a type="button" class="btn btn-success btn-sm"
                            href="{{action('App\Http\Controllers\AdminSoporteController@edit', $pregunta->id)}}"><i
                                class="far fa-edit"></i></a></td>
                </tr>
                @break
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
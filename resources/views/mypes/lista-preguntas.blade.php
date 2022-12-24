<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('adminlte::page')

@section('title', 'Beneficios')

@section('content')
<div class="container-fluid">
    <h3 style="text-aling:center">Listado de Preguntas</h3>
    <div class="form-floating mb-3" style="text-align: right;">
        <a href="{{action('App\Http\Controllers\PreguntaController@create')}}" type="button"
            class="btn btn-success">Agregar Pregunta</a>
    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta->pregunta}}</td>
                    @if($pregunta->estado == 1)
                    <td>Aún no hay respuesta</td>
                    @else
                    <td><a href="{{action('App\Http\Controllers\PreguntaController@show',$pregunta->id)}}" type="button"
                            class="btn btn-success">Ver respuesta</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@stop
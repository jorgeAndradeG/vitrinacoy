@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <form method="POST" action="{{action('App\Http\Controllers\AdminSoporteController@update',$pregunta->id)}}"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="table-responsive-sm">
            <div class="row">
                <div class="col-12">
                    <h3 style="text-align:center">Problema Número {{$pregunta->id}}</h3>
                    <br>
                    <!-- <input type="text" class="form-control" name="facebook" id="facebook" value="{{$pregunta->pregunta}}" disabled>   -->
                    <h3>Pregunta:</h3>
                    <p> {{$pregunta->pregunta}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p style="text-align:center;"></p>
                    <label for="respuesta">Respuesta</label>
                    @if($pregunta->respuesta != "")
                    <textarea name="respuesta" id="respuesta" cols="30" rows="5" class="form-control"
                        disabled>{{$pregunta->respuesta}}</textarea>
                    @else
                    <textarea name="respuesta" id="respuesta" cols="30" rows="5" class="form-control"
                        required></textarea>
                    @endif
                    <br>
                </div>
                <br>

            </div>
            <div class="text-center">
                @if($pregunta->respuesta != "")
                <a type="button" href="/listapreguntas" class="btn btn-success" style="text-align:center">Volver</a>
                @else
                <button type="submit" class="btn btn-success" style="text-align:center">Enviar respuesta</button>
                @endif
            </div>

        </div>
    </form>
</div>


@stop
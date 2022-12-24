@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 style="text-align:center">Detalle de pregunta</h2>
    <div class="table-responsive-sm">
        <div class="row">
            <div class="col-md-12">
                <h4>Pregunta:</h4>
                <p>{{$pregunta->pregunta}}</p>
            </div>
        </div>

        <br> <br>

        <div class="row">
            <div class="col-sm-12">
                <h4>Respuesta:</h4>
                <p class="text-sm-left">{{$pregunta->respuesta}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <h6><a type="button" class="btn btn-success" href="javascript:history.back()">Volver a preguntas</a>
                </h6>
            </div>

        </div>
</div>


@stop
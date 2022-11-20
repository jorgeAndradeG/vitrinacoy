@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <form method="POST" action="{{action('App\Http\Controllers\AdminSoporteController@update',$pregunta->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-12">
                <h3>Problema Número {{$pregunta->id}}</h3>
                <br>
                <p>{{$pregunta->pregunta}}</p>   
            </div>

        </div>
                 <div class="row">
                    <div class="col-12">
                    <p style="text-align:center;">Respuesta</p>
                         <label for="respuesta">Respuesta</label>  
             
                         <textarea name="respuesta" id="respuesta" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar respuesta</button>
                    </div>

                 </div>
                 
            
       
    </form>
</div>


@stop
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
                <input type="text" class="form-control" name="facebook" id="facebook" value="{{$pregunta->pregunta}}" disabled>  
            </div>

        </div>
                 <div class="row">
                    <div class="col-12">
                    <p style="text-align:center;"></p>
                         <label for="respuesta">Respuesta</label>  
                        <textarea name="respuesta" id="respuesta" cols="30" rows="5" class="form-control"></textarea>
                        <br>
                    </div>
                    <br>
                    
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-success" style="text-align:center">Enviar respuesta</button>
                    </div>

                 </div>
                 
            
       
    </form>
</div>


@stop
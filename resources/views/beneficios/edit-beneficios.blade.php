<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">

    <div class="row align-items-start">
        <div class="col-12">
            <h2 style="text-align:center">Editar Beneficio</h2>
            <form method="POST" action="{{action('App\Http\Controllers\BeneficiosController@update', $beneficio->id)}}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @if(isset($msg))
                {{$msg}}
                @endif
                <div class="form-floating mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $beneficio->nombre }}"
                        required>
                </div>

                <div class="form-floating mb-3">
                    <label for="id_entidad">Entidad a la que pertenece</label>
                    <select class="form-select" aria-label="Default select example" name="id_entidad" id="id_entidad">
                        @foreach($entidades as $entidad)
                        @if($entidad->id == $beneficio->id_entidad)
                            <option selected value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                        @else
                            <option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="20" rows="6" class="form-control">{{$beneficio->descripcion}}</textarea>
                </div>

                <div class="form-floating mb-3">
                    <label for="edad_minima">Edad mínima</label>
                    <input type="number" class="form-control" name="edad_minima" id="edad_minima" value="{{ $beneficio->edad_minima }}">
                </div>

                <div class="form-floating mb-3">
                    <label for="tipo_persona_postulante">Tipo persona postulante</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_persona_postulante"
                        id="tipo_persona_postulante">                        
                        <option @php if($beneficio->tipo_persona_postulante == "") echo "selected"; @endphp >No aplica</option>
                        <option @php if($beneficio->tipo_persona_postulante == "Persona natural") echo "selected"; @endphp value="Persona natural">Persona natural</option>
                        <option @php if($beneficio->tipo_persona_postulante == "Persona juridica") echo "selected"; @endphp  value="Persona juridica">Persona jurídica</option>
                        <option @php if($beneficio->tipo_persona_postulante == "Cooperativa") echo "selected"; @endphp  value="Cooperativa">Cooperativa</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="sexo_postulante">Sexo postulante</label>
                    <select class="form-select" aria-label="Default select example" name="sexo_postulante"
                        id="sexo_postulante">
                        <option @php if($beneficio->sexo_postulante == "") echo "selected"; @endphp >No aplica</option>
                        <option  @php if($beneficio->sexo_postulante == "Masculino") echo "selected"; @endphp value="Masculino">Masculino</option>
                        <option  @php if($beneficio->sexo_postulante == "Femenino") echo "selected"; @endphp value="Femenino">Femenino</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="tiene_inicio_actividades">¿Requiere inicio de actividades?</label>
                    <select class="form-select" aria-label="Default select example" name="tiene_inicio_actividades"
                        id="tiene_inicio_actividades">
                        @if($beneficio->tiene_inicio_actividades == 1)
                            <option value="1">Sí</option>
                        @else
                            <option value="0">No</option>
                        @endif
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="ventas_netas_minimas">Ventas netas mínimas</label>
                    <input type="number" class="form-control" name="ventas_netas_minimas" id="ventas_netas_minimas" value="{{ $beneficio->ventas_netas_minimas }}">
                </div>

                <div class="form-floating mb-3">
                    <label for="ventas_netas_maximas">Ventas netas máximas</label>
                    <input type="number" class="form-control" name="ventas_netas_maximas" id="ventas_netas_maximas" value="{{ $beneficio->ventas_netas_maximas }}">
                </div>

                <div class="form-floating mb-3">
                    <label for="meses_antiguedad_inicio_actividades">Meses de antigüedad de inicio de
                        actividades</label>
                    <input type="number" class="form-control" name="meses_antiguedad_inicio_actividades"
                        id="meses_antiguedad_inicio_actividades" value="{{ $beneficio->meses_antiguedad_inicio_actividades }}">
                </div>

                <div class="form-floating mb-3">
                    <label for="participa_en_fosis">¿Requiere participación en actividades FOSIS?</label>
                    <select class="form-select" aria-label="Default select example" name="participa_en_fosis"
                        id="participa_en_fosis">
                        @if($beneficio->participa_en_fosis == 1)
                            <option value="1">Sí</option>
                        @else
                            <option value="0">No</option>
                        @endif
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ $beneficio->link }}" required>
                </div>

                <br>
                <button type="submit" class="btn btn-success" id="botonAgregar">Editar Beneficio</button>


            </form>

        </div>

    </div>

</div>


@stop
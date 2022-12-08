<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Entidad_beneficio;
use App\Models\Beneficio;

class ApiController extends Controller
{
    
    public function beneficios(Request $request){

        if($request->has('edad_minima')){
            $beneficios = Beneficio::where('edad_minima', '>=', $request['edad_minima'])->get();
        }
        else if($request->has('tipo_persona_postulante')){
            $beneficios = Beneficio::where('tipo_persona_postulante',$request['tipo_persona_postulante'])->get();
        }
        else if($request->has('sexo_postulante')){
            $beneficios = Beneficio::where('sexo_postulante',$request['sexo_postulante'])->get();
        }
        else if($request->has('tiene_inicio_actividades')){
            $beneficios = Beneficio::where('tiene_inicio_actividades',$request['tiene_inicio_actividades'])->get();
        }
        else if($request->has('ventas_netas_minimas')){
            $beneficios = Beneficio::where('ventas_netas_minimas','>=',$request['ventas_netas_minimas'])->get();
        }
        else if($request->has('ventas_netas_maximas')){
            $beneficios = Beneficio::where('ventas_netas_maximas','<=',$request['ventas_netas_maximas'])->get();
        }
        else if($request->has('meses_antiguedad_inicio_actividades')){
            $beneficios = Beneficio::where('meses_antiguedad_inicio_actividades','>=',$request['meses_antiguedad_inicio_actividades'])->get();
        }
        else if($request->has('participa_en_fosis')){
            $beneficios = Beneficio::where('participa_en_fosis',$request['participa_en_fosis'])->get();
        }
        else{
            $beneficios = Beneficio::all();
        }

        return response()->json($beneficios);

    }

    public function entidad_beneficio(Request $request){

        $entidades_beneficios = Entidad_beneficio::all();

        return response()->json($entidades_beneficios);

    }

    public function login(Request $request){

        $response = ["status"=>0,"msg"=>""];

        $data = json_decode($request->getContent());



        return response()->json($response);

    }

}

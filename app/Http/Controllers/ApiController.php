<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Entidad_beneficio;
use App\Models\Beneficio;
use App\Models\Rrss;
use App\Models\User;

class ApiController extends Controller
{
    
    public function beneficios(Request $request){

        $campos = ["tipo_persona_postulante","sexo_postulante","meses_antiguedad_inicio_actividades","participa_en_fosis"];
        $campos_comparables = ["edad_minima","ventas_netas_minimas","ventas_netas_maximas","meses_antiguedad_inicio_actividades"];
        // $beneficios = array();
        $beneficios = Beneficio::all();
        foreach($campos as $campo){
            if($request->has($campo)){
                $beneficios = $beneficios->where($campo,$request[$campo]);
            }
        }

        if($request->has('edad_minima')){
            $beneficios = $beneficios->where('edad_minima', '<=', $request['edad_minima']);
        }
       
        else if($request->has('ventas_netas_minimas')){
            $beneficios = $beneficios->where('ventas_netas_minimas','>=',$request['ventas_netas_minimas']);
        }
        else if($request->has('ventas_netas_maximas')){
            $beneficios = $beneficios->where('ventas_netas_maximas','<=',$request['ventas_netas_maximas']);
        }
        else if($request->has('meses_antiguedad_inicio_actividades')){
            $beneficios = $beneficios->where('meses_antiguedad_inicio_actividades','>=',$request['meses_antiguedad_inicio_actividades']);
        }
        $be = array();
        foreach($beneficios as $b){
            array_push($be,$b);
        }

        return response()->json($be);

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

    public function rrss(Request $request){

        $data = json_decode($request->getContent());
        $red = Rrss::where('id_mype', $data->id_mype)->firstOrFail();
        if(isset($red)){
            if($data->rrss == "instagram"){
                $red->instagram = $red->instagram + 1;
            }
            else if($data->rrss == "tiktok"){
                $red->tiktok = $red->tiktok + 1;
            }
            else if($data->rrss == "sitio_web"){
                $red->sitio_web = $red->sitio_web + 1;
            }
            else if($data->rrss == "facebook"){
                $red->facebook = $red->facebook + 1;
            }
            else if($data->rrss == "whatsapp_business"){
                $red->whatsapp_business = $red->whatsapp_business + 1;
            }
            $result = $red->save();
            if($result){
                return ["result" => "Clear"];
            }else{
                return ["result" => "Fallo 1"];
            }
        }else{
            return ["result" => "Fallo 2"];
        }
    }

    public function categorias_mypes(Request $request){
        if($request->has('id_rubro')){
            $mypes = User::Where('id_rubro',$request->id_rubro)->where('estado',1)->where('email_verified_at','!=','null')->inRandomOrder()->get();
            return response()->json($mypes);
        }else{
            $mypes = User::Where('id_rubro','!=','null')->where('estado',1)->where('email_verified_at','!=','null')->inRandomOrder()->get();
            return response()->json($mypes);
        }
    }

}
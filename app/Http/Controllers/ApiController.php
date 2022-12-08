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
            $beneficios = Beneficio::where('edad_minima', true)->get();
        }
        $beneficios = Beneficio::all();

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

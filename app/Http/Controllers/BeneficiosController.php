<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidad_beneficio;
use App\Models\Beneficio;

class BeneficiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:Administrador');
     }

    public function index()
    {
        $beneficios = Beneficio::all();
        return view('beneficios.lista-beneficios', compact('beneficios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidades = Entidad_beneficio::where('estado',1)->get();
        return view('beneficios.create-beneficios', compact('entidades'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);
        
        $beneficioCreado = Beneficio::create([
            'nombre'=> $request->nombre,
            'id_entidad' => $request->id_entidad,
            'descripcion'=>$request->descripcion,
            'edad_minima' => $request->edad_minima,
            'tipo_persona_postulante' => $request->tipo_persona_postulante,
            'sexo_postulante' => $request->sexo_postulante,
            'tiene_inicio_actividades' => $request->tiene_inicio_actividades,
            'ventas_netas_minimas' => $request->ventas_netas_minimas,
            'ventas_netas_maximas' => $request->ventas_netas_maximas,
            'meses_antiguedad_inicio_actividades' => $request->meses_antiguedad_inicio_actividades,
            'participa_en_fosis' => $request->participa_en_fosis,
            'link' => $request->link,
            'estado' => '1',
        ]);

        return redirect("/beneficios");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficio = Beneficio::findOrFail($id);
        $entidades = Entidad_beneficio::where('estado',1)->get();
        return view("beneficios.edit-beneficios",compact('entidades'))->with(['beneficio' => $beneficio]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);

        $beneficio = Beneficio::findOrFail($id);
        $beneficio->nombre = $request['nombre'];
        $beneficio->descripcion = $request['descripcion'];
        $beneficio->edad_minima = $request['edad_minima'];
        $beneficio->tipo_persona_postulante = $request['tipo_persona_postulante'];
        $beneficio->sexo_postulante = $request['sexo_postulante'];
        $beneficio->tiene_inicio_actividades = $request['tiene_inicio_actividades'];
        $beneficio->ventas_netas_minimas = $request['ventas_netas_minimas'];
        $beneficio->ventas_netas_maximas = $request['ventas_netas_maximas'];
        $beneficio->meses_antiguedad_inicio_actividades = $request['meses_antiguedad_inicio_actividades'];
        $beneficio->participa_en_fosis = $request['participa_en_fosis'];
        $beneficio->link = $request->link;

        $beneficio->save();
        return redirect("/beneficios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deshabilitar(Request $request)
    {
        $beneficio = Beneficio::findOrFail($request['modalid']);
        if($beneficio->estado == 1){
            $beneficio->estado = 0;
        }else{
            $beneficio->estado = 1;
        }
        $beneficio->save();
        return redirect('/beneficios');
    }
}
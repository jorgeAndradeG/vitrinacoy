<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminSoporteController extends Controller
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
        $preguntas = Pregunta::all();
        foreach($preguntas as $pregunta){
            $user = User::findOrFail($pregunta->id_mype);
            $pregunta->user = $user->name;
        }
        return view('administrador.lista-preguntas', compact('preguntas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
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
        $pregunta = Pregunta::findOrFail($id);
        $user = User::findOrFail($pregunta->id_mype);
        
        return view('administrador.ver-pregunta')->with(["pregunta" => $pregunta, "user" => $user]);
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
        $user= Auth::user();
        $pregunta = Pregunta::findOrFail($id);
        $pregunta ->estado = 0; 
        $pregunta->id_superadmin = $user->id;
        $pregunta -> respuesta = $request['respuesta'];
        $pregunta->save();
        return redirect("/listapreguntas");
        //
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
}

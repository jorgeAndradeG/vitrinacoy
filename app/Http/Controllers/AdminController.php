<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rubro;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $users = User::all();
        $rubros =Rubro::all(); 
        return view('administrador.lista-mypes',compact('rubros'))->with(['users' => $users]); 


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

    public function deshabilitar(Request $request)
    {
        $user = User::findOrFail($request ['modalid']);
        if($user->estado == 1){
            $user->estado = 2;
            $productos = Producto::Where('id_mype',$user->id)->get();
            foreach($productos as $producto){
                $producto->estado = 0;
                $producto->save();
            }
        }else{
            $user->estado = 1;
            $productos = Producto::Where('id_mype',$user->id)->get();
            // foreach($productos as $producto){
            //     $producto->estado = 1;
            //     $producto->save();
            // }
        }
        $user->save();
        return redirect('/mypes');

    }    
}

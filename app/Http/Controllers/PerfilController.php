<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('can:Mype');
     }

    public function index()
    {
        $user= Auth::user();
        return view('mypes.edit-perfil')->with(['usuario' => $user]);
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
        $usuario = User::findOrFail($id); 
        $request->validate([
            'name'=> 'required|string|max:255',
        ]);

        $path_image = "";

        if(isset($request['file'])){
            $file = $request['file'];//RESCATAMOS LA IMAGEN DEL FORMULARIO
            $nombre = $file->getClientOriginalName();
            $formato = explode(".",$nombre);
            $formato = end($formato);

            if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
            {
                //CUANDO NO ES IMAGEN
                $user = Auth::user(); //OBTENEMOS AL USUARIO QUE EST?? LOGGEADO.
                return view('mypes.edit-perfil')->with(['msg' => 'Ingrese una imagen con formato v??lido (JPG, PNG o JPEG)', 'usuario' => $user]); 
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") 
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";
                $path_image = 'images/' . $fechaimg . $nombre;
                Image::make($file)->resize(600,400)->save($path_image);
            };
        }

        $usuario->name = $request->name; 
        $usuario->descripcion = $request['descripcion'];        
        $usuario->telefono = $request['telefono'];        
        $usuario->direccion = $request['direccion'];       
        $usuario->whatsapp_business = $request['whatsapp_business'];        
        $usuario->sitio_web = $request['sitio_web'];
        $usuario->instagram = $request['instagram'];
        $usuario->facebook = $request['facebook'];
        if($request['tiktok'] != ""){
            $usuario->tiktok = '@' . $request['tiktok'];
        }else{
            $usuario->tiktok = null;
        }
        
        if($path_image != ""){
            $usuario->foto = $path_image;
        }

      


        $usuario->save();
        return redirect('/perfil');
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

    public function deshabilitar(Request $request){

        $user = User::findOrFail($request['userid']);

        if($user->estado == 1){
            $user->estado = 0;
            $productos = Producto::Where('id_mype',$user->id)->get();
            foreach($productos as $producto){
                $producto->estado = 0;
                $producto->save();
            }
        }else{
            $user->estado = 1;
            $productos = Producto::Where('id_mype',$user->id)->get();
            foreach($productos as $producto){
                $producto->estado = 1;
                $producto->save();
            }
        }
        $user->save();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');

    }
}
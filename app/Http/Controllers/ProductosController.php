<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductosController extends Controller
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
        $user = Auth::user();
        $productos = Producto::Where('id_mype', $user->id)->get();
        return view ('mypes.productos', compact('productos')); 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypes.create-productos');
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
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|gt:0',
            'stock' => 'required|gte:0',
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
                $user = Auth::user(); //OBTENEMOS AL USUARIO QUE ESTÁ LOGGEADO.
                return view('mypes.edit-producto')->with(['msg' => 'Ingrese una imagen con formato válido (JPG, PNG o JPEG)']); 
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") 
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";
                $path_image = 'images/' . $fechaimg . $nombre;
                Image::make($file)->resize(600,400)->save($path_image);
            };
        }

        $user = auth::user();
        if($request['estado'] == 'on' ){
            $estado = 1; 
        }else{
            $estado = 0;
        }

        $productoCreado = Producto::create([
            'nombre'=> $request->nombre,
            'descripcion'=>$request->descripcion,
            'estado'=>$estado,
            'precio'=>$request->precio,
            'stock'=>$request->stock,
            'foto'=> $path_image,
            'id_mype'=>$user->id,
            
        ]);
        return redirect("/productos");

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
        $producto = Producto::findOrFail($id);
        return view("mypes.edit-productos",compact('producto'));  
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
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|gt:0',
            'stock' => 'required|gte:0',
        ]);
        $user = auth::user();
        if($request['estado'] == 'on' ){
            $estado = 1; 
        }else{
            $estado = 0;
        }
        $path_image = "";
        
        if(isset($request['file'])){
            $file = $request['file'];
            $nombre = $file->getClientOriginalName();
            $formato = explode(".",$nombre);
            $formato = end($formato);

            if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
            {
               
                return view('usuario.register')->with(['msg' => 'Ingrese una imagen con formato válido (JPG, PNG o JPEG)']);
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") 
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";
                $path_image = 'images/' . $fechaimg . $nombre;
                Image::make($file)->resize(600,400)->save($path_image);
            };
        }

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request['nombre'];
        $producto->descripcion= $request['descripcion'];
        $producto->precio= $request['precio'];
        $producto->stock= $request['stock'];
        $producto->estado = $estado;
        if($path_image != ""){
            $producto->foto = $path_image;
        }

        $producto->save();
        return redirect("/productos");
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
    public function eliminar(Request $request)
    {
        $producto = Producto::findOrFail($request['modalid']);
        if($producto->estado == 1){
            $producto->estado = 0;
        }else{
            $producto->estado = 1;
        }
        $producto->save();
        return redirect('/productos');
    }
}

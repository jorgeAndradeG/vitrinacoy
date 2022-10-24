<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Rubro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $rubros = Rubro::All();
        return view('auth.register')->with(['rubros' => $rubros]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        /* 
        if(isset($request['file'])){
            $file = $request['file'];
            $nombre = $file->getClientOriginalName();
            $formato = explode(".",$nombre);
            $formato = end($formato);

            $categorias = Categoria::all();
            if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
            {
               
                return view('usuario.register')->with(['msg' => 'Ingrese una imagen con formato válido (JPG, PNG o JPEG)']);
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") 
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";

                Image::make($file)->resize(600,400)->save('img/' . $fechaimg . $nombre);
            };
        }*/
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado' => 1,
            'id_rubro' => $request->rubro,
            'descripcion' => $request->descripcion, 
            'telefono'=> $request->telefono,
            'direccion'=> $request->direccion,
            'foto'=> $request->foto, 
            'whatsapp_business'=>$request->whatsapp_business,
            'sitio_web'=>$request->sitio_web,
            'instagram'=>$request->instagram,
            'facebook'=>$request->facebook,
            'tiktok'=>$request->tiktok,
            'es_admin' => 0,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

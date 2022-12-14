<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Rubro;
use App\Models\Rrss;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'file' => 'required',
            'CaptchaCode' => 'required|valid_captcha',
        ]);

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
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado' => 1,
            'id_rubro' => $request->rubro,
            // 'descripcion' => $request->descripcion, 
            // 'telefono'=> $request->telefono,
            // 'direccion'=> $request->direccion,
            'foto'=> $path_image, 
            // 'whatsapp_business'=>$request->whatsapp_business,
            // 'sitio_web'=>$request->sitio_web,
            // 'instagram'=>$request->instagram,
            // 'facebook'=>$request->facebook,
            // 'tiktok'=>$request->tiktok,
            'es_admin' => 0,

        ])->assignRole('Mype');

        event(new Registered($user));

        Auth::login($user);

        $rrss = Rrss::create([
            'id_mype' => $user->id,
        ]);

        return redirect('/perfil');
    }
}

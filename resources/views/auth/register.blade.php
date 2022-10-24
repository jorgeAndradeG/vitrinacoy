<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

<div class="container">
    <div class="row align-items-start">
        <div class="col-12">
                <h3 style='text-align:center'>Registrarse</h3>

              
                @csrf 
                
                <div class="form-floating mb-3">
                        <label for="nombre">Nombre Mype (*)</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="email">Correo electronico</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="categoria">Rubro (*)</label>
                        <select class="form-select form-control" aria-label="Default select example" name="rubro" id="rubro">
                       
                             @foreach($rubros as $rubro)
                                <option value="{{$rubro->id}}">{{$rubro->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="whatsapp_bussines">Whatsapp Bussines</label>
                        <input type="text" class="form-control" name="whatsapp_bussines" id="whatsapp_bussines">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="sitio_web">Sitio Web </label>
                        <input type="text" class="form-control" name="sitio_web" id="sitio_web">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="tiktok">TikTok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="imagen">imagen</label>
                        <input type="file" class="form-control" name="file" id="imagen">
                    </div>              
                  
                    <div class="form-floating mb-3">
                        <label for="password">contraseña (*)</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="password_confirmation "> confirmar contraseña (*)</label>
                        <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" >
                    </div>
                    
                    <hr>
            
        </div>

    </div>
</div>
            <div class="mt-4">
            <p style="color:gray"><i>(*) Campos Obligatorios<i></p>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

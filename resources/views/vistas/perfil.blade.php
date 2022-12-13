@extends('layouts.template')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Banner Start ***** -->
                <div class="row  mt-5">
                    <div class="col-lg-12">
                        <div class="main-profile ">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="/{{ $mype->foto }}" alt="" style="border-radius: 23px;">
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <div class="main-info header-text">
                                        <!-- <span>Offline</span> -->
                                        <h4>{{ $mype->name }}</h4>
                                        <p>{{ $mype->descripcion }}</p>
                                        <div class="main-border-button">
                                            @if(isset($mype->instagram))
                                            <a href="https://www.instagram.com/{{ $mype->instagram }}" target="_blank"
                                                class="clic-metric" data-id="{{$mype->id}}" data-red="instagram""><i
                                                    class="fa-brands fa-instagram"></i></a>
                                            @endif
                                            @if(isset($mype->facebook))
                                            <a href="{{ $mype->facebook }}" target="_blank"
                                                class="clic-metric" data-id="{{ $mype->id }}" data-red="facebook"><i
                                                    class="fa-brands fa-facebook"></i></a>
                                            @endif
                                            @if(isset($mype->tiktok))
                                            <a href="https://www.tiktok.com/%40{{ $mype->tiktok }}" target="_blank" class="clic-metric"
                                                data-id="{{ $mype->id }}" data-red="tiktok"><i
                                                    class="fa-brands fa-tiktok"></i></a>
                                            @endif
                                            @if(isset($mype->whatsapp_business))
                                            <a href="https://wa.me/{{ $mype->whatsapp_business }}" target="_blank" class="clic-metric"
                                                    data-red="whatsapp_business" data-id="{{ $mype->id }}"><i class="fa-brands fa-whatsapp"></i></a>
                                            @endif
                                            @if(isset($mype->sitio_web))
                                            <a href="http://{{ $mype->sitio_web }}" target="_blank" class="clic-metric"
                                                data-id="{{ $mype->id }}" data-red="sitio_web"><i
                                                    class="fa-solid fa-earth-americas"></i></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <ul>
                                        <!-- <li>Nombre <span>{{ $mype->name }}</span></li> -->
                                        @isset($mype->direccion)
                                        <li>Dirección <span>{{ $mype->direccion }}</span></li>
                                        @endisset
                                        @isset($mype->telefono)
                                        <li>Teléfono <span>+569{{ $mype->telefono }}</span></li>
                                        @endisset
                                        <li>Email <span>{{ $mype->email }}</span></li>
                                    </ul>
                                </div>
                            </div>
                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->

                <!-- ***** Gaming Library Start ***** -->
                <!--
                <div class="gaming-library profile-library">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Your Gaming</em> Library</h4>
                        </div>
                        <div class="item">
                            <ul>
                                <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                                <li>
                                    <h4>Dota 2</h4><span>Sandbox</span>
                                </li>
                                <li>
                                    <h4>Date Added</h4><span>24/08/2036</span>
                                </li>
                                <li>
                                    <h4>Hours Played</h4><span>634 H 22 Mins</span>
                                </li>
                                <li>
                                    <h4>Currently</h4><span>Downloaded</span>
                                </li>
                                <li>
                                    <div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="item">
                            <ul>
                                <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                                <li>
                                    <h4>Fortnite</h4><span>Sandbox</span>
                                </li>
                                <li>
                                    <h4>Date Added</h4><span>22/06/2036</span>
                                </li>
                                <li>
                                    <h4>Hours Played</h4><span>745 H 22 Mins</span>
                                </li>
                                <li>
                                    <h4>Currently</h4><span>Downloaded</span>
                                </li>
                                <li>
                                    <div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="item last-item">
                            <ul>
                                <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                                <li>
                                    <h4>CS-GO</h4><span>Sandbox</span>
                                </li>
                                <li>
                                    <h4>Date Added</h4><span>21/04/2022</span>
                                </li>
                                <li>
                                    <h4>Hours Played</h4><span>632 H 46 Mins</span>
                                </li>
                                <li>
                                    <h4>Currently</h4><span>Downloaded</span>
                                </li>
                                <li>
                                    <div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              -->
                <!-- ***** Gaming Library End ***** -->
            </div>
        </div>
    </div>
</div>

@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on("click", ".clic-metric", function() {
    console.log("HOLA");
    var id = $(this).data('id');
    var red = $(this).data('red');
    var obj = new Object();
    obj.rrss = red;
    obj.id_mype = id;
    var jsonObj = JSON.stringify(obj);

    fetch('http://vitrinacoyhaique.cl/api/rrss', {
            method: 'POST',
            body: jsonObj
        })
        .then(function(response) {
            if (response.ok) {
                return response.text()
            } else {
                throw "Error en la llamada Ajax";
            }

        })
});

</script>
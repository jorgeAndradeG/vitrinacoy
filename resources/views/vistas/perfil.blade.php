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
                                            <a href="https://www.instagram.com/{{ $mype->instagram }}"
                                                target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="https://www.tiktok.com/{{ $mype->tiktok }}" target="_blank"><i
                                                    class="fa-brands fa-tiktok"></i></a>
                                            <!-- <a href="https://{{ $mype->whatsapp_business }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a> -->
                                            <a href="{{ $mype->sitio_web }}" target="_blank"><i
                                                    class="fa-solid fa-earth-americas"></i></i></a>
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
                                        <li>Teléfono <span>+56{{ $mype->telefono }}</span></li>
                                        @endisset
                                        <li>Email <span>{{ $mype->email }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            @if(count($productos) > 0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="clips">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="heading-section">
                                                    <h4><em>Productos</em></h4>
                                                </div>
                                            </div>
                                            @foreach($productos as $producto)
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="/{{ $producto->foto }}" alt="">
                                                    </div>
                                                    <div class="down-content">
                                                        <h4>{{ $producto->nombre }} </h4>
                                                        <!-- <span><i class="fa fa-eye"></i> 250</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- <div class="col-lg-12">
                          <div class="main-button">
                            <a href="#">Load More Clips</a>
                          </div>
                        </div> -->
                                        </div>
                                        @endif
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
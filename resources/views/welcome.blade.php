@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Featured Games Start ***** -->
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <div class="featured-games header-text">
                            <div class="heading-section">
                                <h4><em>Descubre</em> Emprendimientos</h4>
                            </div>
                            <div class="owl-features owl-carousel">
                                @foreach($mypes as $mype)
                                <div class="item">
                                    <a href="{{action('App\Http\Controllers\PerfilMYPEController@show',$mype->id)}}">

                                        <div class="thumb">
                                            <img src="{{ $mype->foto }}" alt="">
                                            <!-- <div class="hover-effect">
                                            <h6>2.4K Streaming</h6>
                                        </div> -->
                                        </div>

                                        <h4>{{ $mype->name }}<br>
                                            @isset($mype->descripcion)
                                            <span>@php echo substr($mype->descripcion,0,15) @endphp ...</span>
                                            @endisset
                                        </h4>
                                        <!-- <ul>
                                        <li><i class="fa fa-star"></i> 4.8</li>
                                        <li><i class="fa fa-download"></i> 2.3M</li>
                                    </ul> -->
                                    </a>
                                </div>
                                @endforeach

                            </div>
                            <div class="main-button mt-5">
                                <a href="/emprendimientos">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="top-downloaded">
                            <div class="heading-section">
                                <h4><em>Explora</em> Categorías</h4>
                            </div>
                            <ul>
                                @foreach($categorias as $categoria)
                                <li>
                                    <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                                    <h4>{{ $categoria->nombre }}</h4>
                                    <h6>{{ $categoria->descripcion }}</h6>
                                    <!-- <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                                    <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span> -->
                                    <!-- <div class="download">
                                        <a href="#"><i class="fa fa-download"></i></a>
                                    </div> -->
                                </li>
                                @endforeach
                            </ul>
                            <div class="text-button">
                                <a href="/emprendimientos">Ver todas</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ***** Featured Games End ***** -->

                 

                <!-- ***** Start Stream Start ***** -->
                <div class="start-stream">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Cómo publicar en </em> Vitrina Coyhaique</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="item">
                                    <!-- <div class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                    </div> -->
                                    <h4>Contáctanos</h4>
                                    <p>Escríbenos a nuestro <a href=""><em>instagram</em></a> y te haremos llegar el
                                        formulario de ingreso.</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <!-- <div class="icon">
                                        <img src="assets/images/service-02.jpg" alt=""
                                            style="max-width: 20px; border-radius: 50%;">
                                    </div> -->
                                    <h4>Formulario de ingreso</h4>
                                    <p>Luego, completa los datos de tu emprendimiento y estarás listo.</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <!-- <div class="icon">
                                        <img src="assets/images/service-03.jpg" alt=""
                                            style="max-width: 20px; border-radius: 50%;">
                                    </div> -->
                                    <h4>Completamente gratis</h4>
                                    <p>Para ser parte de Vitrina Coyhaique no es necesario efectuar ningún tipo pago.
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="profile.html">Go To Profile</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- ***** Start Stream End ***** -->

              

        </div>
    </div>
</div>
</div>

@stop
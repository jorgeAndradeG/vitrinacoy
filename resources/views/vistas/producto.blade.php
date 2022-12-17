@extends('layouts.template')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Banner Start ***** -->
                <div class="row  mt-5">
                    <div class="col-lg-12 mt-5">
                        <div class="main-profile ">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="/{{ $producto->foto }}" alt="" style="border-radius: 23px;">
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <div class="main-info header-text">
                                        <!-- <span>Offline</span> -->
                                        <h4>{{ $producto->nombre }}</h4>
                                        <p>{{ $producto->descripcion }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <form method="POST"
                                        action="{{action('App\Http\Controllers\PaymentController@update',$producto->id)}}"
                                        enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <ul>
                                            <li>Precio <span>
                                                    {{ $producto->precio }}
                                                </span>
                                            </li>

                                            <li>Stock <span>
                                                    {{ $producto->stock }}
                                                </span>
                                            </li>
                                            <li>Cantidad

                                                <span>
                                                    <select class="form-select-sm" aria-label="Default select example"
                                                        name="cantidad" id="cantidad">
                                                        @foreach($cantidad as $num)
                                                        <option value="{{$num}}">{{$num}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </li>
                                            <button type="submit" class="btn btn-light btn-sm">Comprar</button>
                                    </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="clips">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="heading-section">
                                                    <h4><em>Productos Relacionados</em></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="assets/images/clip-01.jpg" alt=""
                                                            style="border-radius: 23px;">
                                                        <a href="https://www.youtube.com/watch?v=r1b03uKWk_M"
                                                            target="_blank"><i class="fa fa-play"></i></a>
                                                    </div>
                                                    <div class="down-content">
                                                        <h4>First Clip</h4>
                                                        <span><i class="fa fa-eye"></i> 250</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-12">
                          <div class="main-button">
                            <a href="#">Load More Clips</a>
                          </div>
                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop
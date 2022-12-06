@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Live Stream Start ***** -->
                <div class="live-stream">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Productos</em></h4>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($productos as $producto)
                        <div class="col-lg-3 col-sm-6">
                            <div class="item">
                                <a href="{{action('App\Http\Controllers\ProductoDetalleController@show',$producto->id)}}">
                                    <div class="thumb">
                                        <img src="{{ $producto->foto }}" alt="">
                                        <div class="hover-effect">
                                            <div class="content">
                                                <!-- <div class="live">
                          <a href="#">Live</a>
                        </div> -->
                                                <!-- <ul>
                          <li><a href="#"><i class="fa fa-eye"></i> 1.2K</a></li>
                          <li><a href="#"><i class="fa fa-gamepad"></i> CS-GO</a></li>
                        </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="down-content" style="text-align:center">
                                        <!-- <div class="avatar">
                      <img src="assets/images/avatar-04.jpg" alt="" style="max-width: 46px; border-radius: 50%; float: left;">
                    </div> -->
                                        <span> {{ $producto->nombre }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="col-lg-12">
                            <div class="main-button">
                                <a href="streams.html">Load More Streams</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- ***** Live Stream End ***** -->

            </div>
        </div>
    </div>
</div>
@stop
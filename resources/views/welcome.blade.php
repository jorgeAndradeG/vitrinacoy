@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Descrubre Emprendimientos Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Descubre Emprendimientos</em> 👀</h4>
                            </div>
                            <div class="row">
                                @foreach($mypes as $mype)
                                @if($mypes)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="item">
                                        <img src="{{ $mype->foto }}" alt="">
                                        <h4>{{$mype->name}}<br><span>{{$mype->descripcion}}</span></h4>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-3">
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="emprendimientos.html"><small>Ver
                            más...</small></a>
                </div>
                <!-- ***** Descubre Emprendimientos End ***** -->

                <!-- ***** Descrubre Productos Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Descubre Productos</em> 🛍️</h4>
                            </div>
                            <div class="row">
                                @foreach($productos as $producto)
                                @if($mypes)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="item">
                                        <img src="{{ $producto->foto }}" alt="">
                                        <h4>{{$producto->nombre}}<br><span>{{$producto->descripcion}}</span></h4>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-3">
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="productos.html"><small>Ver
                            más...</small></a>
                </div>
                <!-- ***** Descubre Productos End ***** -->
            </div>
        </div>
    </div>
</div>
@stop

</html>
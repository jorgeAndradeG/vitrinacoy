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

            </div>
        </div>
    </div>
</div>
@stop

</html>
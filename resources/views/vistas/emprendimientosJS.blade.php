@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Live Stream Start ***** -->
                <div class="live-stream">
                    <div class="row mb-2">
                    <div class="col-lg-10">
                        <div class="heading-section">
                            <h4><em>Emprendimientos</em></h4>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2">
                        <h4 for="categorias_emprendimientos">Categoría</h4>
                        <select class="form-select form-select-sm" aria-label="Default select example" id="categorias_emprendimientos">
                            <option selected value="">Todas</option>
                            @foreach($rubros as $rubro)
                            <option value="{{$rubro->id}}">{{$rubro->nombre}}</option>
                            @endforeach
                        </select>
                    </div> -->
                    </div>
                    @foreach($rubros as $rubro)
                        <h4><em>{{$rubro->nombre}}</em></h4>

                        <div class="row lista-mypes-filtro">

                            @if(count($mypes) > 0)
                            @foreach($mypes as $mype)
                                @if($mype->id_rubro == $rubro->id)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <a href="{{action('App\Http\Controllers\PerfilMYPEController@show',$mype->id)}}">
                                                <div class="thumb">
                                                    <img src="{{ $mype->foto }}" alt="">
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
                                                    <span> {{ $mype->name }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @endif
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var mypes = [];

// $(document).on("change", "#categorias_emprendimientos", async function() {
//     var id = $(this).val();
//     var respuesta = await fetch('http://localhost/api/mypes_by_categorias?id_rubro=' + id, {
//             method: 'GET',
    
//         }).then((response) => {return response.json()}
//         );
//     console.log(respuesta);
// });

// $(document).ready(async function() {
    
//     var respuesta = await fetch('http://localhost/api/mypes_by_categorias', {
//             method: 'GET',
    
//         }).then((response) => {return response.json()}
//         );
//     mypes = respuesta;
//     console.log(mypes);

//     string name = ' <div class="col-lg-3 col-sm-6">';
//     name + = ' <div class="item">';
//     name +=                                 '<a href="{{action('App\Http\Controllers\PerfilMYPEController@show',$mype->id)}}">';
//                                     <div class="thumb">
//                                         <img src="{{ $mype->foto }}" alt="">
//                                         <div class="hover-effect">
//                                             <div class="content">';
    
//     (".lista-mypes-filtro").append();



// });
</script>
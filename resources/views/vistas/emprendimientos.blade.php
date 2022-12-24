@extends('layouts.template')
@section('main')
<div class="loading" id="loading" style="display:none">Loading&#8230;</div>
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
                        <div class="col-lg-2">
                            <h4 for="categorias_emprendimientos">Categoría</h4>
                            <select class="form-select form-select-sm" aria-label="Default select example"
                                id="categorias_emprendimientos">
                                <option selected value="todas">Todas</option>
                                @foreach($rubros as $rubro)
                                <option value="{{$rubro->id}}">{{$rubro->nombre}}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div> 
          

                    <div class="row" id="lista-mypes-filtro">

                       
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

$(document).on("change", "#categorias_emprendimientos", async function() {

    document.getElementById("loading").style.display = "block";
    var id = $(this).val();
    if(id === "todas"){
        var respuesta = await fetch('https://vitrinacoyhaique.cl/api/mypes_by_categorias', {
        method: 'GET',
    });
    }else{
    var respuesta = await fetch('https://vitrinacoyhaique.cl/api/mypes_by_categorias?id_rubro=' + id, {
        method: 'GET',

    });
    }
    var mypes = await respuesta.json();
    let users = document.getElementById("lista-mypes-filtro");
    cuadros = "";
    mypes.forEach( mype => {
    cuadros += '<div class="col-lg-3 col-sm-6">';
    cuadros += '<div class="item">';
    cuadros += '<a href="https://vitrinacoyhaique.cl/pymes/' + mype.id + '">';
    cuadros += '<div class="thumb">';
    cuadros += '<img src="' + mype.foto + '" alt="">';
    cuadros += '<div class="hover-effect">';
    cuadros += '<div class="content"></div></div></div>';
    cuadros += '<div class="down-content" style="text-align:center">';
    cuadros += ' <span>'+ mype.name + '</span>';
    cuadros += '</div></a></div></div>';

});
    users.innerHTML = cuadros;
    document.getElementById("loading").style.display = "none";
    // console.log(mypes);
});

$(document).ready(async function() {

    var respuesta = await fetch('https://vitrinacoyhaique.cl/api/mypes_by_categorias', {
        method: 'GET',
    });
    var mypes = await respuesta.json();
    let users = document.getElementById("lista-mypes-filtro");
    cuadros = "";
    mypes.forEach( mype => {
    cuadros += '<div class="col-lg-3 col-sm-6">';
    cuadros += '<div class="item">';
    cuadros += '<a href="https://vitrinacoyhaique.cl/pymes/' + mype.id + '">';
    cuadros += '<div class="thumb">';
    cuadros += '<img src="' + mype.foto + '" alt="">';
    cuadros += '<div class="hover-effect">';
    cuadros += '<div class="content"></div></div></div>';
    cuadros += '<div class="down-content" style="text-align:center">';
    cuadros += ' <span>'+ mype.name + '</span>';
    cuadros += '</div></a></div></div>';

});
    users.innerHTML = cuadros;

});
</script>
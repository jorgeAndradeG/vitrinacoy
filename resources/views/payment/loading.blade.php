@extends('layouts.template')
@section('main')
<div class="loading" id="loading" style="display:none">Loading&#8230;</div>
<div class="container py-5">

</div>
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Handler for .ready() called.

    window.setTimeout(function() {
        document.getElementById("loading").style.display = "block";
    }, 1500);
    window.setTimeout(function() {
        location.href = "https://vitrinacoyhaique.cl/";
    }, 5000);
});
</script>
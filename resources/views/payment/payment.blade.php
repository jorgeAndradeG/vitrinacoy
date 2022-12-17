@extends('layouts.template')
@section('main')
<section style="background-color: #eee;">
    <div class="loading" id="loading" style="display:none">Loading&#8230;</div>
    <span class="loader"></span>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center pb-5">
                    <div class="col-md-5 col-xl-4 offset-xl-1">

                        <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                            <div class="p-2 me-3">
                                <h4 style="color:black">Resumen de la compra</h4>
                                <img src="/{{$producto->foto}}" width="200" height="300" alt="">
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Producto</div>
                                <div class="">{{$producto->nombre}}</div>
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Vendido por</div>
                                <div class="">{{$user->name}}</div>
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Precio</div>
                                <div class=""><b>${{$producto->precio}}</b></div>
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Cantidad</div>
                                <div class=""><b>{{$cantidad}}</b></div>
                            </div>
                            <div class="border-top px-2 mx-2"></div>
                            <div class="p-2 d-flex pt-3">
                                <div class="col-8"><b>Total</b></div>
                                <div class=""><b class="text-success">${{$precio_total}}</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                        <!-- <div class="py-4 d-flex flex-row">
                        </div>
                        <div class="d-flex pt-2">
                            <div>
                                <p>
                                    <b>{{$producto->nombre}} </b>
                                </p>
                            </div>
                            <div class="ms-auto">
                                <p class="text-primary">
                                    <b><span class="text-success">${{$producto->precio}}</span></b>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex pt-2">
                            <div>
                                <p>
                                    x{{$cantidad}}
                                </p>
                            </div>
                            <div class="ms-auto">
                                <p class="text-primary">
                                    <b><span class="text-success">${{$precio_total}}</span></b>
                                </p>
                            </div>
                            </div>
                            <div class="rounded d-flex" style="background-color: #f8f9fa;">
                                <div class="p-2">Vendidor por</div>
                                <div class="ms-auto p-2">{{$user->name}}</div>
                            </div>
                        <hr /> -->
                        <div class="py-4 d-flex justify-content-end">
                            <h6><a href="javascript:history.back()">Cancelar y volver a Vitrina Coyhaique</a></h6>
                        </div>
                        <div class="pt-2">
                            <div class="rounded-bottom" style="background-color: #eee;">
                                <div class="card-body">
                                    <p class="mb-4">Datos de pago</p>

                                    <div class="form-outline mb-3">
                                        <input type="text" id="number" class="form-control"
                                            placeholder="1234 5678 1234 5678" minlength="16" maxlength="16" required />
                                        <label class="form-label" for="formControlLgXM8">Número de tarjeta</label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-outline">
                                                <input type="text" id="exp" class="form-control" placeholder="MM/YYYY"
                                                    minlength="7" maxlength="7" required />
                                                <label class="form-label" for="formControlLgExpk8">Válida
                                                    hasta</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-outline">
                                                <input type="password" minlength="3" maxlength="3" id="cvc"
                                                    class="form-control" placeholder="Cvv" required />
                                                <label class="form-label" for="formControlLgcvv8">Cvc</label>

                                                <input hidden type="password" id="amount" class="form-control"
                                                    placeholder="Cvv" value="{{$precio_total}}" required />
                                                <input hidden type="password" id="id_producto" class="form-control"
                                                    placeholder="Cvv" value="{{$producto->id}}" required />
                                                <input hidden type="password" id="cantidad" class="form-control"
                                                    placeholder="Cvv" value="{{$cantidad}}" required />
                                                    
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>

                            <input type="button" value="Confirmar pago" style="background-color:#e75e8d; color:white"
                                class="btn btn-block btn-lg confirmar-pago" />
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on("click", ".confirmar-pago", async function() {
    var number = document.getElementById("number");
    var exp = document.getElementById("exp");
    var cvc = document.getElementById("cvc");
    var amount = document.getElementById("amount");
    var cantidad = document.getElementById("cantidad");
    var id_producto = document.getElementById("id_producto");
    if (!number.value | !exp.value | !cvc.value) {
        alert("Faltan datos");
        return false;
    }
    const expire = exp.value.split("/");
    var obj = new Object();
    obj.number = number.value;
    obj.cvc = cvc.value;
    obj.exp_month = expire[0];
    obj.exp_year = expire[1];
    obj.amount = amount.value;
    obj.id_producto = id_producto.value;
    obj.cantidad = cantidad.value;
    var jsonObj = JSON.stringify(obj);

    document.getElementById("loading").style.display = "block";
    const response = await fetch('http://localhost/api/stripe', {
        method: 'POST',
        body: jsonObj
    });
    const re = await response.ok;
    if (re) {
        // console.log(re);
        document.getElementById("loading").style.display = "none";
        window.location.replace("https://vitrinacoyhaique.cl");
        return false;
    } else {
        console.log("error");
        document.getElementById("loading").style.display = "none";
    }
});
</script>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardRrssController extends Controller
{
    public function __construct(){
        $this->middleware('can:Mype');
     }

    public function index()
    {
    //     $beneficios = Beneficio::all();
        return view('mypes.dash-rrss');
    }

}

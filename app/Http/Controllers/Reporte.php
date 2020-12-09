<?php

namespace App\Http\Controllers;

use App\Models\Reporte as ModelsReporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reporte extends Controller
{
    function index ()
    {
        $records = ModelsReporte::all();

        return view('Reporte/lista', compact('records'));
    }
}

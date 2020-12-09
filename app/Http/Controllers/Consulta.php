<?php

namespace App\Http\Controllers;

use App\Models\Consulta as ModelsConsulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Consulta extends Controller
{
    function index ()
    {
        $records = DB::select('EXEC ConsultarConsultas');

        return view('Consulta/lista', compact('records'));
    }

    function new ()
    {
        return view('Consulta/form');
    }

    function create (Request $request)
    {
        $data = [
            $request['No_Control'],
            $request['Cedula'],
            $request['Fecha_consulta'],
            $request['Tipo_Afeccion'],
            $request['Cod_M']
        ];

        DB::statement('EXEC InsertarConsulta ?,?,?,?,?', $data);

        return redirect('/consultas');
    }

    function show ($id) {
        $record = ModelsConsulta::find($id);

        return view('Consulta/form', compact('record'));
    }

    function update (Request $request)
    {
        $data = [
            $request['No_Consulta'],
            $request['No_Control'],
            $request['Cedula'],
            $request['Fecha_consulta'],
            $request['Tipo_Afeccion'],
            $request['Cod_M']
        ];

        DB::statement('EXEC ActualizarConsulta ?,?,?,?,?,?', $data);

        return redirect('/consultas');
    }

    function delete ($id) {
        ModelsConsulta::find($id)->delete();

        return redirect('/consultas');
    }
}

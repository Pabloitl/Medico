<?php

namespace App\Http\Controllers;

use App\Models\Medico as ModelsMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Medico extends Controller
{
    function index ()
    {
        $records = DB::select('EXEC ConsultarMedicos');

        return view('Medico/lista', compact('records'));
    }

    function new ()
    {
        return view('Medico/form');
    }

    function create (Request $request)
    {
        $record = [
            $request['Cedula'],
            $request['Nombre'],
            $request['Campus']
        ];

        DB::statement('EXEC InsertarMedico ?,?,?', $record);

        return redirect('/medicos');
    }

    function show ($id) {
        $record = ModelsMedico::find($id);

        return view('Medico/form', compact('record'));
    }

    function update (Request $request)
    {
        $record = [
            $request['Cedula'],
            $request['Nombre'],
            $request['Campus']
        ];

        DB::statement('EXEC ActualizarMedico ?,?,?', $record);

        return redirect('/medicos');
    }

    function delete ($id) {
        ModelsMedico::find($id)->delete();

        return redirect('/medicos');
    }
}

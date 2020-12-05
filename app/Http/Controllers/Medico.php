<?php

namespace App\Http\Controllers;

use App\Models\Medico as ModelsMedico;
use Illuminate\Http\Request;

class Medico extends Controller
{
    function index ()
    {
        $records = ModelsMedico::get();

        return view('Medico/lista', compact('records'));
    }

    function new ()
    {
        return view('Medico/form');
    }

    function create (Request $request)
    {
        $alumno = ModelsMedico::create([
            'Cedula' => $request['Cedula'],
            'Nombre' => $request['Nombre'],
            'Campus' => $request['Campus'],
        ]);
        $alumno->save();

        return redirect('/medicos');
    }

    function show ($id) {
        $record = ModelsMedico::find($id);

        return view('Medico/form', compact('record'));
    }

    function update (Request $request)
    {
        $record = ModelsMedico::find($request['Cedula']);

        $record->Nombre = $request['Nombre'];
        $record->Campus = $request['Campus'];

        $record->save();

        return redirect('/medicos');
    }

    function delete ($id) {
        ModelsMedico::find($id)->delete();

        return redirect('/medicos');
    }
}

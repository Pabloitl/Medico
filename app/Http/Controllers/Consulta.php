<?php

namespace App\Http\Controllers;

use App\Models\Consulta as ModelsConsulta;
use Illuminate\Http\Request;

class Consulta extends Controller
{
    function index ()
    {
        $records = ModelsConsulta::get();

        return view('Consulta/lista', compact('records'));
    }

    function new ()
    {
        return view('Consulta/form');
    }

    function create (Request $request)
    {
        $alumno = ModelsConsulta::create([
            'No_Consulta' => $request['No_Consulta'],
            'No_Control' => $request['No_Control'],
            'Cedula' => $request['Cedula'],
            'Fecha_consulta' => $request['Fecha_consulta'],
            'Diagnostico' => $request['Diagnostico'],
            'Tipo_Afeccion' => $request['Tipo_Afeccion']
        ]);
        $alumno->save();

        return redirect('/consultas');
    }

    function show ($id) {
        $record = ModelsConsulta::find($id);

        return view('Consulta/form', compact('record'));
    }

    function update (Request $request)
    {
        $record = ModelsConsulta::find($request['No_Consulta']);

            $record->No_Consulta = $request['No_Consulta'];
            $record->No_Control = $request['No_Control'];
            $record->Cedula = $request['Cedula'];
            $record->Fecha_consulta = $request['Fecha_consulta'];
            $record->Diagnostico = $request['Diagnostico'];
            $record->Tipo_Afeccion = $request['Tipo_Afeccion'];

        $record->save();

        return redirect('/consultas');
    }

    function delete ($id) {
        ModelsConsulta::find($id)->delete();

        return redirect('/consultas');
    }
}

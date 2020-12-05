<?php

namespace App\Http\Controllers;

use App\Models\Medicamento as ModelsMedicamento;
use Illuminate\Http\Request;

class Medicamento extends Controller
{
    function index ()
    {
        $records = ModelsMedicamento::get();

        return view('Medicamento/lista', compact('records'));
    }

    function new ()
    {
        return view('Medicamento/form');
    }

    function create (Request $request)
    {
        $alumno = ModelsMedicamento::create([
            'Cod_M' => $request['Cod_M'],
            'Nombre' => $request['Nombre'],
        ]);
        $alumno->save();

        return redirect('/medicamentos');
    }

    function show ($id) {
        $record = ModelsMedicamento::find($id);

        return view('Medicamento/form', compact('record'));
    }

    function update (Request $request)
    {
        $record = ModelsMedicamento::find($request['Cod_M']);

        $record->Nombre = $request['Nombre'];

        $record->save();

        return redirect('/medicamentos');
    }

    function delete ($id) {
        ModelsMedicamento::find($id)->delete();

        return redirect('/medicamentos');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Medicamento as ModelsMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Medicamento extends Controller
{
    function index ()
    {
        $records = DB::select('EXEC ConsultarMedicamentos');

        return view('Medicamento/lista', compact('records'));
    }

    function new ()
    {
        return view('Medicamento/form');
    }

    function create (Request $request)
    {
        $data = [
            $request['Cod_M'],
            $request['Nombre'],
            $request['Cantidad']
        ];

        DB::statement('EXEC InsertarMedicamento ?,?,?', $data);

        return redirect('/medicamentos');
    }

    function show ($id) {
        $record = ModelsMedicamento::find($id);

        return view('Medicamento/form', compact('record'));
    }

    function update (Request $request)
    {
        $record = [
            $request['Cod_M'],
            $request['Nombre'],
            $request['Cantidad']
        ];

        DB::statement('EXEC ActualizarMedicamento ?,?,?', $record);

        return redirect('/medicamentos');
    }

    function delete ($id) {
        ModelsMedicamento::find($id)->delete();

        return redirect('/medicamentos');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alergia as ModelsAlergia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alergia extends Controller
{
    function index ()
    {
        $records = DB::select('EXEC ConsultarAlergias');

        return view('Alergia/lista', compact('records'));
    }

    function new ()
    {
        return view('Alergia/form');
    }

    function create (Request $request)
    {
        $data = [
            $request['No_Control'],
            $request['Cod_M'],
        ];

        DB::statement('EXEC InsertarAlergia ?,?', $data);

        return redirect('/alergias');
    }

    function show ($id, $id2) {
        $record = DB::table('Alergia')
            ->where('No_Control', '=', $id)
            ->where('Cod_M', '=', $id2)
            ->first();

        return view('Alergia/form', compact('record'));
    }

    function delete ($id, $id2) {
        DB::table('Alergia')
            ->where('No_Control', '=', $id)
            ->where('Cod_M', '=', $id2)
            ->delete();

        return redirect('/alergias');
    }
}

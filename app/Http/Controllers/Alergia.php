<?php

namespace App\Http\Controllers;

use App\Models\Alergia as ModelsAlergia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alergia extends Controller
{
    function index ()
    {
        $records = ModelsAlergia::get();

        return view('Alergia/lista', compact('records'));
    }

    function new ()
    {
        return view('Alergia/form');
    }

    function create (Request $request)
    {
        DB::table('Alergia')->insert([
            'No_Control' => $request['No_Control'],
            'Cod_M' => $request['Cod_M'],
        ]);

        return redirect('/alergias');
    }

    function show ($id, $id2) {
        $record = DB::table('Alergia')
            ->where('No_Control', '=', $id)
            ->where('Cod_M', '=', $id2)
            ->first();

        return view('Alergia/form', compact('record'));
    }

    // function update (Request $request)
    // {
    //     $record = ModelsAlergia::find($request['No_Control']);

    //     $record->No_Control = $request['No_Control'];
    //     $record->Cod_M = $request['Cod_M'];

    //     $record->save();

    //     return redirect('/alergias');
    // }

    function delete ($id, $id2) {
        DB::table('Alergia')
            ->where('No_Control', '=', $id)
            ->where('Cod_M', '=', $id2)
            ->delete();

        return redirect('/alergias');
    }
}

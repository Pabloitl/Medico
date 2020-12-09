<?php

namespace App\Http\Controllers;

use App\Models\Alumno as ModelsAlumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alumno extends Controller
{
    function index ()
    {
        $alumnos = DB::select('EXEC ConsultarAlumnos');

        return view('Alumno/lista', compact('alumnos'));
    }

    function new ()
    {
        return view('Alumno/form');
    }

    function create (Request $request)
    {
        $data = [
            $request['No_Control'],
            $request['Nombre'],
            $request['Sexo'],
            $request['Carrera']
        ];

        DB::statement('EXEC InsertarAlumno ?,?,?,?', $data);

        return redirect('/alumnos');
    }

    function show ($id) {
        $record = ModelsAlumno::find($id);

        return view('Alumno/form', compact('record'));
    }

    function update (Request $request)
    {
        $data = [
            $request['No_Control'],
            $request['Nombre'],
            $request['Sexo'],
            $request['Carrera']
        ];

        DB::statement('EXEC ActualizarAlumno ?,?,?,?', $data);

        return redirect('/alumnos');
    }

    function delete ($id) {
        ModelsAlumno::find($id)->delete();

        return redirect('/alumnos');
    }
}

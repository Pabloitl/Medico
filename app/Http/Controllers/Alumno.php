<?php

namespace App\Http\Controllers;

use App\Models\Alumno as ModelsAlumno;
use Illuminate\Http\Request;

class Alumno extends Controller
{
    function index ()
    {
        $alumnos = ModelsAlumno::get();

        return view('Alumno/lista', compact('alumnos'));
    }

    function new ()
    {
        return view('Alumno/form');
    }

    function create (Request $request)
    {
        $alumno = ModelsAlumno::create([
            'No_Control' => $request['No_Control'],
            'Nombre' => $request['Nombre'],
            'Sexo' => $request['Sexo'],
            'Carrera' => $request['Carrera']
        ]);
        $alumno->save();

        return redirect('/alumnos');
    }

    function show ($id) {
        $record = ModelsAlumno::find($id);

        return view('Alumno/form', compact('record'));
    }

    function update (Request $request)
    {
        $alumno = ModelsAlumno::find($request['No_Control']);

        $alumno->No_Control = $request['No_Control'];
        $alumno->Nombre = $request['Nombre'];
        $alumno->Sexo = $request['Sexo'];
        $alumno->Carrera = $request['Carrera'];

        $alumno->save();

        return redirect('/alumnos');
    }

    function delete ($id) {
        ModelsAlumno::find($id)->delete();

        return redirect('/alumnos');
    }
}

@extends('template')

@section('title', 'Principal')

@section('content')
    <h2 class="text-center">Página principal</h2>

    <div class="text-center">
        <img class="img-thumbnail" width="50%" src="https://clinic-cloud.com/wp-content/uploads/2014/04/shutterstock_124145977-1024x723.jpg" alt="Historiales Médicos">
    </div>

    <div class="text-center">
        <a href="{{ url('/alumnos') }}"><button class="btn btn-primary">Alumnos</button></a>
        <a href="{{ url('/medicos') }}"><button class="btn btn-primary">Médicos</button></a>
        <a href="{{ url('/medicamentos') }}"><button class="btn btn-primary">Medicamentos</button></a>
        <a href="{{ url('/alergias') }}"><button class="btn btn-primary">Alergias</button></a>
        <a href="{{ url('/consultas') }}"><button class="btn btn-primary">Consultas</button></a>
        <a href="{{ url('/reportes') }}"><button class="btn btn-primary">Reportes</button></a>
    </div>
@endsection

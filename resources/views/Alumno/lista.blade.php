@extends('template')

@section('title', 'Lista Alumnos')

@section('content')
    <h2 class="text-center">Lista Alumnos</h2>

    <a href="{{ url('alumnos/nuevo') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Numero de control</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>
        @foreach ($alumnos as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ url('alumnos/' . $item->No_Control) }}">{{ $item->No_Control }}</a></td>
            <td>{{ $item->Nombre }}</td>
            <td>{{ $item->Sexo }}</td>
            <td>{{ $item->Carrera }}</td>
            </tr>
        @endforeach
    </table>
@endsection

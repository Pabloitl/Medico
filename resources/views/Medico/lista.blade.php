@extends('template')

@section('title', 'Lista Médicos')

@section('content')
    <h2 class="text-center">Lista Médicos</h2>

    <a href="{{ url('medicos/nuevo') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Campus</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ url('medicos/' . $item->Cedula) }}">{{ $item->Cedula }}</a></td>
            <td>{{ $item->Nombre }}</td>
            <td>{{ $item->Campus }}</td>
            </tr>
        @endforeach
    </table>
@endsection

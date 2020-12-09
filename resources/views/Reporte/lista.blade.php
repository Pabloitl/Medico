@extends('template')

@section('title', 'Lista Report')

@section('content')
    <h2 class="text-center">Lista Reporte</h2>

    <table class="table">
        <tr>
            <th>Medicamento</th>
            <th>Numero de usos</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td>{{ $item->Nombre }}</td>
            <td>{{ $item->Usos }}</td>
            </tr>
        @endforeach
    </table>
@endsection

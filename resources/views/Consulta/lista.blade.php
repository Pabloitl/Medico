@extends('template')

@section('title', 'Lista Consultas')

@section('content')
    <h2 class="text-center">Lista Consultas</h2>

    <a href="{{ url('consultas/nuevo') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Numero Consulta</th>
            <th>Numero Control</th>
            <th>Cedula</th>
            <th>Fecha Consulta</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ url('consultas/' . $item->No_Consulta) }}">{{ $item->No_Consulta }}</a></td>
            <td>{{ $item->No_Control }}</td>
            <td>{{ $item->Cedula }}</td>
            <td>{{ $item->Fecha_consulta }}</td>
            </tr>
        @endforeach
    </table>
@endsection

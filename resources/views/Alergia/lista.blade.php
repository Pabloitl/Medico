@extends('template')

@section('title', 'Lista Alergias')

@section('content')
    <h2 class="text-center">Lista Alergias</h2>

    <a href="{{ url('alergias/nuevo') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Numero de control</th>
            <th>Código medicamento</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ url('alergias/' . $item->No_Control . '/' . $item->Cod_M) }}">{{ $item->No_Control }}</a></td>
            <td>{{ $item->Cod_M }}</td>
            </tr>
        @endforeach
    </table>
@endsection

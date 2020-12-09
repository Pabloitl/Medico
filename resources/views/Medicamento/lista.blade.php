@extends('template')

@section('title', 'Lista Medicamentos')

@section('content')
    <h2 class="text-center">Lista Medicamentos</h2>

    <a href="{{ url('medicamentos/nuevo') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Código medicamento</th>
            <th>Nombre</th>
            <th>Cantidad</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ url('medicamentos/' . $item->Cod_M) }}">{{ $item->Cod_M }}</a></td>
            <td>{{ $item->Nombre }}</td>
            <td>{{ $item->Cantidad }}</td>
            </tr>
        @endforeach
    </table>
@endsection

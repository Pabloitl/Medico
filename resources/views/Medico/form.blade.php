@extends('template')

@section('title', 'Médico')

@section('content')
    <h2 class="text-center">Médico</h2>

    <form
    @if (isset($record))
        action="{{ url('medicos/actualizar') }}"
    @else
        action="{{ url('medicos/crear') }}"
    @endif
    method="POST">
        @csrf
        <div class="form-group">
            <label for="Cedula">Cédula:</label>
            <input type="text" class="form-control" id="Cedula" name="Cedula" value="{{ $record['Cedula'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['Nombre'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Campus">Campus</label>
            <input type="number" class="form-control" id="Campus" name="Campus" value="{{ $record['Campus'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
    <a href="{{ url('medicos/borrar/' . $record->Cedula) }}">
        <button class="btn btn-danger btn-block">Eliminar</button>
    </a>
    @endisset
@endsection

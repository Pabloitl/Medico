@extends('template')

@section('title', 'Medicamento')

@section('content')
    <h2 class="text-center">Medicamento</h2>

    <form
    @if (isset($record))
        action="{{ url('medicamentos/actualizar') }}"
    @else
        action="{{ url('medicamentos/crear') }}"
    @endif
    method="POST">
        @csrf
        <div class="form-group">
            <label for="Cod_M">Código medicamento:</label>
            <input type="text" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record['Cod_M'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['Nombre'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
    <a href="{{ url('medicamentos/borrar/' . $record->Cod_M) }}">
        <button class="btn btn-danger btn-block">Eliminar</button>
    </a>
    @endisset
@endsection

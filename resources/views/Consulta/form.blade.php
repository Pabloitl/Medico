@extends('template')

@section('title', 'Consulta')

@section('content')
    <h2 class="text-center">Consulta</h2>

    <form
    @if (isset($record))
        action="{{ url('consultas/actualizar') }}"
    @else
        action="{{ url('consultas/crear') }}"
    @endif
    method="POST">
        @csrf
        <div class="form-group">
            <label for="No_Consulta">Numero Consulta:</label>
            <input type="text" class="form-control" id="No_Consulta" name="No_Consulta" value="{{ $record['No_Consulta'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="No_Control">Numero Control:</label>
            <input type="text" class="form-control" id="No_Control" name="No_Control" value="{{ $record['No_Control'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Cedula">Cedula:</label>
            <input type="text" class="form-control" id="Cedula" name="Cedula" value="{{ $record['Cedula'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Fecha_consulta">Fecha de Consulta:</label>
            <input type="date" class="form-control" id="Fecha_consulta" name="Fecha_consulta" value="{{ $record['Fecha_consulta'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Diagnostico">Diagnostico:</label>
            <input type="text" class="form-control" id="Diagnostico" name="Diagnostico" value="{{ $record['Diagnostico'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Tipo_Afeccion">Tipo de Afección:</label>
            <input type="text" class="form-control" id="Tipo_Afeccion" name="Tipo_Afeccion" value="{{ $record['Tipo_Afeccion'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Cod_M">Código Medicamento:</label>
            <input type="text" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record['Cod_M'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
    <a href="{{ url('consultas/borrar/' . $record->No_Consulta) }}">
        <button class="btn btn-danger btn-block">Eliminar</button>
    </a>
    @endisset
@endsection

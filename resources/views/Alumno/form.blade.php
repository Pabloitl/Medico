@extends('template')

@section('title', 'Alumno')

@section('content')
    <h2 class="text-center">Alumno</h2>

    <form
    @if (isset($record))
        action="{{ url('alumnos/actualizar') }}"
    @else
        action="{{ url('alumnos/crear') }}"
    @endif
    method="POST">
        @csrf
        <div class="form-group">
            <label for="No_Control">Numero de control:</label>
            <input type="text" class="form-control" id="No_Control" name="No_Control" value="{{ $record['No_Control'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['Nombre'] ?? '' }}">
        </div>

        <div class="form-group">
            <label for="Sexo">Sexo:</label>
            <select id="pet-select" class="form-control" name="Sexo" value="{{ $record['Sexo'] ?? '' }}">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Carrera">Carrera:</label>
            <input type="text" class="form-control" id="Carrera" name="Carrera" value="{{ $record['Carrera'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
    <a href="{{ url('alumnos/borrar/' . $record->No_Control) }}">
        <button class="btn btn-danger btn-block">Eliminar</button>
    </a>
    @endisset
@endsection

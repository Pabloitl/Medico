@extends('template')

@section('title', 'Alergia')

@section('content')
    <h2 class="text-center">Alergia</h2>

    <form action="{{ url('alergias/crear') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="No_Control">Numero de control:</label>
            <input type="text" class="form-control" id="No_Control" name="No_Control" value="{{ $record->No_Control ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="Cod_M">Código Medicina:</label>
            <input type="text" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record->Cod_M ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        @if(isset($record))
        @else
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-block">Enviar</button>
            </div>
        @endif
    </form>
    @isset($record)
    <a href="{{ url('alergias/borrar/' . $record->No_Control . '/' . $record->Cod_M) }}">
        <button class="btn btn-danger btn-block">Eliminar</button>
    </a>
    @endisset
@endsection

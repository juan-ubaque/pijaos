@extends('layouts.base')

@section('contenido')
<a href="{{ route('paciente.create') }}" class="btn btn-primary m-3">Crear Paciente</a>
    <h1>Listado de Pacientes:</h1>

    <table class="table table-striped table-dark mt-4 border border-dark-subtle">
        <thead>
            <tr>
                <th scope="col">TIPO_DOCUMENTO</th>
                <th scope="col">NO_DOCUMENTO</th>
                <th scope="col">NOMBRES</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">FECHA_NACIMIENTO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <th scope="row">{{ $paciente->TIPO_DOC}}</th>
                    <td scope="row">{{ $paciente->NO_DOCUMENTO}}</td>
                    <td scope="row">{{ $paciente->NOMBRES}}</td>
                    <td scope="row">{{ $paciente->APELLIDOS}}</td>
                    <td scope="row">{{ $paciente->FEC_NACIMIENTO}}</td>
                    <td scope="row">{{ $paciente->EMAIL}}</td>

                    <td>
                        <a href="paciente/{{$paciente->NO_DOCUMENTO}}/edit" class="btn btn-info">Editar</a>
                        <form action="{{ route ('paciente.destroy',$paciente->NO_DOCUMENTO )}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estas seguro de borrar el registro?')" type="submit" class="btn btn-danger">Eliminar</button>
                            @if(Session::has('Error'))
                                <div class="alert alert-danger m-1">
                                    {{ Session::get('Error') }}
                                </div>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection

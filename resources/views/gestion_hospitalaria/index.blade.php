@extends('layouts.base')

@section('contenido')
    <h1>Listado de Las Gestiones Hospitalarias</h1>
    <a href="{{ route('gestion_hospitalaria.create') }}" class="btn btn-primary">Crear Paciente</a>

    <table class="table table-striped table-dark mt-4">
        <thead>
            <tr>
                <th scope="col">ID_HOSPITALIZACION</th>
                <th scope="col">TIPO_DOC_PACIENTE</th>
                <th scope="col">NO_DOC_PACIENTE</th>
                <th scope="col">COD_HOSPITAL</th>
                <th scope="col">FEC_INGRESO</th>
                <th scope="col">FEC_SALIDA</th>
                <th scope="col">FEC_CREACION</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gestiones as $gestion)
                <tr>
                    <th scope="row">{{ $gestion->ID_HOSPITALIZACION}}</th>
                    <td scope="row">{{ $gestion->TIPO_DOC_PACIENTE}}</td>
                    <td scope="row">{{ $gestion->NO_DOC_PACIENTE}}</td>
                    <td scope="row">{{ $gestion->COD_HOSPITAL}}</td>
                    <td scope="row">{{ $gestion->FEC_INGRESO}}</td>
                    <td scope="row">{{ $gestion->FEC_SALIDA}}</td>
                    <td scope="row">{{ $gestion->created_at}}</td>

                    <td>
                        <a href="gestion_hospitalaria/{{$gestion->ID_HOSPITALIZACION}}/edit" class="btn btn-info">Editar</a>
                        <form action="{{ route ('gestion_hospitalaria.destroy',$gestion->ID_HOSPITALIZACION)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estas seguro de borrar el registro?')" type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection

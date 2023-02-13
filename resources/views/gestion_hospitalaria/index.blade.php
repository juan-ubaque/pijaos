@extends('layouts.base')

@section('contenido')
    <h1>Listado de Las Gestiones Hospitalarias</h1>
    <a href="{{ route('gestion_hospitalaria.create') }}" class="btn btn-primary">Crear Paciente</a>

    <table class="table table-striped table-dark mt-4">
        <thead>
            <tr>
                <th scope="col">HOSÍTALIZACION NRO</th>
                <th scope="col">TIPO DOCUMENTO DEL PACIENTE</th>
                <th scope="col">NRO DOCUMENTO DEL PACIENTE</th>
                <th scope="col">CODIGO HOSPITAL</th>
                <th scope="col">FECHA DE INGRESO</th>
                <th scope="col">FECHA DE SALIDA</th>
                <th scope="col">FECHA DE CREACION</th>
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
                        <a href="gestion_hospitalaria/{{$gestion->ID_HOSPITALIZACION}}/edit" class="btn btn-info m-1 h-3">Editar</a>
                        <form action="{{ route ('gestion_hospitalaria.destroy',$gestion->ID_HOSPITALIZACION)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estas seguro de borrar el registro?')" type="submit" class="btn btn-danger m-1">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection

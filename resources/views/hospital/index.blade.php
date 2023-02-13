@extends('layouts.base')


@section('contenido')
    <div class="container text-center col">
        <a href="/hospital/create" class="btn btn-primary m-3 ">Crear</a>
        <h1>Listado de Hospitales</h1>
    </div>

    <table class="table table-striped table-dark mt-4 border border-dark-subtle">
        <thead>
            <tr>
                <th scope="col">COD_HOSPITAL</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitales as $hospital)
                <tr>
                    <th scope="row">{{ $hospital->COD_HOSPITAL }}</th>
                    <td scope="row">{{ $hospital->NOMBRE }}</td>
                    <td>
                        <a href="hospital/{{$hospital->COD_HOSPITAL}}/edit" class="btn btn-info">Editar</a>
                        <form action="{{ route ('hospital.destroy',$hospital->COD_HOSPITAL )}}" method="POST" class="d-inline">
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

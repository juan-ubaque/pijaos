@extends('layouts.base')


@section('contenido')
    <h1>vista index</h1>
    <a href="hospital/create" class="btn btn-primary">Crear</a>

    <table class="table table-striped table-dark mt-4">
        <thead>
            <tr>
                <th scope="col">COD_HOSPITAL/th>
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
                        <a href="" class="btn btn-info">Editar</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection

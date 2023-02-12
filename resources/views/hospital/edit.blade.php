@extends('layouts.base')


@section('contenido')
    <h1>Edicion de registros</h1>
    <form action="/hospital/{{$hospital->COD_HOSPITAL}}" method="post" class="text-bg-dark ">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="COD_HOSPITAL" class="form-label">COD_HOSPITAL</label>
            <input value={{$hospital->COD_HOSPITAL}} type="text" class="form-control text-bg-secondary" id="COD_HOSPITAL"name="COD_HOSPITAL" >
        </div>
        <div class="mb-3">
            <label for="NOMBRE" class="form-label">NOMBRE</label>
            <input value="{{$hospital->NOMBRE}}" type="text" class="form-control text-bg-secondary"id="NOMBRE" name="NOMBRE" >
        </div>
        <a href="/hospital" class="btn btn-secondary">CANCELAR</a>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </form>

@endsection

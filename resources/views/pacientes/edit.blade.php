@extends('layouts.base')

@section('contenido')
<h2>Edicion de Paciente: </h2>
<form action="/paciente/{{$pacientes->NO_DOCUMENTO}}" method="post" class="text-bg-dark ">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="TIPO_DOCUMENTO" class="form-label">TIPO_DOCUMENTO</label>
        <select id="TIPO_DOCUMENTO" class="form-control text-bg-secondary" name="TIPO_DOC">
            <option value="CC">CC</option>
            <option value="TI">TI</option>
            <option value="CE">CE</option>
            <option value="OTRO">OTRO</option>
        </select>
    </div>
    <div class="mb-3">
        <label  for="NO_DOCUMENTO" class="form-label">NO_DOCUMENTO</label>
        <input value="{{$pacientes->NO_DOCUMENTO}}" type="text" class="form-control text-bg-secondary" id="NO_DOCUMENTO" name="NO_DOCUMENTO">
    </div>
    <div class="mb-3">
        <label for="NOMBRES" class="form-label">NOMBRES</label>
        <input value="{{$pacientes->NOMBRES}}" type="text" class="form-control text-bg-secondary" id="NOMBRES" name="NOMBRES">
    </div>
    <div class="mb-3">
        <label for="APELLIDOS" class="form-label">APELLIDOS</label>
        <input value="{{$pacientes->APELLIDOS}}" type="text" class="form-control text-bg-secondary" id="APELLIDOS" name="APELLIDOS">
    </div>
    <div class="mb-3">
        <label for="FEC_NACIMIENTO" class="form-label">FECHA_NACIMIENTO</label>
        <input value="{{$pacientes->FEC_NACIMIENTO}}" type="text" class="form-control text-bg-secondary" id="FEC_NACIMIENTO" name="FEC_NACIMIENTO">
    </div>
    <div class="mb-3">
        <label for="EMAIL" class="form-label">EMAIL</label>
        <input value="{{$pacientes->EMAIL}}" type="text" class="form-control text-bg-secondary" id="EMAIL" name="EMAIL">
    </div>
    <a href="/paciente" class="btn btn-secondary">CANCELAR</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</form>

@endsection

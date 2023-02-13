@extends('layouts.base')


@section('contenido')


<h2>Registro Gestiones Hospitalarias</h2>
<form action="/gestion_hospitalaria" method="post" class="text-bg-dark ">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @method('POST')
    @csrf
    <div class="mb-3">
        <label for="COD_GESTION_HOSPITALARIA" class="form-label">TIPO_DOCUMENTO</label>
        <select class="form-control text-bg-secondary" name="TIPO_DOC_PACIENTE" id="TIPO_DOC_PACIENTE">
            <option value="CC">CC</option>
            <option value="TI">TI</option>
            <option value="CE">CE</option>
            <option value="OTRO">OTRO</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="NO_DOC_PACIENTE" class="form-label">NRO DOCUMENTO DEL PACIENTE</label>
        <select class="form-control text-bg-secondary" name="NO_DOC_PACIENTE" id="NO_DOC_PACIENTE">
            @foreach ($pacientes as $paciente)
            <option value="{{$paciente->NO_DOCUMENTO}}">{{$paciente->NO_DOCUMENTO}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="COD_HOSPITAL" class="form-label">COD_HOSPITAL</label>
        <select  class="form-control text-bg-secondary" name="COD_HOSPITAL">
            @foreach($hospitales as $hospital)
                <option value="{{$hospital->COD_HOSPITAL}}">{{$hospital->NOMBRE}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="FEC_INGRESO" class="form-label">FECCHA INGRESO</label>
        <input type="text" class="form-control text-bg-secondary" id="FEC_INGRESO" name="FEC_INGRESO">
    </div>
    <div class="mb-3">
        <label for="FEC_SALIDA" class="form-label">FECHA SALIDA</label>
        <input type="text" class="form-control text-bg-secondary" id="FEC_SALIDA" name="FEC_SALIDA">
    </div>
    <a href="/gestion_hospitalaria" class="btn btn-secondary">CANCELAR</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>



</form>

@endsection

@extends('layouts.base')

@section('contenido')
<form action="/gestion_hospitalaria/{{$gestiones->ID_HOSPITALIZACION}}" method="post" class="text-bg-dark ">
    @method('PUT')
    @csrf
    <div class="mb-3">
    <label for="TIPO_DOC_PACIENTE" class="form-label">TIPO_DOC_PACIENTE></label>
        <select  class="form-control text-bg-secondary" name="TIPO_DOC_PACIENTE" id="TIPO_DOC_PACIENTE">
            <option value="CC">CC</option>
            <option value="TI">TI</option>
            <option value="CE">CE</option>
            <option value="OTRO">OTRO</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="NO_DOC_PACIENTE" class="form-label">NO_DOC_PACIENTE</label>
        <input value="{{$gestiones->NO_DOC_PACIENTE}}" type="text" class="form-control text-bg-secondary" id="NO_DOC_PACIENTE" name="NO_DOC_PACIENTE">
    </div>
    <div class="mb-3">
        <label for="COD_HOSPITAL" class="form-label">COD_HOSPITAL</label>
        <input value="{{$gestiones->COD_HOSPITAL}}" type="text" class="form-control text-bg-secondary" id="COD_HOSPITAL" name="COD_HOSPITAL">
    </div>
    <div class="mb-3">
        <label for="FEC_INGRESO" class="form-label">FEC_INGRESO</label>
        <input value="{{$gestiones->FEC_INGRESO}}" type="text" class="form-control text-bg-secondary" id="FEC_INGRESO" name="FEC_INGRESO">
    </div>
    <div class="mb-3">
        <label for="FEC_SALIDA" class="form-label">FEC_SALIDA</label>
        <input value="{{$gestiones->FEC_SALIDA}}" type="text" class="form-control text-bg-secondary" id="FEC_SALIDA" name="FEC_SALIDA">
    </div>
    <a href="/gestion_hospitalaria" class="btn btn-secondary">CANCELAR</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</form>


@endsection

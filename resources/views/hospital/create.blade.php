@extends('layouts.base')

@section('contenido')

<h2>REGISTRO HOSPITAL</h2>
<form action="/hospital" method="post" class="text-bg-dark ">
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
        <label for="COD_HOSPITAL" class="form-label">COD_HOSPITAL</label>
        <input type="text" class="form-control text-bg-secondary" id="COD_HOSPITAL" name="COD_HOSPITAL">
    </div>
    <div class="mb-3">
        <label for="NOMBRE" class="form-label">NOMBRE</label>
        <input type="text" class="form-control text-bg-secondary" id="NOMBRE" name="NOMBRE">
    </div>
    <a href="/hospital" class="btn btn-secondary">CANCELAR</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</form>
@endsection

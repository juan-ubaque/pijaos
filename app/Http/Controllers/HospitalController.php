<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Enviamos la consulta a la base de datos
        $hospitales = Hospital::all();
        //Retornamos la vista con los datos de la consulta enviada en;
        return view('hospital.index')->with('hospitales',$hospitales);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $hospital = new Hospital();
        $hospital->COD_HOSPITAL = $request->COD_HOSPITAL;
        $hospital->nombre = $request->NOMBRE;

        $hospital->save();
        return redirect('hospital/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospitales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtenemos el registro a editar desde la base de datos
        $hospital = Hospital::find($id);
        // Retornamos la vista con los datos del registro a editar

        return view('hospital.edit')->with('hospital',$hospital);
    }

    /**
     * Update the specified resource in storage.
     *  @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Una vez obtenido el registro a editar, se procede a actualizarlo
        $hospital = Hospital::find($id);
        $hospital->COD_HOSPITAL = $request->COD_HOSPITAL;
        $hospital->nombre = $request->NOMBRE;

        $hospital->save();
        return redirect('hospital/');
    }

    /**
     * Remove the specified resource from storage.
     *  @param int $id
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtenemos el registro a eliminar
        $hospital = Hospital::find($id);
        //Eliminamos el registro
        $hospital->delete();
        //Redireccionamos a la vista index
        return redirect('hospital/');
    }
}

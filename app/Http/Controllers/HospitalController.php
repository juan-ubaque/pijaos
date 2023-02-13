<?php

namespace App\Http\Controllers;
use App\Models\GestionHospitalaria;

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

        //validamos que el nombre del hospital no se repita y en caso de que se repita, se envia un mensaje de error en la vista en alerta de bootstrap
        $request->validate([
            'COD_HOSPITAL' => 'required|unique:hospitales,COD_HOSPITAL',
            'NOMBRE' => 'required|unique:hospitales,NOMBRE'
        ],[
            'COD_HOSPITAL.required' => 'El campo COD_HOSPITAL es obligatorio',
            'COD_HOSPITAL.unique' => 'El campo COD_HOSPITAL ya existe',
            'NOMBRE.required' => 'El campo NOMBRE es obligatorio',
            'NOMBRE.unique' => 'El campo NOMBRE ya existe']);




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
        $request->validate([
            'COD_HOSPITAL' => 'required|unique:hospitales,COD_HOSPITAL',
            'NOMBRE' => 'required|unique:hospitales,NOMBRE'
        ],[
            'COD_HOSPITAL.required' => 'El campo COD_HOSPITAL es obligatorio',
            'COD_HOSPITAL.unique' => 'El campo COD_HOSPITAL ya existe',
            'NOMBRE.required' => 'El campo NOMBRE es obligatorio',
            'NOMBRE.unique' => 'El campo NOMBRE ya existe']);
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
        //validamos que  no alla registro en gestion_hospitalaria que tenga el id del hospital a eliminar
        $count =  GestionHospitalaria::where('COD_HOSPITAL',$id)->count();
        if ($count > 0) {
            return redirect('hospital/')->with('Error', 'No se puede eliminar este hospital ya que existen registros en la tabla gestion_hospitalaria relacionados a él.');
        }
        //Eliminamos el registro
        $hospital->delete();
        //Redireccionamos a la vista index
        return redirect('hospital/');
    }
}

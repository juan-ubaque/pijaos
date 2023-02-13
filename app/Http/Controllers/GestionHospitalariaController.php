<?php

namespace App\Http\Controllers;
use App\Models\Hospital;
use App\Models\Pacientes;
use App\Models\GestionHospitalaria;
use Illuminate\Http\Request;

class GestionHospitalariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtenemos todos los registros de la tabla gestion_hospitalaria
        $gestion_hospitalaria = GestionHospitalaria::all();
        //Retornamos la vista gestion_hospitalaria.index y le pasamos los registros de la tabla gestion_hospitalaria
        return view('gestion_hospitalaria.index')->with('gestiones',$gestion_hospitalaria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtenemos la informacion de la tabla hospital y pacientes
        $hospitales = Hospital::all();
        $pacientes = Pacientes::all();
        //retornamos la vista gestion_hospitalaria.create y le pasamos la informacion de la tabla hospital
        return view('gestion_hospitalaria.create')->with('hospitales',$hospitales)->with('pacientes',$pacientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Instanciamos un objeto de la clase GestionHospitalaria
        $gestion_hospitalaria = new GestionHospitalaria();
        //validamos los campos del formulario
        $request->validate([
            'TIPO_DOC_PACIENTE' => 'required|string',
            'NO_DOC_PACIENTE' => 'required|numeric',
            'COD_HOSPITAL' => 'required|numeric',
            'FEC_INGRESO' => 'required|date',
            'FEC_SALIDA' => 'required|date',
        ]);
        //Asignamos los valores de los campos del formulario a los atributos del objeto
        $gestion_hospitalaria->TIPO_DOC_PACIENTE = $request->TIPO_DOC_PACIENTE;
        $gestion_hospitalaria->NO_DOC_PACIENTE = $request->NO_DOC_PACIENTE;
        $gestion_hospitalaria->COD_HOSPITAL = $request->COD_HOSPITAL;
        $gestion_hospitalaria->FEC_INGRESO = $request->FEC_INGRESO;
        $gestion_hospitalaria->FEC_SALIDA = $request->FEC_SALIDA;

        //Guardamos el objeto en la base de datos
        $gestion_hospitalaria->save();
        //Redireccionamos a la vista gestion_hospitalaria.index
        return redirect('gestion_hospitalaria/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GestionHospitalaria  $gestionHospitalaria
     * @return \Illuminate\Http\Response
     */
    public function show(GestionHospitalaria $gestionHospitalaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\GestionHospitalaria  $gestionHospitalaria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consultamos el registro de la tabla gestion_hospitalaria que tenga el id que se recibe como parametro
        $gestion_hospitalaria = GestionHospitalaria::find($id);
        //Retornamos la vista gestion_hospitalaria.edit y le pasamos el registro de la tabla gestion_hospitalaria
        return view('gestion_hospitalaria.edit')->with('gestiones',$gestion_hospitalaria);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GestionHospitalaria  $gestionHospitalaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Obtenemos el registro de la tabla gestion_hospitalaria que tenga el id que se recibe como parametro
        $gestion_hospitalaria = GestionHospitalaria::find($id);
        //validamos los campos del formulario
        $request->validate([
            //'ID_HOSPITALIZACION' => 'required|numeric',
            'TIPO_DOC_PACIENTE' => 'required|string',
            'NO_DOC_PACIENTE' => 'required|numeric',
            'COD_HOSPITAL' => 'required|numeric',
            'FEC_INGRESO' => 'required|date',
            'FEC_SALIDA' => 'required|date',
            //'FEC_CREACION' => 'required|date',
        ]);
        //Asignamos los valores de los campos del formulario a los atributos del objeto
        //$gestion_hospitalaria->ID_HOSPITALIZACION = $request->ID_HOSPITALIZACION;
        $gestion_hospitalaria->TIPO_DOC_PACIENTE = $request->TIPO_DOC_PACIENTE;
        $gestion_hospitalaria->NO_DOC_PACIENTE = $request->NO_DOC_PACIENTE;
        $gestion_hospitalaria->COD_HOSPITAL = $request->COD_HOSPITAL;
        $gestion_hospitalaria->FEC_INGRESO = $request->FEC_INGRESO;
        $gestion_hospitalaria->FEC_SALIDA = $request->FEC_SALIDA;
        //$gestion_hospitalaria->created_at = $request->FEC_CREACION;

        //Guardamos el objeto en la base de datos
        $gestion_hospitalaria->save();
        //Redireccionamos a la vista gestion_hospitalaria.index
        return redirect('gestion_hospitalaria/');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @param  \App\Models\GestionHospitalaria  $gestionHospitalaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //consultamos el registro de la tabla gestion_hospitalaria que tenga el id que se recibe como parametro
        $gestion_hospitalaria = GestionHospitalaria::find($id);
        //Eliminamos el registro de la tabla gestion_hospitalaria
        $gestion_hospitalaria->delete();
        //Redireccionamos a la vista gestion_hospitalaria.index
        return redirect('gestion_hospitalaria/');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\GestionHospitalaria;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultar los pacientes de la base de datos
        $pacientes = Pacientes::all();
        //retornar la vista con los pacientes

        return view('pacientes.index')->with('pacientes',$pacientes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validar los datos
        $request->validate([
            'TIPO_DOC' => 'required|in:CC,TI,CE,OTRO',
            'NO_DOCUMENTO' => 'required|numeric|unique:pacientes,NO_DOCUMENTO',
            'NOMBRES' => 'required|string|unique:pacientes,NOMBRES',
            'APELLIDOS' => 'required|string',
            'FEC_NACIMIENTO' => 'required|date',
            'EMAIL' => 'required|email',
        ],[
            'TIPO_DOC.required' => 'El campo TIPO_DOC es obligatorio',
            'TIPO_DOC.in' => 'El campo TIPO_DOC debe ser CC, TI, CE, OTRO',
            'NO_DOCUMENTO.required' => 'El campo NO_DOCUMENTO es obligatorio',
            'NO_DOCUMENTO.numeric' => 'El campo NO_DOCUMENTO debe ser numerico',
            'NO_DOCUMENTO.unique' => 'El campo NO_DOCUMENTO ya existe',
            'NOMBRES.required' => 'El campo NOMBRES es obligatorio',
            'NOMBRES.string' => 'El campo NOMBRES debe ser texto',
            'APELLIDOS.required' => 'El campo APELLIDOS es obligatorio',
            'APELLIDOS.string' => 'El campo APELLIDOS debe ser texto'
        ]);

        //Aca se guarda el paciente
        $paciente = new Pacientes();
        $paciente->TIPO_DOC = $request->TIPO_DOC;
        $paciente->NO_DOCUMENTO = $request->NO_DOCUMENTO;
        $paciente->NOMBRES = $request->NOMBRES;
        $paciente->APELLIDOS = $request->APELLIDOS;
        $paciente->FEC_NACIMIENTO = $request->FEC_NACIMIENTO;
        $paciente->EMAIL = $request->EMAIL;

        //guardar el paciente
        $paciente->save();
        //redireccionar a la vista de pacientes
        return redirect('paciente/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consultar el paciente
        $pacientes = Pacientes::find($id);
        //retornar la vista con los datos del paciente
        return view('pacientes.edit')->with('pacientes',$pacientes);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //obtener el paciente a editar
        $pacientes = Pacientes::find($id);
        //validar los datos
        $request->validate([
            'TIPO_DOC' => 'required|in:CC,TI,CE,OTRO',
            'NO_DOCUMENTO' => 'required|numeric',
            'NOMBRES' => 'required|string',
            'APELLIDOS' => 'required|string',
            'FEC_NACIMIENTO' => 'required|date',
            'EMAIL' => 'required|email',],
            [
            'TIPO_DOC.required' => 'El campo TIPO_DOC es obligatorio',
            'TIPO_DOC.in' => 'El campo TIPO_DOC debe ser CC, TI, CE, OTRO',
            'NO_DOCUMENTO.required' => 'El campo NO_DOCUMENTO es obligatorio',
            'NO_DOCUMENTO.numeric' => 'El campo NO_DOCUMENTO debe ser numerico',
            'NO_DOCUMENTO.unique' => 'El campo NO_DOCUMENTO ya existe',
            'NOMBRES.required' => 'El campo NOMBRES es obligatorio',
            'NOMBRES.string' => 'El campo NOMBRES debe ser texto',
            'APELLIDOS.required' => 'El campo APELLIDOS es obligatorio',
            'APELLIDOS.string' => 'El campo APELLIDOS debe ser texto'
            ]);

        //Aca se guarda el paciente
        $pacientes->TIPO_DOC = $request->TIPO_DOC;
        $pacientes->NO_DOCUMENTO = $request->NO_DOCUMENTO;
        $pacientes->NOMBRES = $request->NOMBRES;
        $pacientes->APELLIDOS = $request->APELLIDOS;
        $pacientes->FEC_NACIMIENTO = $request->FEC_NACIMIENTO;
        $pacientes->EMAIL = $request->EMAIL;

        //guardar el paciente
        $pacientes->save();
        //redireccionar a la vista de pacientes
        return redirect('paciente/');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtenemos el registro a eliminar
        $pacientes = Pacientes::find($id);
        $count =  GestionHospitalaria::where('NO_DOC_PACIENTE',$id)->count();
        if ($count > 0) {
            return redirect('paciente/')->with('Error', 'No se puede eliminar este hospital ya que existen registros en la tabla gestion_hospitalaria relacionados a él.');
        }
        //Eliminamos el registro
        $pacientes->delete();
        //Redireccionamos a la vista de pacientes
        return redirect('paciente/');
    }
}

<?php

namespace App\Http\Controllers\DatosMaestros;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Status;
use App\Seccion;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datosMaestros.status.index', [
            'status' => Status::with('seccion')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seccion = Seccion::pluck('nombre','id');
        return view('datosMaestros.status.create', compact('seccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'seccion' => 'required',
        ]);
        
        $datosSeccion['id_seccion']=$validatedData['seccion'];
        $datosSeccion['nombre'] = $validatedData['nombre'];
        $datosSeccion['activo'] = 1;
        $show = Status::create($datosSeccion);

        return redirect()->route('status.index')->withStatus('Status creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        $seccion = Seccion::pluck('nombre','id');
        //return view('datosMaestros.status.edit', compact('status','nombre'));
        return view('datosMaestros.status.edit')
                                    ->with('status',$status)
                                    ->with('seccion',$seccion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'seccion' => 'required',
        ]);
        
        $datos['nombre'] = $validatedData['nombre'];
        $datos['id_seccion'] = $validatedData['seccion'];

        //dd($validatedData);
        $status->update($datos);
        
        return redirect()->route('status.index')->withStatus('Status actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        $status->delete();
        return redirect()->route('status.index')->withStatus('Status eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers\DatosMaestros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoAnalisis;

class TipoAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datosMaestros.tipos_analisis.index', [
            'tiposAnalisis' => TipoAnalisis::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosMaestros.tipos_analisis.create');
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
            'nombre' => 'required|max:255|unique:tipo_analisis',
        ]);
        
        $show = TipoAnalisis::create($validatedData);

        return redirect()->route('tipos-analisis.index')->withStatus('Tipo de Analisis creado correctamente.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAnalisis $tipoAnalisis)
    {
        return view('datosMaestros.tipos_analisis.edit', compact('tipoAnalisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAnalisis $tipoAnalisis)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255|unique:tipo_analisis,nombre,'.$tipoAnalisis->id,
        ]);
        
        $show = $tipoAnalisis->update($validatedData);

        return redirect()->route('tipos-analisis.index')->withStatus('Tipo de Analisis modificado correctamente.');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAnalisis $tipoAnalisis)
    {
        $tipoAnalisis->delete();
        return redirect()->route('tipos-analisis.index')->withStatus('Tipo de Analisis eliminado correctamente.');
    }
}

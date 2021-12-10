<?php

namespace App\Http\Controllers\DatosMaestros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ValorAnalisis;

class ValorAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datosMaestros.valores_analisis.index', [
            'valoresAnalisis' => ValorAnalisis::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosMaestros.valores_analisis.create');
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
            'nombre' => 'required|max:255|unique:valores_analisis',
        ]);
        
        $show = ValorAnalisis::create($validatedData);

        return redirect()->route('valores-analisis.index')->withStatus('Valores para analisis creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ValorAnalisis $valorAnalisis)
    {
        return view('datosMaestros.valores_analisis.edit', compact('valorAnalisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValorAnalisis $valorAnalisis)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255|unique:valores_analisis,nombre,'.$valorAnalisis->id,
        ]);
        
        $show = $valorAnalisis->update($validatedData);

        return redirect()->route('valores-analisis.index')->withStatus('valor modificado correctamente.');    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValorAnalisis $valorAnalisis )
    {
        $valorAnalisis->delete();
        return redirect()->route('valores-analisis.index')->withStatus('valor eliminado correctamente.');    
    }
}

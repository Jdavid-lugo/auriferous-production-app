<?php

namespace App\Http\Controllers\DatosMaestros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datosMaestros.unidades.index', [
            'unidades' => Unidade::paginate(15)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosMaestros.unidades.create');
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
            'nombre' => 'required|max:255|unique:unidades',
            'siglas' => 'required|max:255|unique:unidades',
        ]);
        
        $show = Unidade::create($validatedData);

        return redirect()->route('unidades.index')->withStatus('Unidad creada correctamente.');
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
    public function edit(Unidade $unidade)
    {
         return view('datosMaestros.unidades.edit', compact('unidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Unidade $unidade)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255|unique:unidades,nombre,' . $unidade->id,
            'siglas' => 'required|max:255|unique:unidades,siglas,' . $unidade->id,
        ]);
        $unidade->update($validatedData);

        return redirect()->route('unidades.index')->withStatus('Unidad actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();

        return redirect()->route('unidades.index')->withStatus('Unidad eliminado correctamente.');
    }
}

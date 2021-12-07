<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Molino;


class DatosMaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function molinoIndex()
    {
        return view('datosMaestros.molinos.index', [
            'molinos' => Molino::paginate(15)
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosMaestros.molinos.create');
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
            'rif' => 'required|max:255|unique:molinos',
            'tlf' => 'required|max:255',
            'sector' => 'required|max:255',
        ]);
        
        $show = Molino::create($validatedData);

        return redirect()->route('molinos.index')->withStatus('Molino creado correctamente.');
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
    public function edit(Molino $molino)
    {
        return view('datosMaestros.molinos.edit', compact('molino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Molino $molino)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'rif' => 'required|max:255|unique:molinos,rif,' . $molino->id,
            'tlf' => 'required|max:255',
            'sector' => 'required|max:255',
        ]);
        $molino->update($validatedData);

        return redirect()->route('molinos.index')->withStatus('Molino actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Molino $molino)
    {
        $molino->delete();

        return redirect()->route('molinos.index')->withStatus('Molino eliminado correctamente.');
    }
}

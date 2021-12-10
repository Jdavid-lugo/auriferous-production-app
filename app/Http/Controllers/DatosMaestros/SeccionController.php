<?php

namespace App\Http\Controllers\DatosMaestros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Seccion;

class SeccionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datosMaestros.seccion.index', [
            'secciones' => Seccion::paginate(15)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosMaestros.seccion.create');
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
            'nombre' => 'required|max:255|unique:seccion',
        ]);
        
        $show = Seccion::create($validatedData);

        return redirect()->route('secciones.index')->withStatus('Unidad creada correctamente.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccione)
    {
         return view('datosMaestros.seccion.edit', compact('seccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Seccion $seccione)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255|unique:seccion,nombre,' . $seccione->id,
        ]);
        $seccione->update($validatedData);

         return redirect()->route('secciones.index')->withStatus('Sección actualizado correctamente.');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccione)
    {
        $seccion->delete();

        return redirect()->route('secciones.index')->withStatus('Unidad eliminado correctamente.');
    }
}

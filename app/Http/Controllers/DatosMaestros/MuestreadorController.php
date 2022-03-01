<?php

namespace App\Http\Controllers\DatosMaestros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Muestreador;
use App\User;



class MuestreadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muestreadores = Muestreador::withTrashed('user.Roles')->get();
        return view('datosMaestros.muestreador.index',compact('muestreadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muestreadores = Muestreador::pluck('user_id');
        $notInMuestreadores =array();
        foreach ($muestreadores as $key => $value) {
                $notInMuestreadores[]=$value;    
        }

        
        $usuarios = User::with('roles')->whereNotIn('id',$notInMuestreadores)->get();
        
        return view('datosMaestros.muestreador.create',compact('usuarios'));
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
            'muestreador' => 'required|max:255'
        ]);
        
        $eliminados = Muestreador::onlyTrashed()->where('user_id','=',$validatedData["muestreador"])->get();

        $datosMuestreador['user_id'] =  $validatedData['muestreador'];
        
        if(count($eliminados)>0){
            $show = Muestreador::where('user_id','=',$validatedData["muestreador"])->restore();
        }else{
            $show = Muestreador::create($datosMuestreador);
        }

        return redirect()->route('muestreador.index')->withStatus('Muestreador seleccionado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Muestreador  $muestreador
     * @return \Illuminate\Http\Response
     */
    public function show(Muestreador $muestreador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Muestreador  $muestreador
     * @return \Illuminate\Http\Response
     */
    public function edit(Muestreador $muestreador)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Muestreador  $muestreador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muestreador $muestreador)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Muestreador  $muestreador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muestreador $muestreador)
    {
        $muestreador->delete();
        return redirect()->route('muestreador.index')->withStatus('Muestreador eliminado correctamente.');
    }
}

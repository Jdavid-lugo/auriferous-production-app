<?php

namespace App\Http\Controllers\Laboratorio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AnalisisLaboratorio;
use App\AnalisisArenas;
use App\Analisis;
use App\ProductAnalisisLab;
use App\TipoAnalisis;


class AnalisisManejoMineralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sql = "
            select la.id as lote_arena_id,la.codigo,ta.id as tipo_analisis_id,ta.nombre,DATE(al.fecha) 
            from analisis_arenas aa 
            inner join lote_arena la on lote_arena_id  = la.id 
            inner join analisis_laboratorio al on al.id = analisis_laboratorio_id 
            inner join analisis a  on a.id = al.analisis_id 
            inner join tipo_analisis ta  on ta.id = a.tipo_analisis_id 
            
            where 
            aa.accepted_by_user is null  
            group by 1,2,3,4,5
         ";
        

        $analisis = DB::select($sql);

        dd($analisis);
        return view('laboratorio.analisis_manejo_minerales.index',compact('analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_analisis = TipoAnalisis::pluck('nombre','id');

        return view('laboratorio.analisis_manejo_minerales.create', compact('tipos_analisis'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formValores($tipo_analisis_id)
    {
        $analisisValores = Analisis::with(
                                     ['valoresAnalisis'=> function ($query) {$query->select('id','nombre');}])
                                     ->where('tipo_analisis_id',$tipo_analisis_id)
                                     ->get(['id','valores_id']);
        
        

        return json_encode($analisisValores);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\laboratorio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnalisisOperacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sql = "
        //     select tap.tipo_analisis_id,ta.nombre,
        //         array_to_string(array((
        //             select p.name from tipo_analisis_products as secundario 
        //             inner join products p on p.id = secundario.product_id 
        //             where secundario.tipo_analisis_id = tap.tipo_analisis_id and secundario.deleted_at is null)),'|') as reactivos
        //     from tipo_analisis_products tap 
        //     inner join tipo_analisis ta on ta.id = tap.tipo_analisis_id 
        //     where tap.deleted_at is null
        //     group by 1,2,3
        //     order by tipo_analisis_id asc
        // ";
        
        $sql ="select * from analisis_laboratorio";

        $analisis = DB::select($sql);

        return view('laboratorio.analisis_operaciones.index',compact('analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

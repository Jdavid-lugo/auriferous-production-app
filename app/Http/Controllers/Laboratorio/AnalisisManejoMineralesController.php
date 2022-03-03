<?php

namespace App\Http\Controllers\Laboratorio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AnalisisLaboratorio;
use App\AnalisisArenas;
use App\Analisis;
use App\ProductAnalisisLab;
use App\TipoAnalisis;
use App\ReactivosAnalisis;
use App\Unidade;


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
            select la.id as lote_arena_id,la.codigo,ta.id as tipo_analisis_id,ta.nombre,DATE(al.fecha) as fecha
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cargarValores($lote_arena_id,$tipo_analisis_id)
    {
        $sql = "
            select al.id as analisis_laboratorio_id ,va.nombre as valores, al.valor ,
                la.id as lote_arena,la.codigo,ta.id as tipo_analisis_id ,ta.nombre,DATE(al.fecha) 
                from analisis_arenas aa 
                inner join lote_arena la on lote_arena_id  = la.id 
                inner join analisis_laboratorio al on al.id = analisis_laboratorio_id 
                inner join analisis a  on a.id = al.analisis_id 
                inner join valores_analisis va on va.id = a.valores_id 
                inner join tipo_analisis ta  on ta.id = a.tipo_analisis_id 
                
                where 
                    la.id = $lote_arena_id
                    and ta.id= $tipo_analisis_id
                    and aa.processed_by_user is null
        ";

        
        $reactivos = ReactivosAnalisis::where('tipo_analisis_id',$tipo_analisis_id)->
                                        with('products','TipoAnalisis')->get();
        $valores = DB::select($sql);
        $unidades = Unidade::pluck('siglas','id');
        
        return view('laboratorio.analisis_manejo_minerales.insert',compact('valores','reactivos','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return view('pages.notifications');
        DB::beginTransaction();

        $reglas = array();
        $dataLimpia = array();

        foreach($request->request as $key => $r ){
            if($key != '_token'){
                if(substr($key,0,6) == 'valor_'){
                    $reglas[$key] = 'required|numeric';
                }
                
            } 
        }
        
        
        
        $validatedData = $request->validate($reglas);
        foreach ($validatedData as $key => $value) {
            $dataLimpia['valor'] = $value;
            $dataLimpia['analista_id'] = Auth::id();
            // con subtrs elimino el "valor_"
            $id = substr($key, 6);
            
            try {
                AnalisisLaboratorio::where('id',$id)->update($dataLimpia);
            }catch(ValidationException $e){
                DB::rollback();
                return redirect()->route('analisis-manejo-minerales.index')
                    ->withErrors( $e->getErrors() );
            }
        }

        
        $reglas = array();
        foreach($request->request as $key => $r ){
            if(substr($key,0,9) == 'unidades_'){
                $reglas[$key] = 'required';
            }else if(substr($key,0,9) == 'reactivo_'){
                $reglas[$key] ='required|numeric';
            }
        }
        dd($reglas);
        // try {
        //     AnalisisLaboratorio::update($dataLimpia,$key);
        // }catch(ValidationException $e){
        //     DB::rollback();
        //     return redirect()->route('analisis-manejo-minerales.index')
        //         ->withErrors( $e->getErrors() );
        // }
        //dd($dataLimpia);
        dd("guardo todo");
        //DB::commit();


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



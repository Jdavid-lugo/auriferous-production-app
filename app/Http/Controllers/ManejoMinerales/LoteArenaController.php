<?php

namespace App\Http\Controllers\ManejoMinerales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\LoteArena;
use App\Molino;
use App\Status;
use App\User;
use App\Seccion;
use App\Muestreador;
use App\TipoAnalisis;
use App\Analisis;
use App\AnalisisLaboratorio;
use App\AnalisisArenas;


class LoteArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos = LoteArena::with(['status_','molino','user'])->get();
        //dd($datos);
        return view('manejoMinerales.loteArena.index', [
            'lotesArenas' => $datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nroLote = date('Wy');
        $molinos = Molino::pluck('nombre','id');
        $muestreadores = Muestreador::with('user')->get();
        $seccion= Seccion::where('nombre','like','Manejo de minerales')->get();
        $status = Status::where('id_seccion',$seccion[0]->id)->get();
        $tiposAnalisis = TipoAnalisis::pluck('nombre','id');

        return view('manejoMinerales.loteArena.create', compact('tiposAnalisis','nroLote','molinos','status','muestreadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataLimpia = array();
        $nroLote = date('Wy');
        if($request['codigo'] != ''){
            $request['codigo'] =  $request['codigo'].$nroLote;
        }

        $validatedData = $request->validate([
            'codigo' => 'required|max:255|unique:lote_arena,codigo',
            'molino' => 'required',
            'status' => 'required',
            'muestreador' => 'required',
            'responsable'=> 'required|max:255',
            'tipo-analisis'=> 'required',

        ]);

        DB::beginTransaction();

        $dataLoteArena['codigo'] = $validatedData['codigo'];
        $dataLoteArena['molino_id'] = $validatedData['molino'];
        $dataLoteArena['status'] = $validatedData['status'];
        $dataLoteArena['responsable'] = $validatedData['responsable'];
        $dataLoteArena['created_by_user'] = Auth::id();
        $muestreador = $validatedData['muestreador'];
        
        try {
            $loteArenaId = LoteArena::create($dataLoteArena);
        }catch(ValidationException $e){
            DB::rollback();
            return redirect()->route('mm-control-arenas.index')
                ->withErrors( $e->getErrors() );
                
        }

        $seccion= Seccion::where('nombre','like','Laboratorio')->get();
        $status = Status::where('id_seccion',$seccion[0]->id)->where('nombre','like','Nueva Solicitud')->get();

        foreach($validatedData['tipo-analisis'] as $key => $solicitudAnalisis){

            $datosAnalisis = Analisis::where('tipo_analisis_id','=',$solicitudAnalisis)->get();
            foreach($datosAnalisis as $key2 => $analisis ){
                //echo  'id tipo analisis:'.$solicitudAnalisis.'----analisis'.$analisis->id.'<br><br>';
                // Ingresando analisis laboratorio con los valores y id analista vacio, esto 
                // para que el analista de laboratorio lo inserte 
                $dataAnalisisLab = array();
                $dataAnalisisLab['fecha']=date('d-m-Y H:m');
                $dataAnalisisLab['analisis_id']=$analisis->id;
                
                //echo "<br>Creando registros analisis laboratorio -".$solicitudAnalisis. " analisis -".$analisis->id ;
                try {

                    $analisisLabId = AnalisisLaboratorio::create($dataAnalisisLab);
                
                } catch (ValidationException $e) {
                    DB::rollback();
                    return redirect()->route('mm-control-arenas.index')
                        ->withErrors( $e->getErrors() );
                        
                }
                
                
                $dataAnalisisArena = array();
                $dataAnalisisArena['lote_arena_id'] = $loteArenaId->id ;
                $dataAnalisisArena['analisis_laboratorio_id'] = $analisisLabId->id;
                $dataAnalisisArena['muestreador_user_id'] = $muestreador;
                $dataAnalisisArena['status_id'] = $status[0]->id ;
                $dataAnalisisArena['created_by_user'] = Auth::id(); 

                
                //echo "<br>Creando analisis Arenas. Estatus de solicitud analisis-".$dataAnalisisArena['status_id'];

                try {
                    $analisisArenasId = AnalisisArenas::create($dataAnalisisArena);
                } catch (ValidationException $e) {
                    return redirect()->route('mm-control-arenas.index')
                        ->withErrors( $e->getErrors() );
                        
                }
                    
            }

        }
        DB::commit();  
       
        return redirect()->route('mm-control-arenas.index')->withStatus('Lote de arena cargado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoteArena  $loteArena
     * @return \Illuminate\Http\Response
     */
    public function show(LoteArena $loteArena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoteArena  $loteArena
     * @return \Illuminate\Http\Response
     */
    public function edit(LoteArena $loteArena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoteArena  $loteArena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoteArena $loteArena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoteArena  $loteArena
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoteArena $loteArena)
    {
        //
    }
}

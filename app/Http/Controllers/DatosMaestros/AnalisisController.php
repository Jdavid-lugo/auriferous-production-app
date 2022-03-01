<?php

namespace App\Http\Controllers\DatosMaestros;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Analisis;
use App\TipoAnalisis;
use App\ValorAnalisis;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Analisis_ = Analisis::with(['tipoAnalisis','valoresAnalisis'])
        //                                                     ->orderBy('id', 'ASC')
        //                                                     ->orderBy('tipo_analisis_id', 'ASC')
        //                                                     ->orderBy('valores_id', 'ASC')
        //                                                     ->get();
 
        $sql = "
            select tipo_analisis_id,ta.nombre,
                array_to_string(array((
                    select va.nombre from analisis as secundario 
                    inner join valores_analisis va on va.id = secundario.valores_id 
                    where secundario.tipo_analisis_id = principal.tipo_analisis_id and secundario.deleted_at is null)),'|') as valores
            from analisis principal 
            inner join tipo_analisis ta on ta.id = principal.tipo_analisis_id 
            where principal.deleted_at is null
            group by 1,2,3
            order by tipo_analisis_id asc
        ";

        $Analisis_ = DB::select($sql);
        

        // dd($Analisis_);
        return view('datosMaestros.analisis.index',compact('Analisis_'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_analisis = TipoAnalisis::pluck('nombre','id');
        
        return view('datosMaestros.analisis.create', compact('tipos_analisis'));
        //return view('datosMaestros.analisis.create')->with('tipos_analisis',$tipos_analisis);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=array();
        $messageError="";
        $validatedData = $request->validate([
            'tipo-analisis' => 'not_in:0',
            'valores_analisis' => 'not_in:0',
        ]);
        
        
        $sql  = "select case when valores_id is not null then 1 else 0 end as analisis 
                from analisis where tipo_analisis_id=:id and valores_id =:valores_id and deleted_at is null;";
        
        
        $arrayValores= array();
        $arrayValidado = array();
        
        $valores_analisis_= isset($validatedData['valores_analisis'])?$validatedData['valores_analisis']:array() ;
        foreach ($valores_analisis_ as $key => $value) {
            $arrayValores[]=$value;
        }
        $arrayValores=implode(", ",$arrayValores);
        
        $notIn = $arrayValores!=''?"and valores_id not in($arrayValores)":"";
        //para borrar el que no se ha seleccionado
        $sql2 = "select id from analisis 
                  where tipo_analisis_id=:id $notIn and deleted_at is null;";
        $paraEliminar = DB::select($sql2, ['id'=>$validatedData['tipo-analisis']]);
        
        
        $sql3 = "select id,analisis_id, case when analisis_id is not null then 1 else 0 end as noSePuedeEliminar 
                    from analisis_laboratorio where analisis_id=:analisis_id and deleted_at is null;";
        foreach($paraEliminar as $key=> $analisis){
            $id_analisis=$analisis->id;
            $noSePuedeEliminar = DB::select($sql3, ['analisis_id'=>$id_analisis]);
            $nspEliminar= count($noSePuedeEliminar)>0?$noSePuedeEliminar[0]->nosepuedeeliminar:false;
            $datosNosePudoEliminar = Analisis::with(['tipoAnalisis','valoresAnalisis'])->where('id',$id_analisis)->get();
            if ($nspEliminar){
                $messageError= "No se puede eliminar la relacion de analisis:". 
                                     $datosNosePudoEliminar[0]->tipoAnalisis->nombre.",".
                                     $datosNosePudoEliminar[0]->valoresAnalisis->nombre.
                                     " Se encuentra asociada en analisis_lab id:".
                                     $noSePuedeEliminar[0]->id;
            }else{
                $analisisParaEliminar=Analisis::find($id_analisis);
                
                $analisisParaEliminar->delete();
                $message[]="Se pudo eliminar el valor:". 
                                    $datosNosePudoEliminar[0]->valoresAnalisis->nombre. 
                                     " tipo de Analisis: ".
                                    $datosNosePudoEliminar[0]->tipoAnalisis->nombre;
            }
        }
        

        foreach ($valores_analisis_ as $key => $value) {
            $existe_valores_analisis = DB::select($sql, ['id'=>$validatedData['tipo-analisis'],"valores_id"=>$value]);
            if(!$existe_valores_analisis){
                $arrayValidado['tipo_analisis_id'] = $validatedData['tipo-analisis'];
                $arrayValidado['valores_id'] = $value;
                Analisis::create($arrayValidado);
                $message[]="Se actualizo correctamente";
            }
        }


        
        $message = "*".implode("<br> *",$message);
        //print_r($message);

        return redirect()->route('analisis.index')->withStatus($message)->withError($messageError);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function selectTipoValorAjax($tipo_analisis_id)
    {
        $sql  = "
            select 
                id,nombre,
                (case 
                    when 
                        (select valores_id from analisis where tipo_analisis_id=:id and valores_id = valores_analisis.id and deleted_at is null) is not null 
                    then 'selected'
                    else ''
                END) AS selected 
            from valores_analisis where deleted_at is null; 
        ";
        
        $valores_analisis = DB::select($sql, ['id'=>$tipo_analisis_id]);

        return json_encode($valores_analisis);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


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

<?php

namespace App\Http\Controllers\DatosMaestros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ReactivosAnalisis;
use App\TipoAnalisis;
use App\Product;

class ReactivoAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "
            select tap.tipo_analisis_id,ta.nombre,
                array_to_string(array((
                    select p.name from tipo_analisis_products as secundario 
                    inner join products p on p.id = secundario.product_id 
                    where secundario.tipo_analisis_id = tap.tipo_analisis_id and secundario.deleted_at is null)),'|') as reactivos
            from tipo_analisis_products tap 
            inner join tipo_analisis ta on ta.id = tap.tipo_analisis_id 
            where tap.deleted_at is null
            group by 1,2,3
            order by tipo_analisis_id asc
        ";

        $Reactivos = DB::select($sql);

        return view('datosMaestros.reactivos_analisis.index',compact('Reactivos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_analisis = TipoAnalisis::pluck('nombre','id');
        
        return view('datosMaestros.reactivos_analisis.create', compact('tipos_analisis'));
        
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
            'reactivos_analisis' => 'not_in:0',
        ]);
        
        
        $sql  = "select case when product_id is not null then 1 else 0 end as reactivos 
                from tipo_analisis_products where tipo_analisis_id=:id and product_id =:product_id and deleted_at is null;";
        
        
        $arrayValores= array();
        $arrayValidado = array();
        
        $reactivos_analisis_= isset($validatedData['reactivos_analisis'])?$validatedData['reactivos_analisis']:array() ;
        foreach ($reactivos_analisis_ as $key => $value) {
            $arrayValores[]=$value;
        }
        $arrayValores=implode(", ",$arrayValores);
        
        $notIn = $arrayValores!=''?"and product_id not in($arrayValores)":"";
        //para borrar el que no se ha seleccionado
        $sql2 = "select id from tipo_analisis_products
                  where tipo_analisis_id=:id $notIn and deleted_at is null;";
        $paraEliminar = DB::select($sql2, ['id'=>$validatedData['tipo-analisis']]);
        
        foreach($paraEliminar as $key=> $analisis){
            $reactivos_id=$analisis->id;
            $datosNosePudoEliminar = ReactivosAnalisis::with(['tipoAnalisis','products'])->where('id',$reactivos_id)->get();
            $reactivosParaEliminar=ReactivosAnalisis::find($reactivos_id);
            $reactivosParaEliminar->delete();
            $message[]="Se pudo eliminar el valor:". 
                        $datosNosePudoEliminar[0]->products->name. 
                        " tipo de Analisis: ".
                        $datosNosePudoEliminar[0]->tipoAnalisis->nombre;
        }
        

        foreach ($reactivos_analisis_ as $key => $value) {
            $existe_reactivos_analisis = DB::select($sql, ['id'=>$validatedData['tipo-analisis'],"product_id"=>$value]);
            $datos = Product::find($value);
            if(!$existe_reactivos_analisis){
                $arrayValidado['tipo_analisis_id'] = $validatedData['tipo-analisis'];
                $arrayValidado['product_id'] = $value;
                ReactivosAnalisis::create($arrayValidado);
                $message[]="Se agrego correctamente ".$datos->name;
            }
        }


        
        $message = "*".implode("<br> *",$message);
        //print_r($message);

        return redirect()->route('reactivos-analisis.index')->withStatus($message)->withError($messageError);
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

    public function selectTipoValorAjax($tipo_analisis_id)
    {
        $sql  = "
            select 
                id,name,
                (case 
                    when 
                        (select product_id from tipo_analisis_products tap where tipo_analisis_id=:id and product_id = products.id and deleted_at is null) is not null 
                    then 'selected'
                    else ''
                END) AS selected 
            from products where deleted_at is null
            and products.product_category_id  = 1;
        ";
        
        $reactivos_analisis = DB::select($sql, ['id'=>$tipo_analisis_id]);

        return json_encode($reactivos_analisis);
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

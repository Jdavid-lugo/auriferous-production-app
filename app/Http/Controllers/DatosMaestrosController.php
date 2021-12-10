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
 
}

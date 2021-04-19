<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iniciativa;
use App\Indicador;

class IniciativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_ind)
    {
        $indicador=Indicador::findOrFail($id_ind);
        $iniciativa=Iniciativa::where('ind_id','=',$id_ind)->get();
        return view('iniciativa.index', compact('indicador','iniciativa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_ind)
    {
        return view('iniciativa.create',compact('id_ind'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_ind)
    {
        $iniciativa=new Iniciativa();
        $iniciativa->ini_nombre=$request->descripcion;
        $iniciativa->ind_id=$id_ind;
        $iniciativa->save();
        return redirect()->route('iniciativa.index', $id_ind)->with('datos','Iniciativa agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iniciativa=Iniciativa::findOrFail($id);
        return view('iniciativa.confirmar',compact('iniciativa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iniciativa=Iniciativa::findOrFail($id);
        return view('iniciativa.edit',compact('iniciativa'));
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
        $iniciativa=Iniciativa::findOrFail($id);
        $iniciativa->ini_nombre=$request->descripcion;
        $iniciativa->save();
        return redirect()->route('iniciativa.index', $iniciativa->ind_id)->with('datos','Iniciativa actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iniciativa=Iniciativa::findOrFail($id);
        $iniciativa->delete();
        return redirect()->route('iniciativa.index', $iniciativa->ind_id)->with('datos','Iniciativa eliminada');
    }
}

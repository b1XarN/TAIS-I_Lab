<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estrategia;
use App\Perspectiva;
use App\Subproceso;
class EstrategiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION = 10;

    public function index(Request $request, $id)
    {
        $buscarpor = $request->get('buscarpor');
        $subproceso = Subproceso::findOrFail($id);
        $estrategia = Estrategia::where('sub_id','=',$id)->where('est_nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        
        return view('estrategia.index', compact('estrategia','buscarpor', 'subproceso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $perspectiva = Perspectiva::get();
        $subproceso = Subproceso::findOrFail($id);
        $estrategia = Estrategia::where('sub_id','=',$id)->get();
        return view('estrategia.create', compact('perspectiva', 'estrategia', 'subproceso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $estrategia = new Estrategia();
        $estrategia->est_nombre = $request->descripcion;
        $estrategia->per_id = $request->perspectiva;
        $estrategia->sub_id = $id;
        $estrategia->save();
        return redirect()->route('estrategia.index', $id)->with('datos', 'Estrategia agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estrategia=Estrategia::findOrFail($id);
        return view('estrategia.confirmar',compact('estrategia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estrategia=Estrategia::findOrFail($id);
        $perspectiva = Perspectiva::get();
        // $subproceso=Subproceso::where('emp_ruc','=',$indicador->emp_ruc)->get();
        return view('estrategia.edit',compact('estrategia', 'perspectiva'));
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
        $estrategia = Estrategia::findOrFail($id);
        $estrategia->est_nombre = $request->descripcion;
        $estrategia->per_id = $request->perspectiva;
        $estrategia->save();
        return redirect()->route('estrategia.index', $estrategia->sub_id)->with('datos','Estrategia actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estrategia=Estrategia::findOrFail($id);
        $estrategia->delete();
        return redirect()->route('estrategia.index', $estrategia->sub_id)->with('datos','Estrategia eliminada');
    }

    public function mapa($id){

        $subproceso = Subproceso::where('sub_id', '=', $id);
        $estrategiaP1 = Estrategia::where('per_id', '=', 1)->where('sub_id', '=', $id)->get();
        $estrategiaP2 = Estrategia::where('per_id', '=', 2)->where('sub_id', '=', $id)->get();
        $estrategiaP3 = Estrategia::where('per_id', '=', 3)->where('sub_id', '=', $id)->get();
        $estrategiaP4 = Estrategia::where('per_id', '=', 4)->where('sub_id', '=', $id)->get();

        return view('reportes.mapa', compact('subproceso', 'estrategiaP1', 'estrategiaP2', 'estrategiaP3', 'estrategiaP4'));
    }
}

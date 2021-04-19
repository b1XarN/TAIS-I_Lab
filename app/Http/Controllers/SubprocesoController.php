<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Subproceso;
use App\proceso;

class SubprocesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    CONST PAGINACION=10;

    public function index(Request $request, $ruc)
    {
        /*if (strcmp($ruc,"ninguno") === 0) {
            return redirect()->route('empresa.index')->with('datos','Elija una empresa para trabajar');
        }*/
        $buscarpor=$request->get('buscarpor');
        $subproceso=Subproceso::where('emp_ruc','=',$ruc)->where('sub_nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('subproceso.index', compact('subproceso','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ruc)
    {
        $empresa=Empresa::findOrFail($ruc);
        return view('subproceso.create',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ruc)
    {
        $subproceso = new Subproceso();
        $subproceso->emp_ruc = $ruc;
        $subproceso->sub_nombre = $request->descripcion;
        $subproceso->sub_responsable = $request->responsable;
        $subproceso->pro_id = $request->get('proceso');
        $subproceso->save();
        return redirect()->route('subproceso.index', $ruc)->with('datos','Subproceso agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subproceso=Subproceso::findOrFail($id);
        return view('subproceso.confirmar',compact('subproceso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subproceso=Subproceso::findOrFail($id);
        //$proceso=Proceso::where('emp_ruc','=',$subproceso->emp_ruc)->get();
        return view('subproceso.edit', compact('subproceso'));
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
        $subproceso=Subproceso::findOrFail($id);
        $subproceso->sub_nombre = $request->descripcion;
        $subproceso->sub_responsable = $request->responsable;
        $subproceso->pro_id = $request->get('proceso');
        $subproceso->save();
        return redirect()->route('subproceso.index', $subproceso->emp_ruc)->with('datos','Subproceso editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subproceso=Subproceso::findOrFail($id);
        $subproceso->delete();
        return redirect()->route('subproceso.index', $subproceso->emp_ruc)->with('datos','Subproceso eliminado!');
    }
}

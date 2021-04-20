<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresa;
use App\Proceso;
use App\Subproceso;
use App\Indicador;
use App\Iniciativa;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    CONST PAGINACION=10;

    public function index(Request $request, $ruc)
    {
        if (strcmp($ruc,"ninguno") === 0) {
            return redirect()->route('empresa.index')->with('datos','Elija una empresa para trabajar');
        }
        $buscarpor=$request->get('buscarpor');
        $indicador=Indicador::where('emp_ruc','=',$ruc)->where('ind_nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('indicador.index', compact('indicador','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ruc)
    {
        $empresa=Empresa::findOrFail($ruc);
        $subproceso=Subproceso::where('emp_ruc','=',$ruc)->get();
        return view('indicador.create',compact('empresa','subproceso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ruc)
    {
        $indicador = new Indicador();
        $indicador->ind_nombre=$request->descripcion;
        $indicador->ind_unidad=$request->unidad;
        $indicador->ind_responsable=$request->responsable;
        $indicador->ind_objetivo=$request->objetivo;
        $indicador->ind_meta=$request->meta;
        $indicador->ind_rojo=$request->rojo;
        $indicador->ind_amarillo=$request->amarillo;
        $indicador->ind_verde=$request->verde;
        $indicador->sub_id=$request->get('subproceso');
        $indicador->emp_ruc=$ruc;
        $indicador->save();
        return redirect()->route('indicador.index', $ruc)->with('datos','Indicador agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indicador=Indicador::findOrFail($id);
        return view('indicador.confirmar',compact('indicador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador=Indicador::findOrFail($id);
        $subproceso=Subproceso::where('emp_ruc','=',$indicador->emp_ruc)->get();
        return view('indicador.edit',compact('indicador','subproceso'));
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
        $indicador=Indicador::findOrFail($id);
        $indicador->ind_nombre=$request->descripcion;
        $indicador->ind_unidad=$request->unidad;
        $indicador->ind_responsable=$request->responsable;
        $indicador->ind_objetivo=$request->objetivo;
        $indicador->ind_meta=$request->meta;
        $indicador->ind_rojo=$request->rojo;
        $indicador->ind_amarillo=$request->amarillo;
        $indicador->ind_verde=$request->verde;
        $indicador->sub_id=$request->get('subproceso');
        $indicador->save();
        return redirect()->route('indicador.index', $indicador->emp_ruc)->with('datos','Indicador actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicador=Indicador::findOrFail($id);
        $indicador->delete();
        return redirect()->route('indicador.index', $indicador->emp_ruc)->with('datos','Indicador eliminado');
    }

    public function matriz($id){
        $empresa = Empresa::findOrFail($id);
        $proceso=Proceso::where('emp_ruc','=',$id)->get();
        $subproceso=Subproceso::where('emp_ruc','=',$id)->get();
        $indicador = Indicador::where('emp_ruc','=',$id)->get();
        $partProceso = array();
        $partSub = array();
        foreach ($subproceso as $item) {
            $i=0;
            foreach ($indicador as $item2) {
                if ($item2->sub_id==$item->sub_id) {
                    $i=$i+1;
                }
            }
            if ($i==0) {
                $i=1;
            }
            $partSub[]=$i;
        }
        foreach ($proceso as $item) {
            $cont = 0;
            foreach ($subproceso as $item2) {
                if ($item->pro_id === $item2->pro_id) {
                    $prueba=DB::table('subproceso as s')
                        ->join('indicador as i','i.sub_id','=','s.sub_id')
                        ->where('s.sub_id','=',$item2->sub_id)
                        ->select(DB::raw('count(*) as cantidad'))
                        ->first();
                    if ($prueba->cantidad === 0) {
                        $cont++;
                    }
                    else{
                        $cont = $cont + $prueba->cantidad;
                    }
                }
            }
            if ($cont === 0) {
                $partProceso[] = 1;
            } else{
                $partProceso[] = $cont;
            }
        }

        return view('reportes.matriz', compact('empresa', 'proceso', 'subproceso', 'indicador', 'partProceso', 'partSub'));
    }

    public function tablero($id){
        $indicador=Indicador::findOrFail($id);
        $iniciativa=Iniciativa::where('ind_id','=',$id)->get();
        return view('reportes.tablero', compact('indicador', 'iniciativa'));
    }

}

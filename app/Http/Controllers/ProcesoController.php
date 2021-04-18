<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Proceso;


class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION = 10;
    const PAGINACION2 = 10;



    public function index()
    {
        // $empresa=Empresa::all()->where('emp_estado','=','1');
        // return view('empresa.index',compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('proceso.create',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data=request()->validate([
            'pro_nombre' => 'required'
        ],
        [
            'pro_nombre.required' => 'Ingrese proceso'
        ]);
        $proceso = new Proceso();
        $proceso->emp_ruc=$id;
        $proceso->pro_nombre=$request->pro_nombre;
        $proceso->save();
        return redirect()->route('proceso.show', $id)->with('datos','Proceso agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (strcmp($id,"ninguno") === 0) {
            return redirect()->route('empresa.index')->with('datos','Elija una empresa para trabajar');
        }

        $buscarpor1=$request->get('buscarpor1');

        $empresa=Empresa::findOrFail($id);
        $proceso=Proceso::where('emp_ruc','=',$id)->where('pro_nombre','like','%'.$buscarpor1.'%')->paginate($this::PAGINACION);

        return view('proceso.index', compact('empresa', 'proceso', 'buscarpor1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proceso=Proceso::findOrFail($id);
        return view('proceso.edit',compact('proceso'));
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
        $data=request()->validate([
            'pro_nombre' => 'required'
        ],
        [
            'pro_nombre.required' => 'Ingrese proceso'
        ]);
        $proceso=Proceso::findOrFail($id);
        $proceso->pro_nombre=$request->pro_nombre;
        $proceso->save();
        return redirect()->route('proceso.show', $proceso->emp_ruc)->with('datos','Proceso Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proceso=Proceso::findOrFail($id);
        $proceso->delete();
        return redirect()->route('proceso.show', $proceso->emp_ruc)->with('datos','Proceso Eliminado...!');
    }

    public function confirmar($id)
    {
        $proceso=Proceso::findOrFail($id);
        return view('proceso.confirmar',compact('proceso'));
    }
}

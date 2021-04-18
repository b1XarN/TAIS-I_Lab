<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa=Empresa::all()->where('emp_estado','=','1');
        return view('empresa.index',compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required',
            'RUC'=>['required','size:11'],
            'direccion' => 'required'
        ],
        [
            'nombre.required'=>'Ingrese nombre de la empresa',
            'RUC.required'=>'Ingrese RUC',
            'RUC.size'=>'RUC incorrecto, debe tener 11 digitos',
            'direccion.required'=>'Ingrese Direccion'            
        ]);
        $empresa = new Empresa();
        $empresa->emp_ruc=$request->RUC;
        $empresa->emp_nombre=$request->nombre;
        $empresa->emp_direccion=$request->direccion;
        $empresa->emp_estado=1;
        $empresa->save();
        return redirect()->route('empresa.index')->with('datos','Empresa nueva guardada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('empresa.confirmar',compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('empresa.edit',compact('empresa'));
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
            'nombre'=>'required',
            'RUC'=>['required','size:11'],
            'direccion' => 'required'
        ],
        [
            'nombre.required'=>'Ingrese nombre de la empresa',
            'RUC.required'=>'Ingrese RUC',
            'RUC.size'=>'RUC incorrecto, debe tener 11 digitos',
            'direccion.required'=>'Ingrese Direccion'            
        ]);
        $empresa=Empresa::findOrFail($id);
        $empresa->emp_ruc=$request->RUC;
        $empresa->emp_nombre=$request->nombre;
        $empresa->emp_direccion=$request->direccion;
        $empresa->save();
        return redirect()->route('empresa.index')->with('datos','Empresa editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa->emp_estado='0';
        $empresa->save();
        return redirect()->route('empresa.index')->with('datos','Empresa eliminada...!');
    }
}

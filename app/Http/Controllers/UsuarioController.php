<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Usuario2;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $name=$request->usuario;
        $usuario=Usuario::where('usu_id','=',$name)->first();
        if ($usuario) {
            $password=$request->contraseña;
            if (strcmp($password,$usuario->usu_contra) === 0) {
                return view('welcome', compact('usuario'));
            } else {
                return back()->withErrors(['contraseña' => 'Contraseña no valida'])->withInput([request('contraseña')]);
            }
        } else {
            return back()->withErrors(['usuario' => 'Usuario no valido'])->withInput([request('usuario')]);
        }
    }

    public function index()
    {
        $usuario=Usuario::where('usu_estado','=',1)->get();
        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
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
            'nombres'=>'required',
            'apellidos'=>'required',
            'DNI'=>['required','size:8'],
            'usuario'=>['required','unique:usuario,usu_id'],
            'contraseña' => ['required','min:8']
        ],
        [
            'nombres.required'=>'Ingrese Nombres',
            'apellidos.required'=>'Ingrese Apellidos',
            'DNI.required'=>'Ingrese DNI',
            'DNI.size'=>'DNI incorrecto, debe tener 8 digitos',
            'usuario.required'=>'Ingrese Usuario',
            'usuario.unique'=>'El usuario ya existe',
            'contraseña.required'=>'Ingrese Contraseña',
            'contraseña.min'=>'Ingrese 8 caracteres como mínimo',
        ]);
        $usuario = new Usuario();
        $usuario->usu_id=$request->usuario;
        $usuario->usu_nombre=$request->nombres;
        $usuario->usu_apellido=$request->apellidos;
        $usuario->usu_dni=$request->DNI;
        $usuario->usu_contra=$request->contraseña;
        $usuario->usu_estado=1;
        $usuario->save();
        return redirect()->route('usuario.index')->with('datos','Usuario creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=Usuario::where('usu_id','=',$id)->first();
        return view('usuario.confirmar',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::where('usu_id','=',$id)->first();
        return view('usuario.edit',compact('usuario'));
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
            'nombres'=>'required',
            'apellidos'=>'required',
            'DNI'=>['required','size:8'],
            'contraseña' => ['required','min:8']
        ],
        [
            'nombres.required'=>'Ingrese Nombres',
            'apellidos.required'=>'Ingrese Apellidos',
            'DNI.required'=>'Ingrese DNI',
            'DNI.size'=>'DNI incorrecto, debe tener 8 digitos',
            'contraseña.required'=>'Ingrese Contraseña',
            'contraseña.min'=>'Ingrese 8 caracteres como mínimo',
        ]);
        $usuario=Usuario2::findOrFail($id);
        $usuario->usu_nombre=$request->nombres;
        $usuario->usu_apellido=$request->apellidos;
        $usuario->usu_dni=$request->DNI;
        $usuario->usu_contra=$request->contraseña;
        $usuario->save();
        return redirect()->route('usuario.index')->with('datos','Usuario creado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=Usuario2::findOrFail($id);
        $usuario->usu_estado=0;
        $usuario->save();
        return redirect()->route('usuario.index')->with('datos','Usuario eliminado!');
    }
}

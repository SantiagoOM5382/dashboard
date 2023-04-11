<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['usuarios'] = Usuario::paginate(4);
        return view('usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $campos = [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'user' => 'required|string',
            'document' => 'required|string',
            'Telefono' => 'required|string|max:10|min:10',
            'coupon' => 'required|string',
            'Correo' => 'required|email',

        ];

        $Mensaje = ["required" => 'El :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);

        $datosUsuario = new

            Usuario();
        $datosUsuario->name =
            $request->input('name');
        $datosUsuario->last_name =
            $request->input('last_name');
        $datosUsuario->document =
            $request->input('document');
        $datosUsuario->user =
            $request->input('user');
        $datosUsuario->Telefono =
            $request->input('Telefono');
        $datosUsuario->Correo =
            $request->input('coupon');
        $datosUsuario->coupon =
            $request->input('Correo');
        $datosUsuario->save();


        return view('redirection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuarios){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $usuario = Usuario::FindOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $campos = [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'document' => 'required|string',
            'user' => 'required|string',
            'Telefono' => 'required|string|max:10|min:10',
            'Correo' => 'required|email',
            'coupon' => 'required|string'
        ];

        $Mensaje = ["required" => 'El :attribute es requerido'];



        $datosUsuario = request()->except(['_token', '_method']);
        Usuario::where('id', '=', $id)->update($datosUsuario);


        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Usuario::destroy($id);
        return redirect('usuarios');
    }
}

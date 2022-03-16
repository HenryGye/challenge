<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $usuarios = Usuario::all()->toArray();
            if ($usuarios)
                return $usuarios;
            else
                return response()->json(['mensaje' => 'No existen usuarios']);
        } catch (\Exception $e) {
            return $this->returnMensajeException($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $usuario = Usuario::where('id', $id)->get()->toArray();
            if ($usuario)
                return $usuario;
            else
                return response()->json(['mensaje' => 'No existe usuario con id ' . $id]);
        } catch (\Exception $e) {
            return $this->returnMensajeException($e);
        }
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

    public function returnMensajeException($e) {
        return response()->json([
            'error' => $e->getCode(),
            'mensaje' => 'Ha ocurrido un error. Intente nuevamente.'
        ]);
    }
}

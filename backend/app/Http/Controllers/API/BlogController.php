<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $blogs = Blog::all()->toArray();
            if ($blogs)
                return $blogs;
            else
                return response()->json(['mensaje' => 'No existen blogs']);
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
            $blogs= Blog::where('id', $id)->get();        
            if ($blogs->toArray()) {
                $blog = collect($blogs)->map(function ($blog) {            
                    return [
                        'autor' => $blog->usuario->nombre,
                        'direccion' => $blog->usuario->direccion,
                        'correo' => $blog->usuario->correo,
                        'titulo' => $blog->titulo,
                        'descripcion' => $blog->descripcion,                
                        'fecha_publicacion' => $blog->fecha_publicacion
                    ];            
                });
                return $blog;
            } else {
                return response()->json(['mensaje' => 'No existe blog con id ' . $id]);
            }
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

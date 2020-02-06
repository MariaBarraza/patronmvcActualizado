<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Noticia;

class NoticiaController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        $argumentos = array();
        $argumentos['noticias'] = $noticias;
        return view('admin.noticias.index',
            $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia->titulo = $request->input('txtTitulo');
        $noticia->cuerpo = $request->input('txtCuerpo');
        if($noticia->save())
        {
            return redirect()->route('noticias.index')->with('exito','La noticia fue guardada correctamente');
        }
        return redirect()->route('noticias.index')->with('error','No se pudo agregar la noticia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
        if($noticia)
        {
            $argumentos = array();
            $argumentos['noticia'] = $noticia;
            return view('admin.noticias.show',$argumentos);
        }else
        {
            return redirect()->route('noticias.index')->with('error','No se encontró la noticia');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        if($noticia)
        {
            $argumentos = array();
            $argumentos['noticia'] = $noticia;
            return view('admin.noticias.edit',$argumentos);
        }else
        {
            return redirect()->route('noticias.index')->with('error','No se encontró la noticia');
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
        $noticia = Noticia::find($id);
        if($noticia)
        {
            $noticia->titulo = $request->input('txtTitulo');
            $noticia->cuerpo = $request->input('txtCuerpo');
            if($noticia->save())
            {
                return redirect()->route('noticias.edit',$id)->with('exito','La noticia se actualizó exitosamente');
            }else
            return redirect()->route('noticias.edit',$id)->with('error','No se pudo actualizar la noticia');
        }else
        return redirect()->route('noticias.index',$id)->with('error','No se encontro la noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        if($noticia)
        {
            if($noticia->delete())
            {
                return redirect()->route('noticias.index')->with('exito','Noticia eliminada exitosamente');
            }else
            {
                return redirect()->route('noticias.index')->with('error','No se pudo eliminar noticia');
            }
        }else
        {
            return redirect()->route('noticias.index')->with('error','No se pudo encontrar la noticia');
        }
    }
}

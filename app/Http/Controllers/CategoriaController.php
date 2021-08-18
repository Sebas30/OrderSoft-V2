<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Referenciamos que nos págine 5 productos
        $categorias = Categoria::paginate(6);

        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.crear');
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
        $request->validate([
            'NombreCategoria' => 'required', 
            'imagen' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1024'
            
        ]);
        
        $categoria = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'images/';
            $imagenCategoria = date('ymdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCategoria);
            $categoria['imagen'] = "$imagenCategoria";
        }
        
        Categoria::create($categoria);
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
        return view ('categorias.editar', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
         //
         $request->validate([
            'NombreCategoria' => 'required'
        ]);

        $cat = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'images/';
            $imagenCat = date('ymdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCat);
            $cat['imagen'] = "$imagenCat";
        }
        
         $categoria->update($cat);
         return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}

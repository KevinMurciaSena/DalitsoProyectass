<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categoria = Categoria::all();
        $producto = Producto::where('categoria_id', '=', $categoria); 

        if($request)
        {
            $consulta = Categoria::with('productos')->get();
            $categoria = Categoria::all();
            $query = $request->buscar;
            $productos = Producto::where('nombre', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombre', 'asc')->paginate(3); 


            return view('welcome', compact('productos', 'categoria', 'query'));
        }
        // Obtener todos los registros
        $productos = Producto::orderBy('nombre', 'asc')->paginate(3); 

        // Envíar a la vista
        $categoria = Categoria::all();
        return view('welcome',compact('categoria', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

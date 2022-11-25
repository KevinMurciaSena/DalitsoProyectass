<?php

namespace App\Http\Controllers;

use App\Models\Compra;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Recibo;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $id)
    {
       
        $productosT = Producto::findOrFail($id);
      
        
        // $categoria = Categoria::findOrFail($id);
        // $productos = Producto::findOrFail($id);
        // dd($productos);

        // return view("compras.index", compact("productos", "categoria"));
        $producto = Producto::join('categorias','productos.categoria_id', 'categorias.id')
                                        ->select('productos.id', 'productos.nombre', 
                                        'productos.descripcion', 'productos.unidades',
                                        'productos.precio', 'categorias.nombre as categoria',
                                        'productos.foto')
                                        ->where('productos.id', $id)
                                        ->first();

    


return view('compras.insert', compact('producto'));  
          
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productosT = Producto::findOrFail($id);
        $email = auth()->user()->email;
        $name = auth()->user()->name;
        $id_user = auth()->user()->id;

   
        
        // $categoria = Categoria::findOrFail($id);
        // $productos = Producto::findOrFail($id);
        // dd($productos);

        // return view("compras.index", compact("productos", "categoria"));
        $producto = Producto::join('categorias','productos.categoria_id', 'categorias.id')
                                        ->select('productos.id', 'productos.nombre', 
                                        'productos.descripcion', 'productos.unidades',
                                        'productos.precio', 'categorias.nombre as categoria',
                                        'productos.foto')
                                        ->where('productos.id', $id)
                                        ->first();

        return view('compras.index', compact('producto', 'productosT', "email", "name", "id_user"));  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}

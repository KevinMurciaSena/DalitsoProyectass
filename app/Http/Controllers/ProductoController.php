<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Gate;

class ProductoController extends Controller
{
    public function __construct()
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
        
        // Obtener todos los registros 
        $productos = Producto::all();

      
        if(Gate::denies('usuario'))
        {
            return view('productos.index', compact('productos'));
        }
         // enviar a la vista
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('productos.index');
        }
        //consultar categorias
        $categorias = Categoria::orderBy('nombre', 'asc')
                                ->get();
        //enviar a la vista
        return view('productos.insert', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProducto = $request->except('_token');
       
    

        if($request->hasFile('foto'))
        {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
           
        }
      
        Producto::insert($datosProducto);

        return redirect()->route('productos.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('productos.index');
        }
        $producto = Producto::join('categorias','productos.categoria_id', 'categorias.id')
                                        ->select('productos.id', 'productos.nombre', 
                                        'productos.descripcion', 'productos.unidades',
                                        'productos.precio', 'categorias.nombre as categoria',
                                        'productos.foto')
                                        ->where('productos.id', $id)
                                        ->first();
        return view('productos.show', compact('producto'));                                        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('productos.index');
        }
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::orderBy('nombre', 'asc')
                                ->get();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $datosProducto = $request->except('_token', '_method');
        if($request->hasFile('foto'))
        {
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $producto->where('id' , $id)->update($datosProducto);
        return redirect()->route('productos.index')->with('exito', '¡El registro se ha modificado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('productos.index');
        }
        $producto = Producto::findOrFail($id);
        if(Storage::delete('public/' . $producto->foto))
        {
            $producto->delete();
        }
        $producto->delete();
        return redirect()->route('productos.index');
    }
}

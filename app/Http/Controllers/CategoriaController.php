<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Gate;

class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = $request->buscar;
            $categorias = Categoria::where('nombre','LIKE','%'. $query. '%')
                                    ->orderBy('nombre', 'asc')
                                    ->paginate(5);
            
            return view('categorias.index', compact('categorias', 'query'));
        }
        // Obtener todos los registros 
        $categoria= Categoria::orderBy('nombre', 'asc')
                                ->paginate(5);
        // enviar a la vista
        return view('categorias.index','welcome', compact('categoria'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //solo lo puede hacer el admin del sistema
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('categorias.index');
        }
        return view('categorias.insert');
    }

    /**
     * Store a newly created resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request;
        $nombre = $request->nombre;

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $categorias = Categoria::all();
        $categoria = Categoria::findOrFail($id);
        $productos = Producto::where('categoria_id', $id)
                                        ->orderBy('nombre', 'asc')->paginate(15);
        
        // dd($productos);
        return view('categoriaUser.index', compact('categoria', 'productos', 'categorias'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('categorias.index');
        }
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        //Metodo 1
        // $categoria->nombre = $request->nombre;
        // $categoria->duracion = $request->duracion;
        // $categoria->save();
        
        //metodo 2
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            // este signfica abortar -- abort(403);
            return redirect()->route('categorias.index');
        }
        $categoria = Categoria::findOrFail($id);
        if($categoria->productos()->count()){
          return back()->with("Error", "Para que esta accion se ejecute, debe eliminar todos los productos asociados a esta categoria");
        }
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}

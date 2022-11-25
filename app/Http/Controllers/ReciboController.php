<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;

use App\Models\Carrito;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $id)
    {

    
        //
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
        $datosProductos = $request->except('_token');
        $UserId = auth()->user()->id;

       $carrito = Carrito::where('user_id', $UserId)
       ->get();
    
   
       if($request){
        $carrito->each->delete();
       }
               
       Recibo::insert($datosProductos);
        
        return redirect()->route('welcome.index')->with('exito', '◉ Gracias por su compra');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = User::all();

        $email = auth()->user()->email;
        $name = auth()->user()->name;
        $id_user = auth()->user()->id;

   

        $producto = Producto::join('categorias','productos.categoria_id', 'categorias.id')
        ->select('productos.id', 'productos.nombre', 
        'productos.descripcion', 'productos.unidades',
        'productos.precio', 'categorias.nombre as categoria',
        'productos.foto')
        ->where('productos.id', $id)
        ->first();
        

        return view('recibos.index', compact('producto', 'email', 'name', "id_user"));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function edit(Recibo $recibo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recibo $recibo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recibo $recibo)
    {
        //
    }
}

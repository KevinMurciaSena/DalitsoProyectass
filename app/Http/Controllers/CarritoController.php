<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Carrito $id)

    { 
           $usuarios = User::all();

        $name = auth()->user()->name;
        $UserId = auth()->user()->id;
        $email = auth()->user()->email;

        $producto = Producto::all();
 
        $carrito = Carrito::where('user_id', $UserId)
        ->get();


        //

       
        return view('carritos.index', compact('carrito', 'producto', 'name', 'UserId', 'email'));

    
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
        Carrito::insert($datosProductos);

        return redirect()->route('welcome.index')->with('exito', '◉ Se ha añadido al carrito');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      
        $producto = Carrito::findOrFail($id);

   
        
        $producto->delete();

        return redirect()->route('carritos.index');
        //
    }
}

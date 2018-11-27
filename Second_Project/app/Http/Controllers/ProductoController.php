<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::select("SELECT p.*,ca.categoria AS categoria FROM productos AS p INNER JOIN categorias AS ca ON ca.id=p.id_categoria WHERE ca.id=p.id_categoria");;
        return view("productos",compact("productos"));
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
        $image = $request->file('img');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $name);

        $producto = new Producto();

        $producto->id_producto = $request->input("sku");
        $producto->nombre = $request->input("producto");
        $producto->descripcion = $request->input("des");
        $producto->img = $name;
        $producto->id_categoria = $request->input("categoria");
        $producto->stock = $request->input("stock");
        $producto->precio = $request->input("precio");
        $producto->save();
        return redirect("producto");
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
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view("modifyproduct",compact("producto"));
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
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->save();

        return redirect("/producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        
        return redirect("producto");
    }
}

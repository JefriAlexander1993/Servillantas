<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use App\Sales_products;
use App\Product;
use Auth;
use DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Sales.index', ['sales0'=>Sale::orderBy('id','desc')->paginate('8')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();           // Obtiene el id del usuario que se encuentra interactuando con el sistema
        $totalSale=$request->totalSale;
        $sale = new Sale;       // Se crea un nuevo objeto tipo venta
        $sale->totalsale=$totalSale;
        $sale->user_id=$id;
        $sale->save();    // Se almacenan los datos

     
        $idV= DB::table('sales')->max('id');
        
            for($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta
             
                $sale_product= new Sales_products;     
                
                $sale_product->quantity=$request->quantity[$x];
                $sale_product->price=$request->price[$x];
                $sale_product->total=$request->total[$x];
                $sale_product->sale_id= $sale->id;


                $product =Product::where('code','=',$request->code[$x])->first() ;
                $sale_product->product_id=$product->id;
                $sale_product->save();
                                                    }
        return redirect()->route('Sales.index')     // Redirige a la ruta venta.index (venta/index)
                ->with('info', 'La venta fue guardada.');                                             

   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

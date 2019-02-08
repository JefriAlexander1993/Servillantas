<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\Sales_products;
use App\Service;
use Auth;
use DB;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Sales.index', ['sales0' => Sale::orderBy('id', 'desc')->paginate('8'), 'totalSales' => DB::table('sales')->select('totalsale')->sum('totalsale')]);

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
        $id              = Auth::id(); // Obtiene el id del usuario que se encuentra interactuando con el sistema
        $totalSale       = $request->totalSale;
        $sale            = new Sale; // Se crea un nuevo objeto tipo venta
        $sale->totalsale = $totalSale;
        $sale->user_id   = $id;
        $sale->save(); // Se almacenan los datos
        if (($request->cantidadarticulos != 0) or ($request->quantityService != 0)) {

            $idV = DB::table('sales')->max('id');

            for ($x = 0; $x < $request->cantidadarticulos; $x++) {
                // Ciclo el cual almacena todos los articulos entrantes en la venta

                $sale_product = new Sales_products;

                $sale_product->quantity = $request->quantity[$x];
                $sale_product->price_u  = $request->price[$x];
                $sale_product->total    = $request->totalProduct[$x];
                $sale_product->sale_id  = $sale->id;

                $product                  = Product::where('code', '=', $request->codeProduct[$x])->first();
                $sale_product->product_id = $product->id;
                $sale_product->save();
            }

            for ($x = 0; $x < $request->quantityService; $x++) {
                // Ciclo el cual almacena todos los servicios entrantes en la venta

                $sale_service           = new Sales_products;
                $sale_service->quantity = $request->quantityS[$x];
                $sale_service->price_u  = $request->priceService[$x];
                $sale_service->total    = $request->totalService[$x];
                $sale_service->sale_id  = $sale->id;

                $service                  = Service::where('code', '=', $request->codeService[$x])->first();
                $sale_service->service_id = $service->id;
                $sale_service->save();
            }

            return redirect()->route('Sales.index') // Redirige a la ruta venta.index (venta/index)
                ->with('info', 'La venta fue guardada.');

        }
        return redirect()->route('Sales.create') // Redirige a la ruta venta.index (venta/index)
            ->with('danger', 'No se puede guardar la venta, no se agragado nada a ella.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$sale = Sale::find($id);

        $detalles = DB::table('sales_products')
            ->join('products', 'products.id', '=', 'sales_products.product_id')
            ->select('sales_products.*', 'products.name', 'products.body')->where('sales_products.sale_id', '=', $id)
            ->orderBy('created_at', 'desc')->paginate('2');

        $detallesServicios = DB::table('sales_products')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->select('sales_products.*', 'services.name', 'services.body')->where('sales_products.sale_id', '=', $id)
            ->orderBy('created_at', 'desc')->paginate('2');

        return view('Sales.show', compact('detalles', 'detallesServicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        // $detalles = DB::table('sales_products')->
        //     join('products', 'products.id', '=', 'sales_products.product_id')
        //     ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
        //     ->select('sales.id', 'products.code', 'products.name', 'products.price', 'sales_products.quantity', 'sales_products.price_u', 'sales_products.total', 'sales.totalsale')->where('sales_products.sale_id', '=', $sale->id)->get()->toJson();

        return view('Sales.edit', compact('sale'));

    }

    public function indexSale()
    {

    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Sale  $sale
 * @return \Illuminate\Http\Response
 */public function update(Request $request, $id)
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
        $sale = Sale::find($id)->delete();
        return back()->with('danger', 'La venta fue eliminada exitosamente.');
    }
}

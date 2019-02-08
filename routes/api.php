<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('Sales/{sale}/edit/detalle', function () {
//     $sale    = App\Sale::findOrFail($id);
//     $detalle = App\Sales_products::
//         join('products', 'products.id', '=', 'sales_products.product_id')
//         ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
//         ->select('products.code', 'products.name', 'products.price', 'sales_products.quantity', 'sales_products.price_u', 'sales_products.total', 'sales.totalsale')->where('sales_products.sale_id', '=', $sale->id)->get()->toJson();

//     return $detalle;

// });
// Route::get('Sales/detalle', function () {

//     return datatables()->query(DB::table('sales_products')->
//             join('products', 'products.id', '=', 'sales_products.product_id')
//             ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
//             ->select('sales.id', 'products.code', 'products.name', 'products.price', 'sales_products.quantity', 'sales_products.price_u', 'sales_products.total', 'sales.totalsale')->where('sales_products.sale_id', '=', '1'))->toJson();

// });

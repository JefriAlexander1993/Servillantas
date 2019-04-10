<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\Sales_products;
use App\Service;
use Auth;
use DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request)
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
         $products = Product::pluck('name','code'); 
         $services = Service::pluck('names','codes'); 
            return view('Sales.create',compact('products','services'));
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

        if ($request->cantidadarticulos >0 or $request->quantityService >0) {
            
            for ($x = 0; $x < $request->cantidadarticulos; $x++) {
                // Ciclo el cual almacena todos los articulos entrantes en la venta

                $sale_product = new Sales_products;

                $sale_product->quantity = $request->quantity[$x];
                $sale_product->price_u  = $request->price[$x];
                $sale_product->total    = $request->totalProduct[$x];
                $sale_product->sale_id  = $sale->id;

                $product                  = Product::where('code', '=', $request->code[$x])->first();
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

                $service                  = Service::where('codes', '=', $request->codes[$x])->first();
                $sale_service->service_id = $service->id;
                $sale_service->save();
                }
                  return redirect()->route('Sales.index') // Redirige a la ruta venta.index (venta/index)
            ->with('info', 'Se guardo la venta exitosamente');
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
        $sale = Sale::find($id);
       
        $detalles = DB::table('sales_products')
            ->join('products', 'products.id', '=', 'sales_products.product_id')
            ->select('sales_products.*', 'products.name', 'products.price')->where('sales_products.sale_id', '=', $sale->id)
            ->orderBy('created_at', 'desc')->paginate('2');

        $detallesServicios = DB::table('sales_products')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->select('sales_products.*', 'services.names', 'services.prices')->where('sales_products.sale_id',$sale->id)->orderBy('created_at', 'desc')->paginate('2');

        return view('Sales.show',compact('detalles', 'detallesServicios'));
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


/* Se agrego  */

    public function exportSalesProduct(Request $request)
    {
      if(($request->añoProduct != null) and ($request->mesProduct != null)and ($request->diaProduct !=null)) {
            $sales = Product::sqlSaleProductYearMonthDay($request->añoProduct,$request->mesProduct, $request->diaProduct);
            if (count($sales) === 0) {
                   return back()->with('danger', 'El año,mes,dia ingresado, no conside, con los registros de los meses de ventas registradas.');

            }else{
             $pdf = PDF::loadView('Reports.Sales.salesProductMonthYearDay', compact('sales'));
              return $pdf->download('salesProductService.pdf'); 
            }
        }elseif (($request->añoProduct != null) and ($request->mesProduct != null)) {

            $salesProducts = Product::sqlSaleProductYearMonth($request->añoProduct,$request->mesProduct);

          if(count($salesProducts) === 0) {
           return back()->with('danger', 'El año, mes ingresado, no conside, con los registros de los años, meses de productos registradas.');

          }else{

          $pdf = PDF::loadView('Reports.Sales.salesProductYearMonth', compact('salesProducts'));
              return $pdf->download('salesProductMonth.pdf');   
        }

          
        }elseif (($request->mesProduct != null)and ($request->diaProduct !=null)) {

           $salesProducts = Product::sqlSaleProductMonthDay($request->mesProduct,$request->diaProduct);

          if(count($salesProducts) === 0) {
           return back()->with('danger', 'El mes, dia ingresado, no conside, con los registros de los años, meses de productos registradas.');

          }else{

          $pdf = PDF::loadView('Reports.Sales.salesProductMonthDay', compact('salesProducts'));
              return $pdf->download('salesProductMonth.pdf');   
        }
          
        }elseif($request->añoProduct != null) {

        $salesProducts = Product::sqlSaleProductYear($request->añoProduct);


        if ($salesProducts != null) {
               $pdf = PDF::loadView('Reports.Sales.salesProductYear', compact('salesProducts'));
              return $pdf->download('salesProductYear.pdf');
  
        }else{
           return back()->with('danger', 'El año ingresado, no conside, con los registros de los años de ventas registradas.');
      
        }
        }elseif ($request->mesProduct != null) {
          $salesProducts =  Product::sqlSaleProductMonth($request->mesProduct);

         if(count($salesProducts) === 0) {
           return back()->with('danger', 'El mes ingresado, no conside, con los registros de los meses de ventas registradas.');

        }else{

          $pdf = PDF::loadView('Reports.Sales.salesProductMonth', compact('salesProducts'));
              return $pdf->download('salesProductMonth.pdf');   
        }
    }
    elseif($request->diaProduct != null) {

        $salesProducts = Product::sqlSaleProductDay($request->diaProduct);

        if (count($salesProducts) === 0) {
               
       return back()->with('danger', 'El dia ingresado, no conside, con los registros de los dias de ventas registradas.');
          

        }else{

               $pdf = PDF::loadView('Reports.Sales.salesProductDay', compact('salesProducts'));
                return $pdf->download('salesProductDay.pdf');    
        }

           return false;

        }
  }

  public function exportSalesService(Request $request)
    {

      if(($request->añoService != null) and ($request->mesService != null) and ($request->diaService != null)) {
            $salesServices = Service::sqlSaleServiceYearMonthDay($request->añoService, $request->mesService,$request->diaService);

        if (count($salesServices) === 0) {
           return back()->with('danger', 'El año,mes,dia ingresado, no conside, con los registros de los meses de ventas registradas.');

        }else{
    
            $pdf = PDF::loadView('Reports.Sales.salesServiceMonthYearDay', compact('salesServices'));
              return $pdf->download('salesProductService.pdf');
        }
          
      }elseif (($request->añoService != null) and ($request->mesService != null)) {
        $salesServices =Service::sqlSaleServiceYearMonth($request->añoService,$request->mesService);


          if (count($salesServices) === 0) {
           return back()->with('danger', 'El año, mes ingresado, no conside, con los registros de los meses de ventas registradas.');

        }else{
    
            $pdf = PDF::loadView('Reports.Sales.salesServiceYearMonth', compact('salesServices'));

              return $pdf->download('salesProductServiceYearMonth.pdf');
        }
        
      }
      elseif (($request->mesService != null) and ($request->diaService != null)) {

        $salesServices = Service::sqlSaleServiceMonthDay($request->mesService,$request->diaService);

          if (count($salesServices) === 0) {
           return back()->with('danger', 'El mes,dia ingresado, no conside, con los registros de los meses de ventas registradas.');

        }else{
    
            $pdf = PDF::loadView('Reports.Sales.salesServiceMonthDay', compact('salesServices'));
              return $pdf->download('salesServiceMonthDay.pdf');
        }

      
      }elseif($request->añoService != null) {    

        //  Si la venta solo tiene productos, servicios, busqueda por mes.  
        $salesServices = Service::sqlSaleServiceYear($request->añoService);

        if (count($salesServices) === 0) {
                  return back()->with('danger', 'El año ingresado, no conside, con los registros de los año de ventas registradas.');

          }else{
             $pdf = PDF::loadView('Reports.Sales.salesServiceYear', compact('salesServices'));
              return $pdf->download('salesServicesYear.pdf');
        
       }
      }elseif($request->mesService != null) {

      // Si la venta solo tiene servicios, busqueda por mes.  
        $salesServices= Service::sqlSaleServiceMonth($request->mesService); 
        
            
        if (count($salesServices) === 0) {
        
              return back()->with('danger', 'El mes ingresado, no conside, con los registros de los meses de ventas registradas.');

        }else{
            $pdf = PDF::loadView('Reports.Sales.salesServiceMonth', compact('salesServices'));

              return $pdf->download('salesServicesMonth.pdf');
              
        }

       }elseif($request->diaService != null) {

      // Si la venta solo tiene servicios, busqueda por mes.  
          $salesServices= Service::sqlSaleServiceDay($request->diaService);
       
          if (count($salesServices) === 0) {
                  return back()->with('danger', 'El dia ingresado, no conside, con los registros de los dias de ventas registradas.');
          }else{
     
          $pdf = PDF::loadView('Reports.Sales.salesServiceDay', compact('salesServices'));
              return $pdf->download('salesServicesDay.pdf');      
         }

       }
    return false;
}


public function exportSalesServiceProduct(Request $request)
{
      
    if (($request->añoPS != null) and ($request->mesPS != null) and ($request->diaPS != null)) {
        $salesProductService = Sales_products::sqlSaleProductService($request->añoPS, $request->mesPS, $request->diaPS);

            if (count($salesProductService) === 0) {
              
              return back()->with('danger', 'El año,mes,dia ingresado, no conside, con los registros de los meses de ventas registradas.');
        
            }else{

              $pdf = PDF::loadView('Reports.Sales.salesProductService', compact('salesProductService'));
              return $pdf->download('salesProductService.pdf');
            }

      }elseif (($request->añoPS != null) and ($request->mesPS != null)) {
        $salesProductService = Sales_products::sqlSaleProductServiceYearMonth($request->añoPS, $request->mesPS);
            
            if (count($salesProductService) === 0) {
              
              return back()->with('danger', 'El año,mes  ingresado, no conside, con los registros de los años, meses de ventas registradas.');
        
            }else{

              $pdf = PDF::loadView('Reports.Sales.salesProductServiceYearMonth', compact('salesProductService'));
              return $pdf->download('salesProductService.pdf');
            }          

      }elseif (($request->mesPS != null) and ($request->diaPS != null)) {
        $salesProductService = Sales_products::sqlSaleProductServiceMonthDay($request->mesPS, $request->diaPS);

             if (count($salesProductService) === 0) {
              
              return back()->with('danger', 'El mes,dia ingresado, no conside, con los registros de los meses,dias de ventas registradas.');
        
            }else{

              $pdf = PDF::loadView('Reports.Sales.salesProductServiceMonthDay', compact('salesProductService'));
              return $pdf->download('salesProductService.pdf');
            }

      }elseif($request->añoPS != null){

              $salesProductService = Sales_products::sqlSaleProductServiceYear($request->añoPS);

            if (count($salesProductService) === 0) {
                   return back()->with('danger', 'El año ingresado, no conside, con los registros de los años de ventas registradas.');
              
            }else{

               $pdf = PDF::loadView('Reports.Sales.salesProductServiceYear', compact('salesProductService'));
              return $pdf->download('salesProductServiceYear.pdf');
            }

      }elseif($request->mesPS  != null){

           $salesProductService  = Sales_products::sqlSaleProductServiceMonth($request->mesPS);

            
            if (count($salesProductService) === 0) {
               return back()->with('danger', 'El mes ingresado, no conside, con los registros de los meses de ventas registradas.');
             
            }else{

               $pdf = PDF::loadView('Reports.Sales.salesProductServiceMonth', compact('salesProductService'));
              return $pdf->download('salesProductServiceMonth.pdf');
            }   
      }elseif ($request->diaPS  != null) {
        
        $salesProductService = Sales_products::sqlSaleProductServiceDay($request->diaPS);

         if (count($salesProductService) === 0) {
                return back()->with('danger', 'El dia ingresado, no conside, con los registros de los dias de ventas registradas.');
           
            }else{

                  $pdf = PDF::loadView('Reports.Sales.salesProductServiceDay', compact('salesProductService'));
              return $pdf->download('salesProductServiceDay.pdf');
            } 
      
      }

      return false;
 
}
}

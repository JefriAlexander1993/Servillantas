<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class Sales_products extends Model
{
    protected $table = 'sales_products';

    protected $fillable = [
        'quantity', 'price_sale', 'total',
    ];


    // Se crea un metodo con tres parametros, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el año, mes, dia, de la venta, que solo incluyen productos, servicios.
    public static function sqlSaleProductService($productServiceYear, $productServiceMonth,$productServiceDay)
    {
      if (($productServiceYear != null) and ($productServiceMonth != null) and ($productServiceDay != null)){ 
          
          $salesProductService = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->whereYear('sales_products.created_at','=' ,$productServiceYear)
            ->whereMonth('sales_products.created_at','=' ,$productServiceMonth)
            ->whereDay('sales_products.created_at','=' ,$productServiceDay)
            ->select('sales_products.quantity','sales_products.created_at' , 'services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')
            ->orderBy('id','desc')
            ->get();
          

          return  $salesProductService;
        }
    }
    public static function sqlSaleProductServiceYear($productServiceYear)
    {
        if($productServiceYear) {
         
          $salesProductService = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->whereYear('sales_products.created_at','=' ,$productServiceYear)
            ->select('sales_products.quantity','sales_products.created_at', 'services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')
             ->orderBy('id','DESC')
            ->get(); 

          return $salesProductService;  

        }
    }
    public static function sqlSaleProductServiceMonth($productServiceMonth)
    {
        if($productServiceMonth) {
         
          $salesProductService = DB::table('sales_products')
             
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
           
            ->whereMonth('sales_products.created_at','=',$productServiceMonth)
            ->select('sales_products.quantity','sales_products.created_at', 'services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')
             ->orderBy('id','DESC')
            ->get(); 

          return $salesProductService;  

        }
    }
    public static function sqlSaleProductServiceDay($productServiceDay)
    {
        if($productServiceDay) {
         
          $salesProductService = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
            ->whereDay('sales_products.created_at','=',$productServiceDay)
            ->select('sales_products.quantity','sales_products.created_at','services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')->orderBy('id','DESC')->get(); 
           

          return $salesProductService;  

        }
    }
        public static function sqlSaleProductServiceYearMonth($productServiceYear,$productServiceMonth)
    {
        if(($productServiceYear != null) and ($productServiceMonth != null) ) {
         
          $salesProductService = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
            ->whereYear('sales_products.created_at','=',$productServiceYear)
            ->whereMonth('sales_products.created_at','=',$productServiceMonth)
            ->select('sales_products.quantity','sales_products.created_at','services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')->orderBy('id','DESC')->get(); 
           

          return $salesProductService;  

        }
    }
        public static function sqlSaleProductServiceMonthDay($productServiceMonth, $productServiceDay)
    {
        if(($productServiceMonth !=null)and ($productServiceDay != null )) {
         
          $salesProductService = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->leftJoin('products', 'products.id', '=', 'sales_products.product_id')
            ->leftJoin('services', 'services.id', '=', 'sales_products.service_id')
            ->whereMonth('sales_products.created_at','=',$productServiceMonth)
            ->whereDay('sales_products.created_at','=',$productServiceDay)
            ->select('sales_products.quantity','sales_products.created_at','services.names', 'services.prices', 'products.name', 'products.price','sales.id','sales.totalsale')->orderBy('id','DESC')->get(); 
           

          return $salesProductService;  

        }
    }


}

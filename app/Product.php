<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Product extends Model
{
    protected $table    = 'products';
    protected $fillable = [
        'name', 'code', 'price', 'body',
    ];

    public static function codeUnique($code)
    {
        //Verifica que el nuip sea unico en la base de datos, en caso de no ser unico devuelve falso (false)

        $codeU = Product::where('code', '=', $code)->count();
        if ($codeU == 0) {
            return true;
        } else {
            return false;
        }
    }
    // Se crea un metodo con tres parametros, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el año, mes, dia, de la venta, que solo incluyen productos.
    public static function sqlSaleProductYearMonthDay($añoProduct,$mesProduct,$diaProduct){
         if($añoProduct !=null and $mesProduct != null and $diaProduct != null){ 
            $sales = DB::table('sales_products')
                ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                ->join('products', 'products.id', '=', 'sales_products.product_id')
                ->whereYear('sales_products.created_at','=' ,$añoProduct)
                ->whereMonth('sales_products.created_at','=' ,$mesProduct)
                ->whereDay('sales_products.created_at','=', $diaProduct)
                ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
                 ->orderBy('id','DESC')
                ->get(); 
     
         return $sales;
           
        }else{
            return false;
        }
    }
// Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el  mes de la venta, que solo incluyen productos.
    public static function sqlSaleProductMonth($productMonth)
    {
        if($productMonth){
              $salesProducts = 
              DB::table('sales_products')
                ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                ->join('products', 'products.id', '=', 'sales_products.product_id')
                ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
                ->whereMonth('sales_products.created_at',$productMonth)
                 ->orderBy('id','DESC')
                ->get();

          return $salesProducts;
        }
    }
    // Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el año de la venta, que solo incluyen productos.
    public static function sqlSaleProductYear($productYear){

        if($productYear){   
            $salesProducts = 
              DB::table('sales_products')
              ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
              ->join('products', 'products.id', '=', 'sales_products.product_id')
              ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
              ->whereYear('sales_products.created_at',$productYear)
               ->orderBy('id','DESC')
              ->get();

          
         return $salesProducts;   
        }    
    }
    // Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el dia, de la venta, que solo incluyen productos.
    public static function sqlSaleProductDay($productDay){


       if($productDay){    
                $salesProducts = 
                  DB::table('sales_products')
                  ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                  ->join('products', 'products.id', '=', 'sales_products.product_id')
                  ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
                  ->whereDay('sales_products.created_at',$productDay)
                   ->orderBy('id','DESC')
                  ->get();

             return $salesProducts;   
            }    
    }
    // Se crea un metodo con dos parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el dia, de la venta, que solo incluyen productos.
    public static function sqlSaleProductYearMonth($productYear, $productMonth){

       if(($productYear != null)and($productMonth != null )){    
                $salesProducts = 
                  DB::table('sales_products')
                  ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                  ->join('products', 'products.id', '=', 'sales_products.product_id')
                  ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
                  ->whereYear('sales_products.created_at',$productYear) 
                  ->whereMonth('sales_products.created_at',$productMonth)
                   ->orderBy('id','DESC')
                  ->get();

             return $salesProducts;   
            }    
    }
        // Se crea un metodo con dos parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el dia, de la venta, que solo incluyen productos.
    public static function sqlSaleProductMonthDay($productMonth, $productDay){

       if(($productMonth != null)and($productDay != null )){    
                $salesProducts = 
                  DB::table('sales_products')
                  ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                  ->join('products', 'products.id', '=', 'sales_products.product_id')
                  ->select('sales_products.quantity','sales_products.created_at','products.name', 'products.price','sales.id')
                  ->whereMonth('sales_products.created_at',$productMonth) 
                  ->whereDay('sales_products.created_at',$productDay)
                  ->orderBy('id','DESC')
                  ->get();

             return $salesProducts;   
            }    
    }
}

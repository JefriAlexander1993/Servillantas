<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;



class Service extends Model
{

    protected $table    = 'services';
    //Cambio, se le agrego la s.
    protected $fillable = [
        'names', 'codes', 'prices', 'bodys',
    ];

    public static function codeUnique($code)
    {
        //Verifica que el code que sea unico en la base de datos, hace un conteo si es 0 es true se puede ejecutar la función en el controlador de lo contrario falso (false), ya existe.

        $codeU = Service::where('codes', '=', $code)->count();
        if ($codeU == 0) {
            return true;
        } else {
            return false;
        }
    }


    //----------------------------------METODOS----------------------------------------

    // Se crea un metodo con tres parametros, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el año, mes, dia, de la venta, que solo incluyen servicios.
    public static function sqlSaleServiceYearMonthDay($serviceYear, $serviceMonth, $serviceDay)
    {
        if ($serviceYear != null and $serviceMonth != null and $serviceDay != null) {
            
            $sales =    DB::table('sales_products')
                ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
                ->join('services', 'services.id', '=', 'sales_products.service_id')
                ->whereYear('sales_products.created_at','=' ,$serviceYear)
                ->whereMonth('sales_products.created_at','=' ,$serviceMonth)
                ->whereDay('sales_products.created_at','=' ,$serviceDay)
                ->select('sales_products.quantity','sales_products.created_at','services.names', 'services.prices','sales.id')
                ->orderBy('id','DESC')
                ->get(); 

            return $sales;

        }
    }
    // Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el mes de la venta, que solo incluyen servicios.
    public static function sqlSaleServiceMonth($serviceMonth)
    {
        if ($serviceMonth) {
            
        $salesServices = 
            DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->select('sales_products.quantity','sales_products.created_at' ,'services.names', 'services.prices','sales.id')
            ->whereMonth('sales_products.created_at',$serviceMonth)
            ->orderBy('id','DESC')
            ->get();     

            return $salesServices;

        }
    }
    // Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta el año de la venta, que solo incluyen servicios.
    public static function sqlSaleServiceYear($serviceYear)
    {
        if ($serviceYear) {
            
          $salesServices = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->whereYear('sales_products.created_at','=' ,$serviceYear)
            ->select('sales_products.quantity','sales_products.created_at','services.names', 'services.prices','sales.id')
             ->orderBy('id','DESC')
            ->get(); 

            return $salesServices;

        }
    }
    // Se crea un metodo con un parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta  dia, de la venta, que solo incluyen servicios.
    public static function sqlSaleServiceDay($serviceDay)
    {
        if ($serviceDay) {
            
          $salesServices = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->whereDay('sales_products.created_at','=' ,$serviceDay)
            ->select('sales_products.quantity','sales_products.created_at', 'services.names', 'services.prices', 'sales.id')
             ->orderBy('id','DESC')
            ->get(); 
           
            
                     
                return $salesServices;   
         

        }
    }
       // Se crea un metodo con dos parametro, obligatorio, donde se hara un consulta a la base datos teniendo en cuenta  dia, de la venta, que solo incluyen servicios.
    public static function sqlSaleServiceMonthDay($serviceMonth,$serviceDay)
    {
        if (($serviceMonth != null) and ($serviceDay != null)) {
            
          $salesServices = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->whereMonth('sales_products.created_at','=' ,$serviceMonth)
            ->whereDay('sales_products.created_at','=' ,$serviceDay)
            ->select('sales_products.quantity','sales_products.created_at', 'services.names', 'services.prices', 'sales.id')
             ->orderBy('id','DESC')
            ->get(); 
              
                return $salesServices;   
            
        }
    } 
        public static function sqlSaleServiceYearMonth($serviceYear,$serviceMonth)
    {
        if (($serviceYear != null) and ($serviceMonth != null)) {
            
          $salesServices = DB::table('sales_products')
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('services', 'services.id', '=', 'sales_products.service_id')
            ->whereYear('sales_products.created_at','=' ,$serviceYear)
            ->whereMonth('sales_products.created_at','=' ,$serviceMonth)
            ->select('sales_products.quantity','sales_products.created_at', 'services.names', 'services.prices', 'sales.id')
             ->orderBy('id','DESC')
            ->get(); 
           
              
                return $salesServices;   
          
        }
    }    
}    

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}

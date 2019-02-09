<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table    = 'services';
    protected $fillable = [
        'name', 'code', 'price', 'body',
    ];

    public static function codeUnique($code)
    {
        //Verifica que el code que sea unico en la base de datos, hace un conteo si es 0 es true se puede ejecutar la función en el controlador de lo contrario falso (false), ya existe.

        $codeU = Service::where('code', '=', $code)->count();
        if ($codeU == 0) {
            return true;
        } else {
            return false;
        }
    }

}

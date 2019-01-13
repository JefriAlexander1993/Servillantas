<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	   protected $table = 'appointments';

       protected $fillable = [
        'license_plate','title','color', 'date_end',
    ];

 //    protected $dates = [
 //      'date_star', 'date_end',   
   

   // ];
   
  //   protected $dateFormat = 'U';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	   protected $table = 'appointments';

       protected $fillable = [
        'license_plate','title','color', 'hour_end','description','date'
    ];

 //    protected $dates = [
 //      'date_star', 'date_end',   
   

   // ];
   
  //   protected $dateFormat = 'U';


    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function scopeLincense($query,$license)
    {
      if($license)

        return $query->where('license_plate','LIKE',"%$license%");
      
    }
    
    public function scopeTitle($query,$title)
    {
        if($title)
         return $query->where('title','LIKE',"%$title%");
    }
  }


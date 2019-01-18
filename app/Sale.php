<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
       'totalsale', 'id'
    ];

		public function service()
		{
		    return $this->hasMany(Service::class);
		}
			public function product()
		{
		    return $this->hasMany(Product::class);
		}

}

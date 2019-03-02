<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    

    protected $table = 'vehicles';

    protected $fillable = [
        'license_plate','line','model','brand','mileage','user_id'];
}
        
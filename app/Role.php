<?php 
namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

	protected $table = 'roles';
     	
    protected $fillable = [
        'name','display_name','description','created_at'
    ];

    public function scopeName($query,$name)
    {
      if($name)

        return $query->where('name','LIKE',"%$name%");
      
    }
    
        public function scopeDescription($query,$description)
    {
        if($description)
         return $query->where('description','LIKE',"%$description%");
    }
}
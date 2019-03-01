<?php 


namespace App;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

  
    protected $table = 'permissions';

    protected $fillable = [
        'id','namep','display_name','description','created_at'
    ];


    public function scopeName($query,$namep)
    {
      if($namep)
      	 return $query->where('name','LIKE',"%$namep%");
      	
     
    }
    
        public function scopeDescription($query,$descriptionp)
    {
        if($descriptionp)
         return $query->where('description','LIKE',"%$descriptionp%");
    

    }
}

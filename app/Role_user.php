<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    protected $table = 'role_user';

    protected $fillable = [
          'user_id','role_id',
        ];
        public function user() {
              return $this->belongsToMany('App\User');
        }
        
    public function scopeName($query,$name)
    {
      if($name)
      return $query->where('name_user','LIKE',"%$name%");
    }
    public function scopeEMail($query,$emai)
    {
        if($email)
         return $query->where('email','LIKE',"%$email%");
    }
}

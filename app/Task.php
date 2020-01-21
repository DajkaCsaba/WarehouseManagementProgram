<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

     protected $fillable = [
          'name',
          'task',
          'deadline',
          'user_id',
     ];
     
     public function user(){
        return $this->belongsToMany('App\User');
   }
}

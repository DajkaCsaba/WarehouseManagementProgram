<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 protected $fillable = [
      'name',
      'category',
      'count',
      'unit',
      'tax',
      'netto',
      'description',
      'user_id',
 ];
 public function user(){
    return $this->belongsToMany('App\User');
 }
}

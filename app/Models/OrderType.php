<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
  protected $table = 'order_type';
  protected $fillable = [
      'name', 'price', 'created_at', 'updated_at'
  ];

  public function term(){
    return $this->hasMany('App\Models\Term');
  }

  public function order(){
    return $this->hasMany('App\Models\Order');
  }
}

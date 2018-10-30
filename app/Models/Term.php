<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
  protected $fillable = [
      'terms', 'order_type_id', 'created_at', 'updated_at'
  ];

  public function orderType(){
    return $this->belongsTo('App\Models\OrderType','order_type_id');
  }
}

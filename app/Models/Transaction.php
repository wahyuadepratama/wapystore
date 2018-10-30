<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
      'designer_id', 'order_id', 'total', 'status', 'total_discount', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','designer_id');
  }

  public function order(){
    return $this->belongsTo('App\Models\Order','order_id');
  }
}

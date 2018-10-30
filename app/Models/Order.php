<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
      'client_id', 'name', 'price', 'status', 'project', 'size_long', 'size_wide', 'content', 'theme',
      'file', 'note', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','client_id');
  }

  public function orderType(){
    return $this->belongsTo('App\Models\OrderType','order_type_id');
  }

  public function transaction(){
    return $this->hasMany('App\Models\Transaction');
  }
}

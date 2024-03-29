<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
      'designer_id', 'order_id', 'total', 'status', 'total_discount', 'created_at', 'updated_at'
  ];

  public function getCreatedAtAttribute()
  {
      return \Carbon\Carbon::parse($this->attributes['created_at'])
         ->format('d, M Y H:i');
  }

  public function getUpdatedAtAttribute()
  {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }

  public function user(){
    return $this->belongsTo('App\Models\User','designer_id');
  }

  public function order(){
    return $this->belongsTo('App\Models\Order','order_id');
  }
}

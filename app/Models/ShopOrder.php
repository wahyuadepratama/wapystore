<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
  protected $fillable = [
    'id', 'stock_id', 'email', 'name', 'size', 'city', 'address', 'phone', 'postal', 'note', 'status', 'created_at', 'updated_at'
  ];

  public function stock(){
    return $this->belongsTo('App\Models\Stock','stock_id');
  }

  public function getCreatedAtAttribute()
  {
      return \Carbon\Carbon::parse($this->attributes['created_at'])
         ->format('d, M Y H:i');
  }

  public function getUpdatedAtAttribute()
  {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }
}

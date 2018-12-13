<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = [
    'id', 'name', 'brand', 'price', 'size', 'weight', 'description', 'file', 'id_category', 'material', 'color', 'created_at', 'updated_at'
  ];

  public function categoryStock(){
    return $this->belongsTo('App\Models\CategoryStock','id_category');
  }

  public function shopOrder(){
    return $this->hasMany('App\Models\ShopOrder');
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

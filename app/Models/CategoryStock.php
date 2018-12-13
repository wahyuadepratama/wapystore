<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryStock extends Model
{
  protected $fillable = [
    'id', 'name', 'created_at', 'updated_at'
  ];

  public function stock(){
    return $this->hasMany('App\Models\Stock');
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

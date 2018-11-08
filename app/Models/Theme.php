<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
  protected $fillable = [
      'name', 'description', 'created_at', 'updated_at'
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

  public function themePhoto(){
    return $this->hasMany('App\Models\ThemePhoto');
  }
}

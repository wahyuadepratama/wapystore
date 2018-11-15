<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $table = 'photo';
  protected $fillable = [
      'id', 'name', 'path', 'created_at', 'updated_at'
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

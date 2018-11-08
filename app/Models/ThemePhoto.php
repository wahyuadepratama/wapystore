<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemePhoto extends Model
{
  protected $table = 'photo_themes';
  protected $fillable = [
      'name','path', 'theme_id', 'created_at', 'updated_at'
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

  public function theme(){
    return $this->belongsTo('App\Models\Theme', 'theme_id');
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mailist extends Model
{
  protected $table = "mailist";
  protected $fillable = [
      'email', 'last_promote','created_at', 'updated_at'
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
}

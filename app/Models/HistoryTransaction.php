<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaction extends Model
{
  protected $fillable = [
      'user_id', 'debit', 'kredit', 'keterangan', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','user_id');
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

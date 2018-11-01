<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
  protected $fillable = [
      'client_id', 'name', 'price', 'status', 'project', 'size_long', 'size_wide', 'content', 'theme',
      'file', 'note', 'created_at', 'updated_at', 'revision', 'discount_status'
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
    return $this->belongsTo('App\Models\User','client_id');
  }

  public function transaction(){
    return $this->hasMany('App\Models\Transaction');
  }
}

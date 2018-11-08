<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $fillable = [
        'name', 'discount', 'created_at', 'updated_at', 'product'
    ];

    public function user(){
      return $this->hasMany('App\Models\User');
    }
}

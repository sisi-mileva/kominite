<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = array('name', 'description', 'image', 'code', 'opt_keys', 'opt_description');

  public function priceGroups(){
    return $this->hasMany('App\PriceGroup');
  }
}

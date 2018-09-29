<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceGroup extends Model
{
  protected $fillable = array('product_id', 'image1', 'image2', 'price_table');

  public function product(){
    return $this->belongsTo('App\Product');
  }
}

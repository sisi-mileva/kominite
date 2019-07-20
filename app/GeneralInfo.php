<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
  protected $fillable = array('type', 'page_content');
}

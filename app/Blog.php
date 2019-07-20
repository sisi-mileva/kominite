<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = array('title', 'created_at', 'short_description', 'description', 'image', 'is_ready');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{

  //boutique apartient a un seul user
public function user()
{
  return $this->belongsTo('App\User');
}



public function articles()
{
  return $this->hasMany('App\Article');
}


}

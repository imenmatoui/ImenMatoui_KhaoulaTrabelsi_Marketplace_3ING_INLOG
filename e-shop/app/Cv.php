<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{

//cv apartient a un seul user
public function user()
{
  return $this->belongsTo('App\User');
}


}

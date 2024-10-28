<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactus extends Model
{
  use SoftDeletes;
  protected $table = 'contactus';
  protected $fillable = ['name','email','subject','message'];

}

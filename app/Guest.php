<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'city', 'theyre_new'];

}

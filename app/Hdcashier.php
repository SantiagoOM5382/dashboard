<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hdcashier extends Model
{
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'city', 'business', 'theyre_new'];
}

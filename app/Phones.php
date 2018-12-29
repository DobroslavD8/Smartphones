<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phones';
    public $primaryKey = 'id';
    public $timestamps = true;
}
Phones::all();
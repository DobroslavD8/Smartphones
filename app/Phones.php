<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phone';
    public $primaryKey = 'id';
    public $timestamps = true;
}
Phones::all();
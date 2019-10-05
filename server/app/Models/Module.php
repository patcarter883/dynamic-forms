<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Module extends Model
{
    protected $primaryKey = '_id';
    public $incrementing = false;
}

<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [
        '_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

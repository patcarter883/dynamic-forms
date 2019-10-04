<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Record extends Model
{
    use \App\Traits\BindsDynamically;

    protected $guarded = [
        '_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

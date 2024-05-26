<?php

namespace App\Models;

use App\Support\ORM\BaseSimpleModel;

class Course extends BaseSimpleModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
    ];
}

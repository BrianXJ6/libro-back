<?php

namespace App\Models;

use App\Enums\StudentSexEnum;
use App\Support\ORM\BaseSimpleModel;

class Student extends BaseSimpleModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'birth',
        'sex',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sex' => StudentSexEnum::class,
        ];
    }
}

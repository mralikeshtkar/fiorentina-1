<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;

class Ad extends BaseModel
{
    protected $table = 'ads';


    protected $fillable = [
        'name',
        'type',
        'image',
        'tag',
        'link',
        'position_id',
        'starts_at',
        'expires_at',
        ];

    protected $casts = [
        'status' => 'bool',
    ];
}

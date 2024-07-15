<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;

class AdPosition extends BaseModel
{
    protected $table = 'adPosition';


    protected $fillable = [
        'name',
        'QuerySelector'
    ];

}

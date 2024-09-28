<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Storage;

class Video extends BaseModel
{


    // Define the table name (optional if the model name matches the table name)
    protected $table = 'videos';

    // Define which fields are mass assignable
    protected $fillable = [
        'title',
        'video_path',
        'status',
    ];

    /**
     * Optional: Add any custom methods or relationships here.
     * Example: You can define relationships if the video is associated with other models (e.g., User or Category)
     */

}


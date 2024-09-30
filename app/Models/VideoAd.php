<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VideoAd extends Model
{
    protected $table = 'video_ads';

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

}

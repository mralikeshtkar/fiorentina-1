<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
class Vote extends BaseModel
{
    protected $table = 'votes';

    protected $fillable = [
        'title',
        'type',
        'image',
        'group',
        'starts_at',
        'expires_at',
        'width',
        'height',
    ];
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function getImageUrl($playername){

        $playerImage=Player::where('name',$playername)->get();
        dd($playerImage);
        return $playerImage->image;

    }
    protected $casts = [
        'status' => 'bool',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];


}


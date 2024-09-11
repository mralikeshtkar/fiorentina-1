<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
class Vote extends BaseModel
{
    protected $table = 'players';

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
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
    public function calendario()
    {
        return $this->belongsTo(Calendario::class, 'match_id', 'id');
    }
    public function getImageUrl($playername){

        $playerImage=Player::where('name',$playername)->first();
        return $playerImage->image;

    }
    protected $casts = [
        'status' => 'bool',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];


}


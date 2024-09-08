<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerVotes extends Model
{
    protected $table = 'player_votes';

    protected $fillable = [
        'match_id', 'player_id', 'user_id', 'vote'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }
}

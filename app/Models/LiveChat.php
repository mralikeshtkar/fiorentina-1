<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveChat extends Model
{
    protected $fillable = ['match_id', 'chat_status'];

    // Relationship with Match
    public function match()
    {
        return $this->belongsTo(Calendario::class);
    }

    // Check if the chat is live
    public function isLive()
    {
        return $this->chat_status === 'live';
    }

    // Check if the chat is finished
    public function isFinished()
    {
        return $this->chat_status === 'finished';
    }
}

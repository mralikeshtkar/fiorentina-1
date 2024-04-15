<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id', 'venue', 'matchday', 'stage', 'group', 'match_date', 
        'status', 'home_team', 'away_team', 'score', 'goals', 'penalties', 
        'bookings', 'substitutions', 'odds', 'referees'
    ];

    protected $casts = [
        'home_team' => 'array',
        'away_team' => 'array',
        'score' => 'array',
        'goals' => 'array',
        'penalties' => 'array',
        'bookings' => 'array',
        'substitutions' => 'array',
        'odds' => 'array',
        'referees' => 'array'
    ];
}

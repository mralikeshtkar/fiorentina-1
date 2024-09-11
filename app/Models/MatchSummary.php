<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchSummary extends Model
{
    protected $table = 'match_summaries';

    protected $fillable = [
        'match_id', 'stage_name', 'incident_id', 'incident_team', 'incident_time',
        'incident_type', 'incident_participants',
        'result_home', 'result_away',
    ];

    protected $casts = [
        'incident_participants' => 'json',  // Casting to handle JSON participants
    ];

    public $timestamps = true;
}

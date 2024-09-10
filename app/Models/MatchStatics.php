<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchStatistics extends Model
{
    protected $table = 'match_statistics';

    protected $fillable = [
        'match_id',
        'stage_name',
        'group_label',
        'incident_name',
        'value_home',
        'value_away'
    ];
}

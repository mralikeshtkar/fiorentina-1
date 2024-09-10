<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchCommentary extends Model
{
    // Define the table name (optional if the table follows Laravel's naming convention)
    protected $table = 'match_commentaries';

    // Specify the fillable fields (these fields can be mass-assigned)
    protected $fillable = [
        'match_id',
        'comment_time',
        'comment_class',
        'comment_text',
        'is_important',
        'is_bold',
    ];

    // Optionally, if you want to cast any fields (e.g., boolean for 'is_important')
    protected $casts = [
        'is_important' => 'boolean',
    ];

    // If you're not using the default timestamps columns
    public $timestamps = true;
}
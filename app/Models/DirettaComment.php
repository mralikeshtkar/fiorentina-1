<?php
class DirettaComment extends Model
{
    use HasFactory;

    const EVENT_TYPES = [
        'info', 'goal', 'yellow_card', 'red_card', 'goal_kick', 'penalty', 
        'corner', 'freekick', 'foul', 'kick_off', 'substitution_in', 
        'substitution_out'
    ];

    protected $fillable = [
        'diretta_id', 'event_type', 'comment', 'details'
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function diretta()
    {
        return $this->belongsTo(Calendario::class);
    }

    // Model details...
}

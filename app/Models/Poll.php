<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'active'];

    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}

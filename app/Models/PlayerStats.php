<?php

 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Model;

 class PlayerStats extends Model
 {
     protected $fillable = ['match_id', 'player_id', 'stats', 'rating'];
 
     // You may want to cast 'stats' to JSON
     protected $casts = [
         'stats' => 'json',
     ];
 }
 
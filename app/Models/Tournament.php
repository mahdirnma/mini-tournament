<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'team_id',
        'games_count',
        'goal_scored',
        'goal_conceded',
        'score'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

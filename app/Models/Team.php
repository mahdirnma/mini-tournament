<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'description',
    ];

    public function tournament()
    {
        return $this->hasOne(Tournament::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class,'team_team','team1_id','team2_id')
            ->withPivot([
                'team1-goals',
                'team2-goals',
                'primary',
                'week',
            ])
            ->withTimestamps();
    }
}

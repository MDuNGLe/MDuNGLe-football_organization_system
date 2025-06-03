<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchTeam extends Model
{
    /** @use HasFactory<\Database\Factories\MatchTeamFactory> */
    use HasFactory;

    protected $fillable = [
        'game_match_id',
        'team_id',
        'title',
        'goal_moments',
        'red_cards',
        'yellow_cards',
    ];

    public function match()
    {
        return $this->belongsTo(GameMatch::class, 'match_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

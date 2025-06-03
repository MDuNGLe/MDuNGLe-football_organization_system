<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GameMatch extends Model
{
    /** @use HasFactory<\Database\Factories\GameMatchFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'start_at',
        'end_at',
        'field_id',
        'status',
    ];

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'match_teams');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameMatch extends Model
{
    /** @use HasFactory<\Database\Factories\GameMatchFactory> */
    use HasFactory;

    protected $fillable = [
        'datetime',
        'field_id',
        'status',
    ];

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
}

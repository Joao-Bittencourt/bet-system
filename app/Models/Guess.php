<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guess extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'guess',
        'value',
        'bet_event_id',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function bet_events(): BelongsTo
    {
        return $this->belongsTo(BetEvent::class);
    }
}

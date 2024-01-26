<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question',
        'answer',
        'opt_1',
        'opt_2',
        'opt_3'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

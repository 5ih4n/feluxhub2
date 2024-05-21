<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class feluxvideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'media_path'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}

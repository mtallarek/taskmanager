<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Task extends Model
{
    protected $guarded = [];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

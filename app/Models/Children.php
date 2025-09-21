<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Children extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "user_id",
        "name",
        "date_of_birth",
        "gender",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function checkups(): HasMany
    {
        return $this->hasMany(Checkup::class);
    }
}

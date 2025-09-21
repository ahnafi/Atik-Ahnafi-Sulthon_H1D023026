<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkup extends Model
{
    protected $fillable = [
        "children_id",
        "checkup_date",
        "age_in_months",
        "height",
        "weight",
        "fuzzy_score",
        "nutritional_status"
    ];

    public function children(): BelongsTo
    {
        return $this->belongsTo(Children::class);
    }
}

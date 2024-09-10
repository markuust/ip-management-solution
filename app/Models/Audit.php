<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $fillable = [
        'auditable_type',
        'auditable_id',
        'event',
        'old_values',
        'new_values',
        'user_id',
    ];

    // Ensure the JSON fields are cast to arrays
    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    // Polymorphic relation to the auditable models
    public function auditable()
    {
        return $this->morphTo();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;

class IpManagement extends Model
{
    use HasFactory;
    use Auditable; // Use the Auditable trait

    protected $guarded = [];  

    public function audits()
    {
        return $this->morphMany(Audit::class, 'auditable');
    }
}

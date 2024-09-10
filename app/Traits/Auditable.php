<?php

namespace App\Traits;

use App\Models\Audit;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function ($model) {
            $model->logAudit('created');
        });

        static::updated(function ($model) {
            $model->logAudit('updated');
        });
    }

    protected function logAudit($event)
    {
        $audit = new Audit();
        $audit->auditable_type = get_class($this);
        $audit->auditable_id = $this->id;
        $audit->event = $event;

        if ($event === 'updated') {
            $audit->old_values = $this->getOriginal();
            $audit->new_values = $this->getChanges();
        } elseif ($event === 'created') {
            $audit->new_values = $this->getAttributes();
        } 

        // Optionally, store the user who made the change if authentication is enabled
        $audit->user_id = auth()->id() ?? null;

        $audit->save();
    }
}

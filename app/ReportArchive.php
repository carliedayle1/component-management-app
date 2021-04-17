<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportArchive extends Model
{
    protected $guarded = [];

    public function component()
    {
        return $this->belongsTo(Component::class, 'component_id');
    }

    public function componentArchive()
    {
        return $this->belongsTo(ComponentArchive::class, 'component_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

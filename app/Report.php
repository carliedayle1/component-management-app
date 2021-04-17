<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
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

    public function transactions()
    {
        return $this->hasMany(ReportTransaction::class);
    }
}

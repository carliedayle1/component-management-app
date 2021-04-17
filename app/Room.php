<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function components()
    {
        return $this->hasMany(Components::class);
    }

    public function archiveComponents()
    {
        return $this->hasMany(ComponentArchive::class);
    }
}

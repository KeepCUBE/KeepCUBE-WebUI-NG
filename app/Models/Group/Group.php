<?php

namespace KC\Models\Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function devices() {
        return $this->belongsToMany(Device::class);
    }
}

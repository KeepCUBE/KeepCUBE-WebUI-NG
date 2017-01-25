<?php

namespace KC\Models\Type;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function devices() {
        $this->hasMany(Device::class);
    }
}

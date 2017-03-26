<?php

namespace KC\Models\Type;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Device\Device;

class Type extends Model
{
    public function devices() {
        $this->hasMany(Device::class);
    }
}

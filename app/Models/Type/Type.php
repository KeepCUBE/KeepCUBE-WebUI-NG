<?php

namespace KC\Models\Type;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Device\Device;
use KC\Models\Command\Command;

class Type extends Model
{
    public function devices() {
        $this->hasMany(Device::class);
    }
    public function types() {
        $this->hasMany(Command::class);
    }
}

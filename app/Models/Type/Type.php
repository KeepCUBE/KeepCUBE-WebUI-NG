<?php

namespace KC\Models\Type;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Device\Device;
use KC\Models\Route\Route;
use KC\Models\Command\Command;

class Type extends Model
{
    public function devices() {
        return $this->hasMany(Device::class);
    }
    public function types() {
        return $this->hasMany(Command::class);
    }
    public function route() {
        return $this->belongsTo(Route::class);
    }
}

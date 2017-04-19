<?php

namespace KC\Models\Room;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Device\Device;

class Room extends Model
{
    protected $fillable = [
        'name', 'description'
    ];
    public function devices() {
        return $this->hasMany(Device::class);
    }
}

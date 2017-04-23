<?php

namespace KC\Models\Switcher;

use KC\Models\Device\Device;
use Illuminate\Database\Eloquent\Model;

class Switcher extends Model
{
    protected $table = 'switches';

    protected $fillable = ['function', 'code'];

    public function device() {
        return $this->belongsTo(Device::class);
    }
}

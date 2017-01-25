<?php

namespace KC\Models\Device;


use KC\Models\Type\Type;
use KC\Models\Command\Command;
use KC\Models\Group\Group;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function commands() {
        return $this->hasMany(Command::class);
    }
    public function groups() {
        return $this->belongsToMany(Group::class);
    }
}

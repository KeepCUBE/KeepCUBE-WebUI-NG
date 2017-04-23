<?php

namespace KC\Models\Device;


use KC\Models\Type\Type;
use KC\Models\Command\Command;
use KC\Models\Group\Group;
use Illuminate\Database\Eloquent\Model;
use KC\Models\Room\Room;
use KC\Models\Switcher\Switcher;

class Device extends Model
{
    protected $fillable = [
        'name', 'type_id', 'room_id'
    ];
    protected $casts = [
        'room_id' => 'integer',
        'type_id' => 'integer'
    ];
    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function commands() {
        return $this->hasMany(Command::class);
    }
    public function groups() {
        return $this->belongsToMany(Group::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
    public function switches() {
        return $this->hasMany(Switcher::class);
    }
}

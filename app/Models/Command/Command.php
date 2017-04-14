<?php

namespace KC\Models\Command;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Type\Type;

class Command extends Model
{
    public $fillable = [
        'type_id', 'command_scheme', 'template'
    ];
    public $casts = [
        'command_scheme' => 'array'
    ];
    public function type() {
        return $this->belongsTo(Type::class);
    }
}

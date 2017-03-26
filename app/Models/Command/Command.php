<?php

namespace KC\Models\Command;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public $fillable = [
        'type_id', 'command'
    ];
    public function type() {
        return $this->belongsTo(Type::class);
    }
}

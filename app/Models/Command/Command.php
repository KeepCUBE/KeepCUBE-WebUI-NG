<?php

namespace KC\Models\Command;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public function type() {
        return $this->belongsTo(Type::class);
    }
}

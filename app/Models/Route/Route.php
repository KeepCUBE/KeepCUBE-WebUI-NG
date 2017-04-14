<?php

namespace KC\Models\Route;

use Illuminate\Database\Eloquent\Model;
use KC\Models\Type\Type;
use Baum\Node;

class Route extends Node
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'routes';

    public function types() {
        return $this->hasMany(Type::class);
    }
}

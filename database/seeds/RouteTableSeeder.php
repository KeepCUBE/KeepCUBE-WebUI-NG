<?php

use Illuminate\Database\Seeder;
use KC\Models\Route\Route;


class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = Route::create(['name' => 'Arduino nrf', 'code' => 'NRF']);
        $child = $parent->children()->create(['name' => '433SPZ', 'code' => 'FOO']);
        $child->children()->create(['name' => 'last deph', 'code' => 'LAST']);
    }
}

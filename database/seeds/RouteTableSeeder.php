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
        //TODO: reverse logic | NRF should be child of ATMega and the result should be #ATM#NRF
        $atmega = Route::create(['name' => 'NRF', 'code' => 'NRF']);
        $atmega->children()->create(['name' => 'ATMega', 'code' => 'SVA']);
    }
}

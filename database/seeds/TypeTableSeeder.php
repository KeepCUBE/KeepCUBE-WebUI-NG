<?php

use Illuminate\Database\Seeder;
use KC\Models\Type\Type;
use KC\Models\Device\Device;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Switch',
            'route_id' => '1',
        ]);
        DB::table('types')->insert([
            'name' => 'KC LED',
            'route_id' => '1',
        ]);
    }
}

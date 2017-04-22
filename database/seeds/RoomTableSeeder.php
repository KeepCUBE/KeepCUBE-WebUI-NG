<?php

use Illuminate\Database\Seeder;
use KC\Models\Device\Device;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Room 1',
        ]);
    }
}

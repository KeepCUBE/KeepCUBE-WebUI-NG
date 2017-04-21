<?php

use Illuminate\Database\Seeder;
use KC\Models\Device\Device;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'name' => 'Lustr obývák',
            'type_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => 'Led kuchyň',
            'type_id' => '2',

        ]);
    }
}

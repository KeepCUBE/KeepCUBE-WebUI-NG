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
        factory(Device::class, 10)->create();
    }
}

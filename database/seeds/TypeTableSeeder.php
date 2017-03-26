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
        factory(Type::class, 10)->create();
    }
}

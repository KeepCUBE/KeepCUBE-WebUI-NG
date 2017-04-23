<?php declare(strict_types=1);
namespace KC\Services\DeviceServices;

use KC\Models\Device\Device;
use KC\Models\Switcher\Switcher;

class DeviceCreator {
    private $device;
    private $switcher;

    public function __construct(Device $device, Switcher $switcher) {
        $this->device = $device;
        $this->switcher = $switcher;
    }
    public function store(array $input) {
        $device = $this->device->create($input);
        $device->switches()->create([
            'function' => 'on',
            'code' => rand(160000, 169999)
        ]);
        $device->switches()->create([
            'function' => 'off', 
            'code' => rand(160000, 169999)
        ]);

        return $device;
    }
}
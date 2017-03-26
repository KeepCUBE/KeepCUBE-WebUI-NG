<?php declare(strict_types=1);
namespace KC\Services\DeviceServices;

use KC\Models\Device\Device;

class DeviceCreator {
    private $device;

    public function __construct(Device $device) {
        $this->device = $device;
    }
    public function store(array $input) {
        return $this->device->create($input);
    }
}
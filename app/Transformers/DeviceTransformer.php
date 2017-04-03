<?php
namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\Device\Device;

class DeviceTransformer extends TransformerAbstract {
    public function transform($device) {
        return [
          'id' => (int) $device->id,
          'name' => $device->name,
        ];
    }
}
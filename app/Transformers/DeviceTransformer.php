<?php
namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\Device\Device;

class DeviceTransformer extends TransformerAbstract {
    public function transform(Device $device) {
        return [
            'id' => (int) $device->id,
            'name' => $device->name,
            'type_id' => $device->type_id,
        ];
    }
}

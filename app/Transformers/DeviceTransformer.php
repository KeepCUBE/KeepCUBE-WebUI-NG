<?php
namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\Device\Device;

class DeviceTransformer extends TransformerAbstract {
    public function transform(Device $device) {
        return [
            'id' => (int) $device->id,
            'name' => $device->name,
            'type_id' => (int) $device->type_id,
            'room_id' => (int) $device->room_id,
        ];
    }
}

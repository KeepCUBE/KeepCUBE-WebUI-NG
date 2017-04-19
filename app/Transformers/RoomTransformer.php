<?php

namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\Room\Room;

class RoomTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Room $room)
    {
        return [
            'name' => $room->name,
            'description' => $room->description
        ];
    }
}

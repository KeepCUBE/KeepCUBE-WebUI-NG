<?php

namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\Command\Command;

class CommandTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Command $command)
    {
        return [
            'id' => (int) $command->id,
            'name' => (string) $command->name,
            'type_id' => (int) $command->type_id,
            'command_scheme' => $command->command_scheme
        ];
    }
}

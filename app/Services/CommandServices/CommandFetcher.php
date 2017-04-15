<?php
namespace KC\Services\CommandServices;

use KC\Models\Command\Command;
use KC\Transformers\CommandTransformer;

class CommandFetcher {
    private $command;

    public function __construct(Command $command, Fractal $fractal) {
        $this->command = $command;
        $this->fractal = $fractal;
    }
    public function find($id) {
        try {
            $device = $this->device->findOrFail($id);
            return $this->fractal->item($command, new CommandTransformer);
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Command with id {$id} not found");
        }
    }
    public function paginate(array $query = null, $perPage = 15) {
        $commands = $this->command->paginate($perPage);

        return $this->fractal
            ->collection($commands, new CommandTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($devices))
            ->toArray();
    }
}
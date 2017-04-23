<?php
namespace KC\Services\CommandServices;

use Illuminate\Redis\Database as Redis;
use KC\Services\CommandServices\CommandConvertor;
use KC\Models\Command\Command;
use KC\Models\Route\Route;

class CommandSender {
    private $channel = 'keep';
    private $redis;
    private $convertor;

    public function __construct(Redis $redis, CommandConvertor $convertor) {
        $this->redis = $redis;
        $this->convertor = $convertor;
    }

    public function send(Command $command, Route $route) {
        $convertedCommand = $this->convertor->convert($command, $route);
        $this->publish($convertedCommand);
    }
    private function publish($data) {
        $this->redis->publish($this->channel, $data);
    }
}
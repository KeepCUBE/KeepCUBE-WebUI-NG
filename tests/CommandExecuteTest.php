<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KC\Models\Command\Command;

class CommandExecuteTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];
    public function testCommandExecute() {
        $command = factory(Command::class)->create();
        $parent = $command->type->route;
        $parent->children()->create(['name' => 'NRF', 'code' => 'NRF']);
        $response = $this->post(route('commands.execute', [$command->id]));
        $response->seeStatusCode(200);
    }
}

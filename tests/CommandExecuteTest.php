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

    private $exampleScheme = [
        'command_scheme' => [
                '#' => 'SLP',
                'L' => 25,
                'P' => [
                    '#ff0022',
                    '#ff0033'
                ],
                'T' => 0.4,
                'D' => 10
        ]
    ];
    public function testCommandExecute() {
        $command = factory(Command::class)->create();
        $parent = $command->type->route;
        $parent->children()->create(['name' => 'NRF', 'code' => 'NRF']);
        $response = $this->post(route('commands.execute', [$command->id]));
        dump($response);
        $response->seeStatusCode(200);
    }
}

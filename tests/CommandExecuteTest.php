<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KC\Models\Command\Command;
use KC\Models\Type\Type;

class CommandExecuteTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];
    public function testCommandExecute() {
        $command = factory(Command::class)->create();
        $parent = $command->type->route;
        $parent->children()->create(['name' => 'SVA', 'code' => 'SVA']);
        $response = $this->post(route('commands.execute', [$command->id]));
        $response->seeStatusCode(200);
    }
    public function testCommandSlain() {
        $type  = factory(Type::class)->create();
        $parent = $type->route;
        $parent->children()->create(['name' => 'SVA', 'code' => 'SVA']);
        $response = $this->post(route('commands.slain', [
            'type_id' => $type->id,
            'command_scheme' => [
                'name' => 'SLP',
                'values' => [
                    'L' => 1,
                    'C' => [
                        '#F00FF2',
                        '#F02F11'
                    ],
                    'T' => [
                        1000
                    ],
                    'A' => 1
                ]
            ]
        ]));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
    }
    public function testCommandMurder() {
        $type = factory(Type::class)->create();
        $response = $this->post(route('commands.murder', [
            'type_id' => $type->id,
            'cmd' => '#NRFA2&#BIAS10J10;&;'
        ]));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
    }
}

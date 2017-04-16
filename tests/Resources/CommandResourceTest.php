<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KC\Models\Command\Command;
use KC\Models\Type\Type;

class CommandResourceTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];

    private $exampleScheme = [
        'command_scheme' => [
                '' => 'SLP',
                'L' => 25,
                'P' => [
                    '#ff0022',
                    '#ff0033'
                ],
                'T' => 0.4,
                'D' => 10
        ]
    ];
    public function testCommandSave() {
        $type = factory(Type::class)->create();
        $response = $this->post(route('commands.store'), [
            'template' => false,
            'type_id' => $type->id,
            'name' => 'Name of command',
            'command_scheme' => $this->exampleScheme
        ], $this->headers);
        $this->seeStatusCode(200);
        $this->seeJson(['ok' => true]);
        $this->seeInDatabase('commands', [
            'command_scheme' => json_encode($this->exampleScheme)
        ]);
    }
    public function testCommandDelete() {
        $command = factory(Command::class)->create();
        $response = $this->delete(route('commands.destroy', [
            'id' => $command->id
        ]), $this->headers);
        $this->seeStatusCode(200);
        $this->seeJson(['ok' => true]);
        $this->notSeeInDatabase('commands', ['command_scheme'=>json_encode($this->exampleScheme)]);
    }
} 
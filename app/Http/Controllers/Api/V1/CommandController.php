<?php

namespace KC\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use KC\Http\Controllers\Api\Controller;
use KC\Models\Command\Command;
use KC\Services\CommandServices\CommandSender;
use KC\Models\Type\Type;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $command = Command::create($request->all());

        return $this->response("Command {$command->name} created.", ['id' => $command->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Command::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Command::update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Command::destroy($id)) {
            return $this->response("Command destroyed successfully");
        }
    }
    /**
     * Execute command
     *
     */
    public function execute(Command $command, CommandSender $sender, $id) {
        $command = $command->find($id);
        $route = $command->type->route;
        $sender->send($command, $route);

        return $this->response("Command executed successfuly");
    }
    public function slain(Request $request, CommandSender $sender, Type $type) {
        $command = (new Command)->fill($request->all());
        $type = $type->find($request->input('type_id'));
        $sender->send($command, $type->route);

        return $this->response("Command slained successfuly");
    }
}

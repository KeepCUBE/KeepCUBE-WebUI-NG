<?php

namespace KC\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use KC\Http\Requests;
use KC\Http\Controllers\Api\Controller;
use KC\User;
use Validator;
use KC\Transformers\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use KC\Serializers\ApiSerializer;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($paginator = User::paginate(15)) {
          $users = $paginator->getCollection();

          return fractal()
            ->collection($users, new UserTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
        }
        throw $this->createNotFoundException('error.users.all');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validator($request->all());

        if($validation->fails()) {
          return $validation->errors();
        }

        $user = new User($request->all());
        $user->save();

        return $this->successResponse("User {$user->name} created.");
    }
    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($user = User::find($id)) {
          return fractal()
            ->item($user, new UserTransformer)
            ->toArray();
        }
        throw $this->createNotFoundException("No user with id {$id}");
    }

    /**
     * Update the specified User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if(!$user = User::find($id)) {
            throw $this->createNotFoundException("No user with id {$id}");
        }
        if(!$user->fill($request->all())) {
            throw $this->createBadRequestException('Bad request');
        }
        $user->save();
        return $this->successResponse("User {$user->name} updated.");
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! $user = User::find($id)) {
            throw $this->createNotFoundException("No user with id {$id}");
        }
        if(! $user->delete()) {
            throw $this->createInternalErrorException("Got problem with deleting");
        }
        return $this->successResponse("User {$user->name} deleted.");
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    }
}

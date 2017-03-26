<?php

namespace KC\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use KC\Http\Requests\UserRequests\UserStoreRequest;
use KC\Http\Requests\UserRequests\UserUpdateRequest;
use KC\Http\Controllers\Api\Controller;
use KC\Services\UserServices\UserCreator;
use KC\Services\UserServices\UserFetcher;
use KC\Services\UserServices\UserUpdater;
use KC\Services\UserServices\UserDestroyer;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserFetcher $userFetcher)
    {
        try {
            $perPage = $request->get('per_page') ?? 15;
            return $userFetcher->paginate($request->all(), $perPage);
        } catch(\Exception $e) {
            throw $this->createNotFoundException('error.users.all');
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request, UserCreator $userCreator)
    {
        $user = $userCreator->store($request->all());
        return $this->successResponse("User {$user->name} created.");
    }
    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserFetcher $userFetcher, $id)
    {
        try {
            $user = $userFetcher->find($id);
            return $user;
        } catch(\Exception $e) {
            throw $this->createNotFoundException("No user with id {$id}");
        }
    }

    /**
     * Update the specified User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,UserUpdater $userUpdater, $id)
    {
        $user = $userUpdater->update($id, $request->all());
        return $this->successResponse("User {$id} updated.");
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyer $userDestroy, $id)
    {
        $user = $userDestroy->delete($id);
        return $this->successResponse("User {$id} deleted.");
    }
}

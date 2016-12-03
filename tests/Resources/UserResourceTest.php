<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserResourceTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];

    public function testUserIndex() {
        $users = factory(KC\Models\User::class,4)->create();
        $response = $this->get(route('users.index'));

        $response->seeStatusCode(200);
        $response->seeJson(['success' => true]);
        foreach ($users as $user) {
            $response->seeJson([
                'name' => $user->name
            ]);
        }
    }
    public function testUserShow() {
        $user = factory(KC\Models\User::class)->create();
        $route = route('users.show', ['user' => $user->id]);
        $response = $this->get($route);

        $response->seeStatusCode(200);
        $response->seeJson(['success' => true, 'name' => $user->name]);
    }
    public function testUserShowNotFound() {
        $user = factory(KC\Models\User::class)->create();
        $route = route('users.show', ['user'=>$user->id+1]);
        $response = $this->get($route, $this->headers);

        $response->seeStatusCode(404);
        $response->seeJson(['success' => false]);
    }
    public function testUserUpdate() {
        $user = factory(KC\Models\User::class)->create();
        $route = route('users.update', [
          'user' => $user->id,
          'name' => 'testvalue'
        ]);
        $response = $this->put($route);

        $response->seeStatusCode(200);
        $response->seeJson(['success' => true]);
        $this->seeInDatabase('users', ['name' => 'testvalue']);
    }
    public function testUserUpdateNotFound() {
        $user = factory(KC\Models\User::class)->create();
        $route = route('users.update', [
          'user' => $user->id + 50,
          'name' => 'testvalue'
        ]);
        $response = $this->put($route, [], $this->headers);

        $response->seeStatusCode(404);
        $response->seeJson(['success' => false]);
        $this->notSeeInDatabase('users', ['name' => 'testvalue']);
    }
    public function testUserCreate() {
        $secret['password'] = $secret['password_confirmation'] = 'secret1234';
        $user = factory(KC\Models\User::class)->make();
        $route = route('users.store', array_merge($user->toArray(),$secret));
        $response = $this->post($route);

        $response->seeStatusCode(200);
        $response->seeJson(['success' => true]);
    }
    public function testUserDestroy() {
        $user = factory(KC\Models\User::class)->create();
        $response = $this->delete(route('users.destroy', ['user' => $user->id]));

        $response->seeStatusCode(200);
        $response->seeJson(['success' => true]);
    }
    public function testUserDestroyNotFound() {
        $user = factory(KC\Models\User::class)->create();
        $route = route('users.destroy', ['user' => $user->id + 1]);
        $response = $this->delete($route, [], $this->headers);

        $response->seeStatusCode(404);
        $response->seeJson(['success' => false]);
    }
}

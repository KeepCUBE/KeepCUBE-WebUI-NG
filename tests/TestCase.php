<?php
use JWTAuth;
use KC\Models\User\User;
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
    public function headers($user = null) {
        if(!is_null($user)) {
            $user = factory(User::class)->create();
        }
        $token = JWTAuth::fromUser($user);
        JWTAuth::setToken($token);
        return array_merge($this->headers, [
            'Authorization' => 'Bearer '.$token
        ]);
    }
}

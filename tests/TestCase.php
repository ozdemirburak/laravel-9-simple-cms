<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @var \App\User
     */
    protected $user;

    /**
     * @param null $user
     *
     * @return $this
     */
    public function signIn($user = null)
    {
        if (!$user) {
            $user = factory(\App\User::class)->make([
                'email' => 'test@user.com',
                'name' => 'user',
                'password' => bcrypt('123456'),
                'picture' => null,
            ]);
        }

        $this->user = $user;

        $this->actingAs($this->user);

        return $this;
    }
}

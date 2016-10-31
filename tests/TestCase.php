<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    protected $user;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function signIn($user = null)
    {
        if (!$user) {
            $user = factory(App\User::class)->make([
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

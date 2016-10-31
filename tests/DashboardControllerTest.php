<?php

class DashboardControllerTest extends TestCase
{
    /**
     * @test
     */
    public function when_i_logged_in_i_see_dashboard()
    {
        $this->signIn();

        $this->visit('admin')
            ->seePageIs('admin/user');
    }

    /**
     * @test
     */
    public function when_i_not_logged_in_it_redirects_to_login()
    {
        $this->get('admin');

        $this->assertRedirectedToRoute('auth.login');
    }
}

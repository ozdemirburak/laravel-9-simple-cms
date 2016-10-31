<?php

class PageControllerTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_see_pages_crud()
    {
        $this->signIn();

        $this->visit('admin')
            ->click('All Pages')
            ->seePageIs('admin/page');
    }
}

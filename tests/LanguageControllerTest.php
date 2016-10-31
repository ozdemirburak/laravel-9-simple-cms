<?php

class LanguageControllerTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_see_languages_crud()
    {
        $this->signIn();

        $this->visit('admin')
            ->click('All Languages')
            ->seePageIs('admin/language');
    }
}

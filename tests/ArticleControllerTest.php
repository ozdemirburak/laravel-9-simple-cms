<?php

class ArticleControllerTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_see_articles_crud()
    {
        $this->signIn();

        $this->visit('admin')
            ->click('All Articles')
            ->seePageIs('admin/article');
    }
}

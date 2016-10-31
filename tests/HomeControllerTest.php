<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $articles;

    public function setUp()
    {
        parent::setUp();

        $this->articles = factory(App\Article::class)->make([
            'category_id' => 1,
            'content' => 'Some content',
            'description' => 'A description',
            'published_at' => date($format = 'Y-m-d', time()),
            'title' => 'The title',
        ]);
    }

    /**
     * @test
     */
    public function it_shows_blog_title()
    {
        $this->visit('/')
            ->see('Blog');
    }

    /**
     * @test
     */
    public function it_allows_to_choose_english_language()
    {
        $this->visit('/')
            ->seeElement('img', ['id' => 'lang_en']);
    }

    /**
     * @test
     */
    public function it_shows_an_article()
    {
        $response = $this->get('/', [$this->articles]);
        $this->assertViewHas('articles');
    }
}

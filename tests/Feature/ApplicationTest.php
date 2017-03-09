<?php

namespace Tests\Feature;

use App\Article;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var Collection
     */
    protected $articles;

    /**
     * Create article
     */
    public function setUp()
    {
        parent::setUp();
        $this->articles = factory(Article::class)->make([
            'category_id' => 1,
            'content' => 'Some content',
            'description' => 'A description',
            'published_at' => date($format = 'Y-m-d', time()),
            'title' => 'The title',
        ]);
    }

    /**
     * @group application-home-tests
     */
    public function testTitleOnHomePage()
    {
        $this->visit('/')->see('Blog');
    }

    /**
     * @group application-home-tests
     */
    public function testLanguagesOnHomePage()
    {
        $this->visit('/')->seeElement('span', ['data-code' => 'en']);
    }

    /**
     * @group application-home-tests
     */
    public function testArticlesOnHomePage()
    {
        $this->get('/', [$this->articles]);
        $this->assertViewHas('articles');
    }
}

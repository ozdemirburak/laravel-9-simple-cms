<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * @group admin-base-tests
     */
    public function testDashboard()
    {
        $this->signIn();
        $this->visit('admin')->seePageIs(env('ANALYTICS_CONFIGURED') ? 'admin' : 'admin/user');
    }

    /**
     * @group admin-base-tests
     */
    public function testUnauthorizedAccess()
    {
        $this->get('admin');
        $this->assertRedirectedToRoute('auth.login');
    }

    /**
     * @group admin-crud-tests
     */
    public function testArticlesCrud()
    {
        $this->signIn();
        $this->visit('admin')->click('All Articles')->seePageIs('admin/article');
    }

    /**
     * @group admin-crud-tests
     */
    public function testPagesCrud()
    {
        $this->signIn();
        $this->visit('admin')->click('All Pages')->seePageIs('admin/page');
    }

    /**
     * @group admin-crud-tests
     */
    public function testLanguagesCrud()
    {
        $this->signIn();
        $this->visit('admin')->click('All Languages')->seePageIs('admin/language');
    }
}

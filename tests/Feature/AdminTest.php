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
        $this->visit('admin')->seePageIs(!empty(env('GOOGLE_ANALYTICS_CREDENTIAL_PATH')) ? 'admin' : 'admin/user');
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
        $this->visit('admin')->click('Articles')->seePageIs('admin/article');
    }

    /**
     * @group admin-crud-tests
     */
    public function testCategoriesCrud()
    {
        $this->signIn();
        $this->visit('admin')->click('Categories')->seePageIs('admin/category');
    }

    /**
     * @group admin-crud-tests
     */
    public function testPagesCrud()
    {
        $this->signIn();
        $this->visit('admin')->click('Pages')->seePageIs('admin/page');
    }
}

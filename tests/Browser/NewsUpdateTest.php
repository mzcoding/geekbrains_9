<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsUpdateTest extends DuskTestCase
{
	//use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNewsUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/7/edit')

				//->select('category_id', '3')
				->type('title', 'Some title')
				->type('description', 'Some description')
				->press('Сохранить')
				->assertPathIs('/admin/news');
        });
    }
}

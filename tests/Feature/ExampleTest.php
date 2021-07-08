<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index_json()
	{
		$response = $this->get('/');
		$response->assertJson([
			'description' => 'ExampleDescription',
			'title' => 'Example',

		]);
	}
}

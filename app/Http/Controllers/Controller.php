<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected array $news;

    protected function getNews(): array
	{
		$faker =  Factory::create('ru_Ru');
		for($i = 0; $i < 5; $i++) {
			$j = $i+1;
			$this->news[] = [
				'title' => " Новость ". $j,
				'description' => $faker->text(100)
			];

		}

		return $this->news;

	}

}

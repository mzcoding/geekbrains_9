<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
	{
       dd($parser->getParsedList("https://news.yandex.ru/army.rss"));
	}
}

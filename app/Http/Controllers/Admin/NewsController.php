<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
    	$news =  News::orderBy('id', 'desc')->get();
        return view('admin.news.index', [
			'newsList' => $news
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function create()
    {
		$categories  = Category::all();
        return view('admin.news.create', [
        	'categories' => $categories
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
	{
		$request->validate([
			'title' => ['required', 'string']
		]);

		$data = $request->only(['category_id', 'title', 'status', 'description']);
		$data['slug'] = Str::slug($data['title']);

        $news = News::create($data);

		if($news) {
			return redirect()->route('admin.news.index')
				->with('success', 'Запись успешно создана');
		}

		return back()->with('error', 'Не удалось создать запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit(News $news)
    {
    	$categories  = Category::all();
        return view('admin.news.edit', [
        	'news' => $news,
			'categories' => $categories
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param News $news
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(Request $request, News $news)
    {
		$data = $request->only(['category_id', 'title', 'status', 'description']);
		$data['slug'] = Str::slug($data['title']);

		$statusCategory = $news->fill($data)->save();

		if($statusCategory) {
			return redirect()->route('admin.news.index')
				->with('success', 'Запись успешно обновлена');
		}

		return back()->with('error', 'Не удалось обновить запись');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function destroy(News $news)
    {
        //
    }
}

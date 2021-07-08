<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categoryModel = new Category();
    	//$categories = $categoryModel->getCategories();

    	//dd(
			$categories = \DB::table('categories')
				->join('news', 'categories.id', '=', 'news.category_id')
			    ->select(['news.*', 'categories.title as categoryTitle', 'categories.description as categoryDescription',
					'categories.color as categoryColor'])
				/*->where([
					['news.id', '>', 5],
					['categories.id', '<>', 1]
				])
				->Orwhere('news.title', 'like', '%'. request()->query('q').'%')*/
					->whereBetween('news.id', [1,7])
				    ->whereDate('news.created_at', '>=', now('	Pacific/Honolulu'))
			    ->get();
		//);
        return view('admin.categories.index', [
        	'categoryList' => $categories
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        dd($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

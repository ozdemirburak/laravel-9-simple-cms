<?php namespace App\Http\Controllers\Application;

class CategoryController extends Controller {

    /**
     * Show the category articles
     *
     * @param Category $category
     * @return Response
     */
    public function index(Category $category)
    {
        return view('application.category.index', compact('category'));
    }

}

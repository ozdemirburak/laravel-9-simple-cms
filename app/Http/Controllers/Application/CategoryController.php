<?php namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller {

    /**
     * Show the category articles
     *
     * @param Category $category
     * @return Response
     */
    public function index(Category $category)
    {
        $articles = $category->articles()->paginate(5);
        return view('application.category.index', compact('articles', 'category'));
    }

}

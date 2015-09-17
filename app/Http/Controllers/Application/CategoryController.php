<?php

namespace App\Http\Controllers\Application;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Show the category articles
     *
     * @param Category $category
     * @return Response
     */
    public function index(Category $category)
    {
        $articles = $category->articles()->published()->orderBy('published_at','desc')->paginate(5);
        return view('application.category.index', compact('articles', 'category'));
    }

}

<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class Form extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category = null)
    {
      return view('category.form', [
        'category' => $category ?? new Category(),
      ]);
    }
}

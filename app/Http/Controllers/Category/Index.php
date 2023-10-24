<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class Index extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    return view('category.index', [
      'categories' => Category::withCount('companies')->latest()->get()
    ]);
  }
}

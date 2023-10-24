<?php

namespace App\Http\Controllers;

use App\Models\Category;

class Welcome extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    if (Category::count() >= 2 && request()->routeIs('home')) return redirect()->route('companies.index');

    return view('welcome', [
      'categories_count' => Category::count(),
    ]);
  }
}

<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;

class Store extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \App\Http\Requests\Category\CategoryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(CategoryStoreRequest $request)
  {
    $validated_category = $request->validated();

    // Trim and remove extra spaces
    // $name = preg_replace('/\s+/', ' ', trim($validated_category['name']));

    $category = new Category();
    $category->name = Str::ucfirst($validated_category['name']);
    $category->save();

    Toast::title('Ewe!')
      ->success('You added a new category')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect()->back();
  }
}

<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Category;

class Form extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Company $company = null)
    {
      return view('companies.form', [
        'categories' => Category::latest()->orderBy('name')->pluck('name', 'id'),
        'company' => $company ?? new Company(),
      ]);
    }
}

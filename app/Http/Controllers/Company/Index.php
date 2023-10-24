<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
      return view('companies.index', [
        'companies' => Company::orderBy('name')->with('category')->simplePaginate(10)
      ]);
    }
}

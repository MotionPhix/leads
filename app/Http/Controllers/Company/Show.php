<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use ProtoneMedia\Splade\Facades\SEO;

class Show extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Company $company)
  {

    SEO::title($company->name . ' | Wakr')
      ->description($company->ame . '\'s details')
      ->keywords('Leads management system');

    return view('companies.show', [
      'company' => $company->load('contacts', 'tags', 'category'),
    ]);
  }
}

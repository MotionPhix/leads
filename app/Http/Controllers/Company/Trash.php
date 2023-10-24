<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use ProtoneMedia\Splade\Facades\Toast;

class Trash extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Company $company)
  {
    // Eager load images and comments to minimize database queries
    $company->load('contacts');

    // Delete comments
    $company->contacts()->delete();

    // Delete the company itself
    $company->delete();

    Toast::title('That\'s it!')
      ->info($company->name . ' is permanently gone')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect()->route('companies.index');
  }
}

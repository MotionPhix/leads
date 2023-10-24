<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class Update extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request, Company $company)
  {
    $company->update($request->all());

    Toast::title('Bravo!')
      ->success('You updated company information')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect()->back();
    // return redirect(route('companies.show', $company));
  }
}

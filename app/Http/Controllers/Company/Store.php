<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Models\Company;
use ProtoneMedia\Splade\Facades\Toast;

class Store extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CompanyStoreRequest $request)
    {
      $validated_company = $request->validated();

      Company::create($validated_company);

      Toast::title('Great!')
        ->success('A company was just created!')
        ->leftBottom()
        ->autoDismiss(5);

      return redirect(route('companies.index'));
    }
}

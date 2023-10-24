<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;

class Index extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    // SEO::title('Explore a prolific of contacts | Wakr')
    //   ->description('Stay curious, discover contacts, thinking, and expertise!');

    return view('contacts.index', [
      'field' => 'first_name',
      'direction' => 'asc',
      'contacts' => \App\Models\Contact::latest()
        ->with('company')
        ->withLastInteractionDate()
        ->withLastInteractionType()
        // ->withLastInteraction()
        ->orderByName()
        ->get()
    ]);
  }
}

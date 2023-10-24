<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use ProtoneMedia\Splade\Facades\SEO;

class Show extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Contact $contact)
  {
    SEO::title($contact->full_name . ' | Wakr')
      ->description($contact->full_name . '\'s details')
      ->keywords('contact management');

    return view('contacts.show', [
      'contact' => $contact->load('interactions'),
    ]);
  }
}

<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Toast;

class Trash extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Contact $contact)
  {
    // Eager load ima to minimize database queries
    $contact->load('interactions', 'images');

    // Delete images and their associated files
    if (isset($contact->images)) {

      $contact->images->each(function (\App\Models\Image $image) {
        $image->delete();
        // Delete the associated file from storage
        Storage::delete($image->path);
      });

    }

    // Delete comments
    $contact->interactions()->delete();

    // Delete the contact itself
    $contact->delete();

    Toast::title('That\'s it!')
      ->info($contact->name . ' is permanently deleted')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect()->route('contacts.index');
  }
}

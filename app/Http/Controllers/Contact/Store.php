<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Models\Contact;
use App\Models\Phone;
use ProtoneMedia\Splade\Facades\Toast;

class Store extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \App\Http\Requests\Contact\ContactRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(ContactRequest $request)
  {
    $validated_contact = $request->validated();

    $contact = Contact::create($validated_contact);

    if (isset($validated_contact['phones'])) {

      $phones = [];

      foreach ($validated_contact['phones'] as $key => $phone) {
        $phones[$key] = new Phone($phone);
      }

      $contact->phones()->saveMany($phones);
    }

    /*if ($request->hasFile('photo_path')) { // save file if image file is available
        $imagePath = $request->file('photo_path')->store('posts', 'local'); // Save the image to local storage in the 'posts' directory

        // Create the associated image record in the database
        $post->images()->create([
          'path' => $imagePath,
          'name' => $request->file('photo_path')->getClientOriginalName(),
        ]);
      }*/

    Toast::title('Awesome!')
      ->success('New contact was added!')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect(route('contacts.index'));
  }
}

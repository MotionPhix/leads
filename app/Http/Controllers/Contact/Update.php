<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Models\Contact;
use App\Models\Phone;
use ProtoneMedia\Splade\Facades\Toast;

class Update extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(ContactRequest $request, Contact $contact)
  {
    $validated_contact = $request->validated();

    $contact->update($validated_contact);

    if (isset($validated_contact['phones'])) {

      $phones = [];
      $phoneIds = [];

      foreach ($request->validated()['phones'] as $key => $phone) {
        if (isset($phone['id'])) {
          $phone_exists = Phone::find($phone['id']);

          if ($phone_exists && $phone['number'] !== $phone_exists->number) {
            $phone_exists->update($phone);
            $phones[$key] = $phone_exists;
          }

          $phoneIds[] = $phone['id'];

        } else {

          $new_phone = new Phone($phone);
          $contact->phones()->save($new_phone);
          $phones[$key] = $new_phone;

          $phoneIds[] = $new_phone->id;

        }
      }

      // Remove any phone numbers that are not in $phoneIds.
      $contact->phones()->whereNotIn('id', $phoneIds)->delete();
    }

    // $contact->image()->save(\App\Models\Image::make(['path' => $path]));

    Toast::title('Hooray!')
      ->success('Contact was updated')
      ->leftBottom()
      ->autoDismiss(5);

    return redirect(route('contacts.show', $contact));
  }
}

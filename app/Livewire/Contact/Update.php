<?php

namespace App\Livewire\Contact;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Livewire\Component;

class Update extends Component
{
  public ContactForm $form;

  public function mount(Contact $contact)
  {
    $this->form->setContact($contact);
  }

  public function save()
  {
    $this->form->update();

    return $this->redirect(route('contacts.show', $this->form->contact->id), true);
  }


  public function render()
  {
    return view('livewire..contact.update');
  }
}

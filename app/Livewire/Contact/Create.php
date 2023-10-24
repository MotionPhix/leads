<?php

namespace App\Livewire\Contact;

use App\Livewire\Forms\ContactForm;
use Livewire\Component;

class Create extends Component
{
  public ContactForm $form;

  public function save()
  {
    $this->form->store();

    return $this->redirect('/contacts', true);
  }

  public function render()
  {
    return view('livewire..contact.create');
  }
}

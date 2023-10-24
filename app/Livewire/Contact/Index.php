<?php

namespace App\Livewire\Contact;

use Livewire\Component;

class Index extends Component
{
  public function render()
  {
    return view('livewire..contact.index', [
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

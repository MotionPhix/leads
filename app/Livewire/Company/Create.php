<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Create extends Component
{
  public string $address = '';

  public function save() {
    dd($this->address);
  }

  public function render()
  {
    return view('livewire..company.create');
  }
}

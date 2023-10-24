<div>

  <x-jodit wire:model="address" />

  {{ $address }}

  <button
    wire:click="save">
    Check
  </button>
</div>

<div>
  <button @click="showModal = true">
    Open
  </button>

  @teleport('#modal-body')
    <livewire:contact.create />
  @endteleport

</div>

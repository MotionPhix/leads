<article class="flex flex-col items-center gap-4 py-10 text-gray-500">

  <x-tabler-user
    stroke-width="1.5"
    stroke="currentColor"
    class="w-24 h-24 p-1 rounded-full bg-lime-500 text-lime-200" />

  <h2 class="text-xl font-medium sm:text-xl">
    You don't have any contacts yet!
  </h2>

  <p>

    <a
      href="{{ route('contacts.create') }}"
      aria-label="modal dialogue to create a new contact"
      class="inline-flex items-center gap-2 px-4 py-3 font-semibold text-white transition rounded-full bg-lime-500 hover:bg-lime-700"
      wire:navigate>

      <x-tabler-plus stroke-width="2" />

      <span>
        Add Contact
      </span>

    </a>

  </p>

</article>

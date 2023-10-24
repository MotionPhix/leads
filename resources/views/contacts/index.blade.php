<x-app-layout>

  <x-slot:header>

    <h2 class="text-xl font-semibold leading-tight text-gray-800">

    {{ __('Explore Contacts') }}

    </h2>

    <span class="flex-1"></span>

    <x-button
      type="button"
      @click="showModal = true"
      aria-label="modal dialogue to create a new article">
      New
    </x-button>

    @teleport('#modal-body')
      <div x-show="showModal">
        <livewire:contact.create />
      </div>
    @endteleport

  </x-slot>

  <section class="max-w-full px-6 py-12 mx-auto space-y-6 sm:px-0">

    {{-- <x-table>

      @if ($contacts->count())
      <x-slot name="head">

        <x-table.heading
          sortable
          wire:click="sortBy('first_name')"
          :direction="$field === 'first_name' ? $direction : null">
          Full Name
        </x-table.heading>

        <x-table.heading
          sortable
          wire:click="sortBy('email')"
          :direction="$field === 'email' ? $direction : null">
          Email
        </x-table.heading>

        <x-table.heading sortable>
          Phone
        </x-table.heading>

        <x-table.heading
          sortable
          wire:click="sortBy('status')"
          :direction="$field === 'status' ? $direction : null">
          Status
        </x-table.heading>

        <x-table.heading />

      </x-slot>
      @endif

      <x-slot name="body">

        @forelse ($contacts as $contact)

          @unless ($contact->archived)

            <x-table.row>

              <x-table.cell>
                {{ $contact->full_name }}
              </x-table.cell>

              <x-table.cell>
                {{ $contact->email }}
              </x-table.cell>

              <x-table.cell class="flex items-center gap-1">
                @if(!$contact->phones->isEmpty())
                  <IconDeviceMobile class="text-gray-500" />
                @endif

                <span>

                  {{
                    $contact->phones->isEmpty()
                      ? 'No phone numbers found'
                      : $contact->phones->first()->number
                  }}

                </span>
              </x-table.cell>

              <x-table.cell>
                <span
                  class="{{ $contact->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-rose-100 text-rose-800' }} inline-flex items-center px-2.5 py-0.5 rounded text-xs font-semibold leading-4 capitalize">
                  {{ $contact->status }}
                </span>
              </x-table.cell>

              <x-table.cell class="flex items-center gap-2 text-right">

                <Link
                  modal
                  href="{{ route('contacts.show', $contact) }}">
                  <IconId class="w-5 h-5" />
                </Link>

                <Link
                  modal
                  href="{{ route('contacts.edit', $contact) }}">
                  <IconPencil class="w-5 h-5" />
                </Link>

                <Link
                  method="delete"
                  confirm="{{ 'Delete ' . $contact->full_name }}"
                  confirm-button="Yes! Why not?"
                  cancel-button="No! Wait a minute"
                  confirm-text="Really delete this contact? This action is unreversible"
                  href="{{ route('contacts.destroy', $contact->id) }}">
                  <IconTrash class="w-5 h-5" />
                </Link>

              </x-table.cell>

            </x-table.row>

          @endunless

        @empty

          <x-table.row>

            <x-table.cell colspan="5">

              <article class="flex flex-col items-center gap-4 py-10 text-gray-500">

                <IconUser
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-24 h-24 p-1 rounded-full bg-lime-500 text-lime-200" />

                <h2 class="text-xl font-medium sm:text-xl">
                  You don't have any contacts yet!
                </h2>

                <p>

                  <Link
                    modal
                    href="{{ route('contacts.create') }}"
                    aria-label="modal dialogue to create a new contact"
                    class="inline-flex items-center gap-2 px-4 py-3 font-semibold text-white transition rounded-full bg-lime-500 hover:bg-lime-700">

                    <IconPlus stroke-width="2" />

                    <span>
                      Add Contact
                    </span>

                  </Link>

                </p>

              </article>

            </x-table.cell>

          </x-table.row>

        @endforelse

      </x-slot>

    </x-table> --}}



    @forelse ($contacts as $contact)

      <x-contact-card
        :contact="$contact"
        class="bg-brand-task-dark hover:bg-brand-task dark:bg-brand-task dark:hover:bg-brand-task-dark"
       />

    @empty

      <article class="flex flex-col items-center gap-4 py-10 text-gray-500">

        <x-tabler-id
          stroke-width="1.5"
          class="w-24 h-24 p-2 stroke-white rounded-full bg-lime-700" />

        <h2 class="text-xl font-medium sm:text-xl">
          You don't have any contacts yet!
        </h2>

        <p>

          <Link
            modal
            href="{{ route('contacts.create') }}"
            aria-label="modal dialogue to create a new contact"
            class="inline-flex items-center gap-2 px-4 py-3 font-semibold text-white transition rounded-lg bg-lime-500 hover:bg-lime-700">

            <x-tabler-plus
              stroke-width="4" />

            <span>
              Add Contact
            </span>

          </Link>

        </p>

      </article>

    @endforelse
  </section>

</x-app-layout>

<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Explore contacts') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

      <div class="hidden p-4 bg-white shadow sm:block sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">

          <x-table>

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
                        <x-tabler-device-tablet class="text-gray-500" />
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
                        <x-tabler-id class="w-5 h-5" />
                      </Link>

                      <a
                        href="{{ route('contacts.edit', $contact) }}">
                        <x-tabler-pencil class="w-5 h-5" />
                      </a>

                      <a
                        method="delete"
                        href="{{ route('contacts.destroy', $contact->id) }}"
                        navigate>
                        <x-tabler-trash class="w-5 h-5" />
                      </a>

                    </x-table.cell>

                  </x-table.row>

                @endunless

              @empty

                <x-table.row>

                  <x-table.cell colspan="5">

                    <x-contacts-not-found />

                  </x-table.cell>

                </x-table.row>

              @endforelse

            </x-slot>

          </x-table>

        </div>
      </div>

      <div class="p-4 bg-white shadow sm:hidden">
        <div class="max-w-xl">

          @forelse ($contacts as $contact)

            <x-contact-card
              :contact="$contact"
              class="bg-brand-task-dark hover:bg-brand-task dark:bg-brand-task dark:hover:bg-brand-task-dark" />

          @empty

            <x-contacts-not-found />

          @endforelse

        </div>
      </div>

    </div>
  </div>
</x-app-layout>

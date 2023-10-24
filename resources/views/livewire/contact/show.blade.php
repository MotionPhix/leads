<article>

  <x-slot:header>

    <a
      href="{{ route('contacts.index') }}"
      class="text-lg flex items-center font-semibold hover:text-lime-900">

      <x-tabler-arrow-left class="w-5 h-5" />

      <span>All Contacts</span>

    </a>

    <span class="flex-1"></span>

    <x-btn.primary
      class="flex items-center mr-1 font-semibold text-lime-600 hover:text-lime-800"
      @click="showModal = true; intent = '{{ 'update_' . $contact->id }}'">

      <x-tabler-pencil class="w-5 h-5" />

      <span class="hidden sm:inline-flex px-2">
        Update
      </span>

    </x-btn.primary>

    <a
      class="flex items-center font-semibold text-rose-600 hover:text-rose-800"
      href="{{ route('contacts.destroy', $contact) }}"
      confirm-text="Really delete this contact?"
      confirm="{{ 'Delete ' . $contact->full_name }}"
      confirm-button="Yes! Why not?"
      cancel-button="No! Wait a minute"
      method="delete">

      <x-tabler-trash class="w-5 h-5" />

      <span class="hidden sm:inline-flex px-2">

        Delete

      </span>

    </a>

  </x-slot>

  <section class="py-12 mb-24 bg-gray-100">

    <div class="pb-8 border-b">

      <h1 class="mb-4 text-4xl font-medium">
        {{ $contact->fullname }}
      </h1>

      <section class="my-8 flex gap-4 items-start">

        <x-tabler-address-book class="w-16 h-16 bg-lime-300 rounded-lg p-1" />

        <div class="flex flex-col">

          <p class="font-medium flex flex-col sm:flex-row items-start sm:items-center gap-4">

            <span class="text-xl">
              {{ $contact->job_title }}
            </span>

            @isset($contact->company)

              <span class="hidden sm:inline-block h-2 w-2 rounded-full {{ $contact->status === 'active' ? 'bg-green-500' : 'bg-rose-500' }}" />


              <a
                wire:navigate
                class="text-gray-400 text-lg hover:text-blue-500"
                href="{{ route('companies.show', $contact?->company_id) }}">
                {{ $contact?->company?->name }}
              </a>

            @endisset

          </p>

          @isset($contact->phones)
            <p class="mt-2 text-gray-600">
              @foreach ($contact->phones as $phone)
                <div class="flex items-center gap-2">

                  <x-dynamic-component
                    :component="$phone->type === 'home' ? 'tabler-phone' : ($phone->type === 'work' ? 'tabler-device-landline-phone' : 'tabler-device-mobile')" />

                  <span class="block">
                    {{ $phone->number }}
                  </span>

                </div>
              @endforeach
            </p>
          @endisset

          <div class="text-gray-500 flex items-center gap-2">

            <x-tabler-mail />

            <span>
              {{ $contact->email }}
            </span>

          </div>

        </div>

      </section>

      @isset($contact->bio)

        <h3 class="text-2xl font-thin mt-10 mb-8">
          Notes
        </h3>

        <article class="font-medium text-gray-600">
          {!! $contact->bio !!}
        </article>

      @endisset

      <x-divider></x-divider>

      <section class="mt-10 mb-4 flex justify-between items-center">

        <h3 class="text-2xl font-thin">
          Company
        </h3>

        <x-btn.secondary
          @click="showModal = true; intent = 'create_company'">
          <span>Add</span> <x-tabler-plus class="w-4" />
        </x-btn.secondary>

      </section>

      <x-divider></x-divider>

      @isset($contact->interactions)

        <h3 class="text-2xl font-thin mt-10 mb-4">
          Interactions
        </h3>

        <article class="font-medium text-gray-600">

          <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-16">

            <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">

              <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                  08:00 - 09:00
                </p>

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  <a href="#" class="hover:underline">Opening remarks</a>
                </h3>
              </div>

            </div>

          </div>

        </article>

      @endisset

    </div>

  </section>

  @teleport('#modal-body')
    <div x-show="intent === '{{ 'update_' . $contact->id }}'">
      <livewire:contact.update :contact="$contact" />
    </div>
  @endteleport

  @teleport('#modal-body')
    <div x-show="intent === 'create_company'">
      <livewire:company.create :contact="$contact" />
    </div>
  @endteleport
</article>

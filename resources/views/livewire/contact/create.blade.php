<span>
  <div class="flex items-center justify-between pb-4 mb-4 border-b rounded-t sm:mb-5 dark:border-gray-600">

    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Add Contact
    </h3>

    <button
      type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
      @click="showModal = false">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <span class="sr-only">Close modal</span>
    </button>

  </div>

  <form
    class="grid grid-cols-2 gap-6"
    wire:submit="save">

    <div
      class="col-span-2 sm:col-span-1">

      <x-input-label
        class="mb-1">
        First name
      </x-input-label>

      <x-text-input
        wire:model="form.first_name"
        placeholder="Enter contact's first name" />

      <x-input-error
        :messages="$errors->get('form.first_name')"
        class="mt-1" />

    </div>

    <div
      class="col-span-2 sm:col-span-1">

      <x-input-label
        class="mb-1">
        Last name
      </x-input-label>

      <x-text-input
        wire:model="form.last_name"
        placeholder="Enter contact's last name" />

      <x-input-error
        :messages="$errors->get('form.last_name')"
        class="mt-1" />

    </div>

    <div
      class="col-span-2 sm:col-span-1">

      <x-input-label
        class="mb-1">
        Job Position
      </x-input-label>

      <x-text-input
        wire:model="form.job_title"
        placeholder="Provide contact's position" />

      <x-input-error
        :messages="$errors->get('form.job_title')"
        class="mt-1" />

    </div>

    <div
      class="col-span-2 sm:col-span-1">

      <x-input-label
        class="mb-1">
        Email Address
      </x-input-label>

      <x-text-input
        wire:model="form.email"
        placeholder="Enter contact's email" />

      <x-input-error
        :messages="$errors->get('form.email')"
        class="mt-1" />

    </div>

    <section
      class="flex items-center justify-end col-span-2 gap-2">

      <x-primary-button
        class="px-3 py-1.5 border-2 text-lime-100 border-lime-500 bg-lime-500 hover:bg-lime-700 hover:border-lime-700 transition"
        type="submit">
        <span wire:loading.remove>
          Save
        </span>

        <div wire:loading>
          <x-spinner class="la-sm" />
        </div>
      </x-primary-button>

      <button
        @click="showModal = false; wire:reset"
        type="button"
        class="font-semibold rounded-lg px-3 py-1.5 border-2 border-lime-500 hover:border-lime-700">
        Cancel
      </button>
    </section>

  </form>
</span>

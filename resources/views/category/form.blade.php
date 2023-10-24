  <x-splade-modal
    max-width="md"
    position="top">

    <x-modal-title>
      Add category
    </x-modal-title>

    <x-splade-form
      class="flex flex-col gap-5"
      action="{{ route('categories.store', $category) }}"
      preserve-scoll
      method="post">

      <x-splade-input
        name="name"
        label="Category"
        placeholder="Enter a category eg. Supplier" />

      <x-splade-submit
        class="bg-lime-500 hover:bg-lime-700 transition"
        type="submit"
        label="Craete" />

    </x-splade-form>

  </x-splade-modal>

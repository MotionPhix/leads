<x-app-layout>

  <x-slot:header>

    <h2 class="text-xl font-semibold leading-tight text-gray-800">

      <span class="block sm:hidden">{{ __('Companies') }}</span>
      <span class="hidden sm:block">{{ __('Explore Companies') }}</span>

    </h2>

    <span class="ml-4">
      {{ $companies->links() }}
    </span>

    <span class="flex-1"></span>

    @if ($companies->count())

      <x-button
        href="{{ route('companies.create') }}"
        aria-label="modal dialogue for creating new companies"
        preserve-scroll
        modal>
        New <span class="hidden ml-2 sm:inline-block">Company</span>
      </x-button>

    @endif

    <span class="mx-1.5"></span>

    <x-splade-link
      preserve-scroll
      href="{{ route('categories.create') }}"
      class="p-2 transition duration-300 rounded-lg bg-lime-700 text-lime-50 hover:bg-lime-500"
      aria-label="modal dialogue for creating new categories"
      modal>
      <x-tabler-category class="w-5 h-5"  />
    </x-splade-link>

  </x-slot>

  <section class="grid grid-cols-2 gap-6 py-12 mb-20 bg-gray-100">

    @forelse ($companies as $company)

      @unless ($company->cancelled)

      <div class="col-span-2 sm:col-span-1">
        <x-company-card :company="$company" />
      </div>

      @endunless

    @empty

      <article class="flex col-span-2 flex-col items-center gap-4 py-10 text-gray-500">

        <x-tabler-building-skyscraper
          class="w-24 h-24 rounded-full p-2 bg-lime-700 stroke-white"
          stroke-width="1.5" />

        <h2 class="text-xl font-medium sm:text-xl">
          You haven't added any companies yet!
        </h2>

        <p>

          <Link
            modal
            href="{{ route('companies.create') }}"
            aria-label="modal dialogue to create a new company"
            class="inline-flex items-center gap-2 px-4 py-3 font-semibold text-white transition rounded-lg bg-lime-500 hover:bg-lime-700"
            preserve-scroll>

            <x-tabler-plus
              stroke-width="3"
              stroke="currentColor" />

            <span>
              Create company
            </span>

          </Link>

        </p>

      </article>

    @endforelse

  </section>

</x-app-layout>

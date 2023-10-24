@props(['contact', 'icon' => 'tabler-address-book'])

<a
  href="{{ route('contacts.show', $contact) }}"
  class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-lime-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow shadow-lime-500/20 dark:shadow-none flex h-full motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-lime-500"
  wire:navigate>

  <div class="w-full">

    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-lime-50 dark:bg-lime-800/20">
      <x-dynamic-component
        stroke-width="2"
        class="w-8 h-8 stroke-lime-500 dark:stroke-lime-100"
        :component="$icon" />
    </div>

    <h2 class="mt-6 text-2xl font-semibold text-gray-900 dark:text-white">
      {{ $contact->fullname }}
    </h2>

    <p class="text-sm font-medium leading-relaxed text-gray-500 dark:text-lime-400">
      {{ $contact->job_title }}
    </p>

    @isset($contact->company)

      <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-slate-100">
        {!! $contact->company->address !!}
      </p>

    @endisset

  </div>

  <x-tabler-arrow-up-right
    stroke-width="1.5"
    class="self-center w-6 h-6 ml-6 shrink-0 stroke-lime-500 dark:stroke-slate-100" />
</a>

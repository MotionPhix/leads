{{-- @props(['contact'])

<div class="p-4 rounded-lg shadow bg-brand-cancelled">
  <div class="flex flex-col justify-between gap-3 mb-2">
    <div class="flex justify-between mb-1 text-gray-600">
      <p class="flex items-center gap-2">
        <span>
          <x-phosphor-star class="w-4" />
        </span>

        <span class="text-sm">
          {{ $contact->project->end_date->diffForHumans() }}
        </span>
      </p>

      <Link href="{{ route('contacts.show', $contact->project->id) }}">
        <x-phosphor-arrow-square-out class="w-4" />
      </Link>
    </div>

    <div class="text-2xl text-gray-500">
      {{ $contact->title }}
    </div>

    <div class="flex justify-end gap-2 font-semibold">
      <span>
        <x-phosphor-user-bold class="w-4 text-gray-400" />
      </span>
      <span class="text-xs text-gray-400">
        {{ $contact->user->name }}
      </span>
    </div>
  </div>
</div> --}}

@props(['contact', 'icon' => 'tabler-clock'])

<div
  {{ $attributes->class('p-3 rounded-lg shadow group transition duration-300 ease-in-out') }}>

  <div class="flex flex-col justify-between mb-2">

    <p class="text-3xl font-thin leading-none text-gray-500">
      {{ $contact->first_name . ' ' . $contact->last_name }}
    </p>

    <div class="flex justify-between text-gray-600">

      <p class="flex items-center gap-2">

        <span>
          <x-tabler-address-book class="w-4 text-gray-400" />
        </span>

        <span class="text-sm text-gray-600">
          {{ $contact->job_title }}
        </span>

      </p>

      <div class="flex items-center gap-4">

        <Link href="{{ route('contacts.show', $contact) }}" preserve-scroll>
          <x-tabler-mail class="w-4 transition duration-300 ease-in-out group-hover:text-rose" />
        </Link>

        <Link href="{{ route('contacts.show', $contact) }}" preserve-scroll>
          <x-tabler-external-link class="w-4 transition duration-300 ease-in-out group-hover:text-rose" />
        </Link>

      </div>

    </div>

    <div class="flex justify-between pt-4 mt-6 border-t">

      <span class="font-medium text-gray-600">
        {{-- {{ $contact->company->name }} --}}
      </span>

      <div class="flex items-center gap-2">

        <x-dynamic-component :component="$icon" class="w-4" />

        <span class="text-sm">
          {{ $contact->created_at->diffForHumans() }}
        </span>

      </div>

    </div>
  </div>
</div>

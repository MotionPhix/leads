@props([
  'sortable' => null,
  'direction' => null,
])

<th {{ $attributes->merge(['class' => 'font-medium px-6 py-3 dark:text-gray-200 bg-cool-gray-50'])->only('class') }}>

  @unless ($sortable)

    <span
      class="text-xs text-left leading-4 uppercase tracking-wider">
      {{ $slot }}
    </span>

  @else

    <button
      {{ $attributes->except('class') }}
      class="text-xs text-left leading-4 uppercase flex items-center space-x-2 group focus:outline-none focus:underline">
      <span>
        {{ $slot }}
      </span>

      <span>
        @if($direction === 'asc')

          <IconChevronUp class="w-3 h-3" />

        @elseif ($direction === 'desc')

          <IconChevronDown class="w-3 h-3" />

        @else

          <IconArrowUp
            class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" />

        @endif

      </span>

    </button>

  @endunless
</th>

@if ($paginator->hasPages())
<nav
  role="navigation" aria-label="Pagination Navigation" class="flex justify-between gap-1">
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
  <span
    class="relative inline-flex items-center p-1.5 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-default">
    <x-tabler-arrow-down-left stroke-width="2" class="stroke-current" />
  </span>
  @else
  <x-splade-link
    href="{{ $paginator->previousPageUrl() }}"
    class="relative inline-flex items-center p-1.5 text-sm font-medium leading-5 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-lg text-lime-700 hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700"
    preserve-scroll
    rel="prev">
    <x-tabler-arrow-left stroke-width="2" class="stroke-current" />
  </x-splade-link>
  @endif

  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
  <x-splade-link
    href="{{ $paginator->nextPageUrl() }}"
    class="relative inline-flex items-center p-1.5 text-sm font-medium leading-5 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-lg text-lime-700 hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700"
    preserve-scroll
    rel="next">
    <x-tabler-arrow-right stroke-width="2" class="stroke-current" />
  </x-splade-link>
  @else
  <span
    class="relative inline-flex items-center p-1.5 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-default">
    <x-tabler-arrow-down-right class="stroke-current" />
  </span>
  @endif
</nav>
@endif

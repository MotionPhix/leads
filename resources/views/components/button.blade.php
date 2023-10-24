<button
  {{ $attributes->except('class') }}
  class="group inline-flex items-center rounded-lg bg-lime-500 px-4 py-1.5 font-semibold text-white transition hover:bg-lime-700">

  {{ $slot }}

  <svg class="mt-0.5 ml-2 -mr-1 stroke-white stroke-2" fill="none" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
    <path class="transition opacity-0 group-hover:opacity-100" d="M0 5h7"></path>
    <path class="transition group-hover:translate-x-[3px]" d="M1 1l4 4-4 4"></path>
  </svg>

</button>

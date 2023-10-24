<footer class="fixed bottom-0 left-0 right-0 max-w-3xl px-6 mx-auto text-gray-600">
  <div class="flex flex-col items-center py-8 mx-auto sm:flex-row">
    <a
      wire:navigate
      class="flex items-center justify-center font-medium text-gray-900 md:justify-start"
      href="{{ route('dashboard') }}">
      <x-application-logo
          class="w-10 h-10 p-2 text-white rounded-full fill-current bg-lime-500" />
      <span class="ml-3 text-xl">{{ config('app.name') }}</span>
    </a>

    <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">
      © {{ date('Y') }} {{ config('app.name') }} —
      <span class="text-xs text-gray-400">developed by kingsley</span>
    </p>

    <span class="inline-flex justify-center mt-4 sm:ml-auto sm:mt-0 sm:justify-start">

      <a class="text-gray-500">
        <x-tabler-brand-meta class="w-5 h-5 stroke-current" />
      </a>

      <a
        wire:navigate
        class="ml-3 text-gray-500"
        href="https://twitter.com/_motionplus"
        target="_blank">
        <x-tabler-brand-x class="w-5 h-5 stroke-current" />
      </a>

      <a class="ml-3 text-gray-500">
        <x-tabler-brand-linkedin class="w-5 h-5 stroke-current" />
      </a>

    </span>
  </div>
</footer>

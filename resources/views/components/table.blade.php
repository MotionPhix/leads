<div class="align-middle min-w-full overflow-x-auto border-b dark:border-gray-700 overflow-hidden sm:rounded-lg">
  <table class="min-w-full text-sm text-gray-500 dark:text-gray-400">
    <thead
      class="bg-gray-50 dark:bg-gray-700 divide-y divide-cool-gray-200 dark:divide-cool-gray-700">
      <tr>
        {{ $head ?? '' }}
      </tr>
    </thead>

    <tbody class="bg-white divide-y divide-cool-gray-200 dark:bg-gray-800 dark:divide-gray-700">
      {{ $body ?? '' }}
    </tbody>
  </table>
</div>

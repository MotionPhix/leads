<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? config('app.name') }}</title>

  <link
	rel="stylesheet"
	href="https://unpkg.com/jodit@4.0.0-beta.24/es2021/jodit.min.css"
/>
<script src="https://unpkg.com/jodit@4.0.0-beta.24/es2021/jodit.min.js"></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="{ showModal: false, intent: null }">
  <div class="min-h-screen bg-gray-100">
    <livewire:layout.navigation />

    <!-- Page Heading -->
    @isset($header)

    <header class="sticky top-0 z-20 bg-white shadow">

      <div class="flex items-center max-w-full px-6 py-3 mx-auto sm:max-w-3xl sm:px-6 lg:px-8">

        {{ $header }}

      </div>

    </header>

    @endisset

    <!-- Page Content -->

    <main class="relative z-10 max-w-full px-6 mx-auto sm:max-w-3xl">

      {{ $slot }}

    </main>

    <x-footer />

  </div>

  <div
    class="fixed top-0 left-0 z-40 w-full h-full transition duration-300 bg-gray-700 bg-opacity-50"
    x-show="showModal"
    x-cloak>
    <div
      class="relative max-w-2xl p-4 mx-auto mt-12 bg-white rounded-lg shadow-lg dark:bg-gray-800 sm:p-5"
      id="modal-body">
    </div>
  </div>
</body>
</html>

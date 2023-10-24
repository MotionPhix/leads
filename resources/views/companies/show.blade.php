<x-app-layout>

  <x-slot:header>

    <Link
      href="{{ route('companies.index') }}"
      class="text-lg flex items-center font-semibold hover:text-lime-900">

      <x-tabler-arrow-left class="w-5 h-5" />

      <span>All companies</span>

    </Link>

    <span class="flex-1"></span>

    <Link
      class="flex items-center mr-3 font-semibold text-lime-600 hover:text-lime-800"
      href="{{ route('companies.edit', $company) }}"
      modal>

      <x-tabler-pencil class="w-5 h-5" />

      <span class="hidden sm:inline-flex px-2">
        Edit
      </span>

    </Link>

    <x-splade-link
      class="flex items-center font-semibold text-rose-600 hover:text-rose-800"
      href="{{ route('companies.destroy', $company) }}"
      confirm-text="Really delete this company?"
      confirm="Delete Company"
      confirm-button="Yes!"
      cancel-button="No!"
      method="delete"
      preserve-scroll>

      <x-tabler-trash class="w-5 h-5" />

      <span class="hidden sm:inline-flex px-2">

        Delete

      </span>

    </x-splade-link>

  </x-slot>

  <section class="max-w-4xl mx-auto my-12 px-6 sm:px-0">

    <div class="border-b">

      <span class="text-sm text-green-900 bg-green-100 rounded px-2 py-1">

        {{ $company->category->name }}

      </span>

      <article class="max-w-full flex items-center justify-between">
        <h3 class="text-4xl font-thin">
          {{ $company->name }}
        </h3>

        <x-splade-link
          class="flex items-center mr-3 font-semibold text-lime-600 hover:text-lime-800"
          href="{{ route('contacts.create') }}"
          modal>

          <x-tabler-user-plus class="w-5 h-5" />

          <span class="hidden sm:inline-flex px-2">
            New contact
          </span>

        </x-splade-link>
      </article>

      <p class="font-medium max-w-xl text-gray-500">
        {{ $company->slogan }}
      </p>

      <section class="my-8 flex flex-col gap-4 items-start">

        <x-tabler-map-pin class="w-12 h-12 bg-lime-300 rounded-lg p-1" />

        <div class="flex flex-col">

          <span class="font-gray-600 text-lg">

            {!! $company->address !!}

          </span>

          @isset($company->website)
            <div class="mt-4 flex items-center gap-2">
              <span
                class="font-medium text-lg text-gray-500">
                {{ $company->website }}
              </span>

              <span class="w-px h-6 bg-gray-600 block"></span>

              <a
                href="https://{{ $company->website }}"
                class="bg-lime-200 text-lime-900 px-2 py-1 rounded hover:bg-lime-900 hover:text-lime-200 transtion duration-300"
                target="_blank">
                <small class="flex gap-1 items-center font-medium">
                  <span>Visit</span> <x-tabler-external-link class="w-4 h-4" />
                </small>
              </a>

            </div>
          @endisset

        </div>

      </section>

    </div>

    @if ($company->contacts()->count())

      <div class="mt-8">

        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Contacts
        </h3>

        <section class="mt-8 border-t">

          <ul class="mt-8 divide-y divide-slate-200 dark:divide-slate-100">

            @foreach ($company->contacts as $contact)

              <article class="flex items-start space-x-6 p-4">

                <img
                  src="https://th.bing.com/th/id/R.357b936e5d734084d657870057290a0c?rik=%2fbeI2wGhmmTG7A&riu=http%3a%2f%2f4.bp.blogspot.com%2f_r6d5eOyMrpw%2fTLGRHY1mbUI%2fAAAAAAAAADY%2fbuiEUY2LXGs%2fw1200-h630-p-k-no-nu%2f123.png&ehk=1kyJCH0pU0DioQfe81uX%2bRj5kR2psd4tzwA%2bcJlf56Y%3d&risl=&pid=ImgRaw&r=0"
                  alt="" width="60" height="100"
                  class="flex-none object-cover rounded-md bg-slate-100 h-20" />

                <div class="min-w-0 relative flex-auto">

                  <h2 class="font-semibold text-slate-900 truncate pr-20">{{ $contact->full_name }}</h2>

                  <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">

                    <div class="absolute top-0 right-0 flex items-center space-x-1">

                      <dt class="text-lime-500">

                        <span class="sr-only">
                          See contact's details
                        </span>

                        <Link
                          href="{{ route('contacts.show', $contact) }}">
                          <x-tabler-arrow-up-right class="w-6" />
                        </Link>
                      </dt>

                      <dd>{{ $contact->starRating }}</dd>

                    </div>

                    <div>

                      <dt class="sr-only">Status</dt>

                      <dd class="px-1.5 ring-1 ring-lime-300 bg-lime-200 rounded capitalize">
                        {{ $contact->status }}
                      </dd>

                    </div>

                    <div>

                      <dt class="sr-only">Email</dt>

                      <dd class="flex items-center">

                        <svg width="2" height="2" fill="currentColor" class="mx-2 text-slate-300" aria-hidden="true">
                          <circle cx="1" cy="1" r="1" />
                        </svg>

                        {{ $contact->email }}
                      </dd>

                    </div>

                    <div class="flex-none w-full mt-2 font-normal">

                      <dt class="sr-only">Position</dt>

                      <dd class="text-slate-400">{{ $contact->job_title }}</dd>

                    </div>

                  </dl>

                </div>

              </article>

            @endforeach

          </ul>

        </section>

      </div>

    @endif

  </section>

</x-app-layout>

<div>
    @livewire('flash-container')
    <x-card>
        <x-slot name="title">
            {{ __('Profile') }}
        </x-slot>
        <x-slot name="body">
          <form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
            <!-- Profile section -->
            <div class="py-6 px-4 sm:p-6 lg:pb-8">
              <div class="flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                  <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                      Username
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                      <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300" value="deblewis">
                    </div>
                  </div>
                    <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                      Email
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                      <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300" value="deblewis">
                    </div>
                  </div>
                    <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                      Roles
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                      <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300" value="deblewis">
                    </div>
                  </div>
                </div>

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                  <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                    Photo
                  </p>
                  <div class="mt-1 lg:hidden">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                        <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                      </div>
                      <div class="ml-5 rounded-md shadow-sm">
                        <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                          <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                          </label>
                          <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hidden relative rounded-full overflow-hidden lg:block">
                    <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                      <span>Change</span>
                      <span class="sr-only"> user photo</span>
                      <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-card>
</div>

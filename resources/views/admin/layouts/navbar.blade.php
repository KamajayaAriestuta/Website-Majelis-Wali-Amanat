<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
  <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
    <!-- Breadcrumb -->
    <nav>
      <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        <li class="text-sm leading-normal">
          <a class="text-white opacity-50" href="javascript:;">Pages</a>
        </li>
        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">
          Dashboard
        </li>
      </ol>
      <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
    </nav>

    <!-- Right Side -->
    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
      <!-- Search -->
      <div class="flex items-center md:ml-auto md:pr-4">
        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
          <span class="absolute z-50 flex items-center h-full pl-3 text-sm text-slate-500">
            <i class="fas fa-search"></i>
          </span>
          <input
            type="text"
            class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 block flex-auto rounded-lg border border-solid border-gray-300 bg-white py-2 pr-3 text-gray-700 placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
            placeholder="Type here..."
          />
        </div>
      </div>

      <!-- Menu Items -->
      <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
        <!-- Profile Dropdown -->
        <li class="relative flex items-center">
          <div x-data="{ open: false }" class="relative">
            <!-- Trigger -->
            <button @click="open = ! open" class="flex items-center px-3 py-2 text-sm font-semibold text-white bg-transparent rounded-md focus:outline-none">
              <i class="fa fa-user sm:mr-1"></i>
              <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
              <svg class="w-4 h-4 ml-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              x-show="open"
              @click.away="open = false"
              class="absolute right-0 z-50 w-48 py-2 mt-2 bg-white rounded-lg shadow-lg"
            >
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Profile
              </a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                  type="submit"
                  class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >
                  Log Out
                </button>
              </form>
            </div>
          </div>
        </li>

        <!-- Optional icons -->
        <li class="flex items-center pl-4 xl:hidden">
          <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
            <div class="w-4.5 overflow-hidden">
              <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
              <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
              <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
            </div>
          </a>
        </li>
        <li class="flex items-center px-4">
          <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
            <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

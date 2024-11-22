<nav class="bg-gray-800" x-data="{ isOpen: false, isDropdownOpen: false }">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <!-- Desktop Navigation -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
          </div>
        </div>
      </div>
      <!-- User Menu -->
      <div class="hidden md:flex items-center space-x-4">
        @auth
          <!-- Dropdown Menu -->
          <div class="relative">
            <button @click="isDropdownOpen = !isDropdownOpen" class="flex items-center text-white hover:text-gray-300 focus:outline-none">
              <span>Welcome, {{ auth()->user()->name }}</span>
              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="isDropdownOpen" @click.away="isDropdownOpen = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 z-20">
              <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">Dashboard</a>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transform transition duration-200 hover:scale-105 hover:shadow-lg">
                  Logout
                </button>
              </form>
            </div>
          </div>
        @else
          <a href="/login" class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
            Login
          </a>
        @endauth
      </div>
      <!-- Mobile Menu Button -->
      <div class="-mr-2 flex md:hidden">
        <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">Open main menu</span>
          <svg x-show="!isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18m-18 6h18" />
          </svg>
          <svg x-show="isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Navigation -->
  <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="md:hidden">
    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
      <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
      <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
    </div>
    @auth
      <!-- Mobile Dropdown -->
      <div class="border-t border-gray-700 px-2 pt-4 pb-3 sm:px-3">
        <div class="text-gray-200 font-medium">Welcome, {{ auth()->user()->name }}</div>
        <div class="mt-3 space-y-1">
          <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 rounded-md">Dashboard</a>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white bg-red-600 hover:bg-red-700 rounded-md transform transition duration-200 hover:scale-105">
              Logout
            </button>
          </form>
        </div>
      </div>
    @else
      <div class="border-t border-gray-700 px-4 py-3">
        <a href="/login" class="block rounded-md bg-indigo-600 px-4 py-2 text-center text-white hover:bg-indigo-500">
          Login
        </a>
      </div>
    @endauth
  </div>
</nav>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Profil Saya</title>

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
</head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500" style="background: #3d5a73; min-height: 100vh;">
    <div class="absolute w-full bg-gradient-to-b from-blue-500 to-blue-500 dark:hidden min-h-75" style="opacity: 0;"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-hidden antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{ route('dashboard') }}">
          <img src="{{ asset('assets/img/sidebarlogin.png') }}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo" style="max-height: 43px;" />
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto overflow-hidden">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class="@if(Route::currentRouteName() === 'dashboard') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('dashboard') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="@if(Route::currentRouteName() === 'produk.index') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('produk.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pendataan Barang</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="@if(Route::currentRouteName() === 'penjualan.menu') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('penjualan.menu') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="@if(Route::currentRouteName() === 'stok.index') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('stok.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stok Barang</span>
            </a>
          </li>

          @if(Auth::user()->level === 'administrator')
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('penjualan.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-purple-500 ni ni-briefcase-24"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riwayat Transaksi</span>
              </a>
            </li>
          @endif

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="@if(Route::currentRouteName() === 'petugas.profile') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('petugas.profile') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-single-02"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profil Saya</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <form method="POST" action="{{ route('logout') }}" class="m-0">
              @csrf
              <button type="submit" class="w-full text-left dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-button-pause"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </div>

      <!-- User Info Section -->
      <div class="px-4 py-6 border-t border-slate-200 dark:border-slate-700">
        <div class="flex flex-col items-center text-center">
          @if(Auth::user()->profile_photo)
            <img src="{{ asset(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-slate-300 dark:border-slate-600 mb-3">
          @else
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center border-2 border-slate-300 dark:border-slate-600 mb-3">
              <i class="fas fa-user text-white text-sm"></i>
            </div>
          @endif
          <p class="text-sm font-bold text-slate-700 dark:text-white truncate max-w-full">{{ Auth::user()->name }}</p>
        </div>
      </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Petugas</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Profil Saya</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Profil Saya</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        @if ($message = Session::get('success'))
        <div class="mb-6 p-4 bg-emerald-500 text-white rounded-lg alert alert-success alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
          <!-- Profile Card -->
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
            <div class="p-6 text-center">
              @if(Auth::user()->profile_photo)
                <img src="{{ asset(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full object-cover border-4 border-slate-300 mx-auto mb-4">
              @else
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center border-4 border-slate-300 mx-auto mb-4">
                  <i class="fas fa-user text-white text-3xl"></i>
                </div>
              @endif
              <h5 class="mb-0 dark:text-white font-bold">{{ Auth::user()->name }}</h5>
              <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">{{ Auth::user()->email }}</p>
              <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold" style="background-color: #3d5a73; color: white;">
                {{ Auth::user()->level === 'administrator' ? 'Administrator' : 'Petugas' }}
              </div>
            </div>
          </div>

          <!-- Edit Form -->
          <div class="lg:col-span-2">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="capitalize dark:text-white">Edit Profil</h6>
              </div>
              <div class="p-6">
                <form method="POST" action="{{ route('petugas.update-profile') }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <!-- Foto Profil -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Foto Profil</label>
                    <input type="file" name="profile_photo" accept="image/jpeg,image/png,image/gif" class="block w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:text-white @error('profile_photo') border-red-500 @enderror">
                    @error('profile_photo')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Maksimal 2MB. Format: JPG, PNG, GIF</p>
                  </div>

                  <!-- Nama -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="block w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:text-white @error('name') border-red-500 @enderror">
                    @error('name')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <!-- Username -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}" class="block w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:text-white @error('username') border-red-500 @enderror">
                    @error('username')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <!-- Email (Read-only) -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" disabled class="block w-full px-3 py-2 border border-slate-300 rounded-lg bg-slate-100 dark:bg-slate-700 dark:border-slate-600 dark:text-slate-400 text-slate-500">
                  </div>

                  <!-- Password (Optional) -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Password Baru <span class="text-xs text-slate-500">(Kosongkan jika tidak ingin mengubah)</span></label>
                    <input type="password" name="password" class="block w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:text-white @error('password') border-red-500 @enderror">
                    @error('password')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <!-- Konfirmasi Password -->
                  <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="block w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                  </div>

                  <!-- Buttons -->
                  <div class="flex gap-3">
                    <button type="submit" class="px-6 py-3 text-white font-bold rounded-lg transition-colors" style="background-color: #3d5a73;">
                      <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 text-slate-700 font-bold rounded-lg border border-slate-300 transition-colors dark:text-white dark:border-slate-600">
                      <i class="fas fa-times"></i> Batal
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <footer class="pt-4 mt-6" style="border: none;">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-white lg:text-left">
                  © 2026 UI Cashier & Eatery by Nuzulia Nur Azizah. All rights reserved.
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>
  </body>
</html>

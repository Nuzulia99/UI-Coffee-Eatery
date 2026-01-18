<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Produk</title>
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

          @if(Auth::user()->level === 'administrator')
            <li class="mt-0.5 w-full">
              <a class="@if(Route::currentRouteName() === 'accounts.index') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('accounts.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
              </a>
            </li>
          @else
            <li class="mt-0.5 w-full">
              <a class="@if(Route::currentRouteName() === 'petugas.profile') py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @else dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors @endif" href="{{ route('petugas.profile') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-single-02"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profil Saya</span>
              </a>
            </li>
          @endif

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
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Data Produk</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Data Produk</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        @if ($message = Session::get('success'))
        <div class="mb-6 p-4 bg-emerald-500 text-white rounded-lg">
          {{ $message }}
        </div>
        @endif

        <!-- Category Cards Row -->
        <div class="flex flex-wrap -mx-3 mb-6">
          <!-- card1 - Drinks -->
          <a href="{{ route('produk.kategori', 'Drinks') }}" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer transition-transform hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Drinks</p>
                      <h5 class="mb-2 font-bold dark:text-white">{{ $produk->where('Kategori', 'Drinks')->count() }} Items</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-emerald-500">+{{ $salesData['drinksPercentage'] }}%</span>
                        orders today
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-600 to-cyan-500">
                      <i class="ni leading-none ni-cup text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card2 - Main Course -->
          <a href="{{ route('produk.kategori', 'Main Course') }}" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer transition-transform hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Main Course</p>
                      <h5 class="mb-2 font-bold dark:text-white">{{ $produk->where('Kategori', 'Main Course')->count() }} Items</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-emerald-500">+{{ $salesData['mainCoursePercentage'] }}%</span>
                        orders today
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-600 to-orange-400">
                      <i class="ni leading-none ni-utensils text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card3 - Snack -->
          <a href="{{ route('produk.kategori', 'Snack') }}" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer transition-transform hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Snack</p>
                      <h5 class="mb-2 font-bold dark:text-white">{{ $produk->where('Kategori', 'Snack')->count() }} Items</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-emerald-500">+{{ $salesData['snackPercentage'] }}%</span>
                        orders today
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card4 - Dessert -->
          <a href="{{ route('produk.kategori', 'Dessert') }}" class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4 cursor-pointer transition-transform hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Dessert</p>
                      <h5 class="mb-2 font-bold dark:text-white">{{ $produk->where('Kategori', 'Dessert')->count() }} Items</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-emerald-500">+{{ $salesData['dessertPercentage'] }}%</span>
                        orders today
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-pink-500 to-rose-400">
                      <i class="ni leading-none ni-favourite-28 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Form Tambah/Update Stok Produk -->
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="capitalize dark:text-white">Form Tambah/Update Stok Produk</h6>
          </div>
          <div class="p-6">
            @if ($errors->any())
              <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
              @csrf
              
              <!-- Mode Toggle -->
              <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <div class="flex mb-4" style="gap: 0.4cm;">
                  <label class="flex items-center cursor-pointer">
                    <input type="radio" id="modeExisting" name="mode" value="existing" checked class="mr-2"> Pilih Barang Existing
                  </label>
                  <label class="flex items-center cursor-pointer">
                    <input type="radio" id="modeNew" name="mode" value="new" class="mr-2"> Tambah Barang Baru
                  </label>
                </div>
              </div>

              <!-- Mode Existing (Pilih dari Dropdown) -->
              <div id="existingMode">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Nama Barang</label>
                  <select id="namaProdukSelect" name="NamaProduk" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600">
                    <option value="">Pilih Barang</option>
                    @foreach ($produk as $item)
                      <option value="{{ $item->NamaProduk }}" data-kategori="{{ $item->Kategori }}" data-harga="{{ $item->Harga }}" {{ old('NamaProduk') == $item->NamaProduk ? 'selected' : '' }}>{{ $item->NamaProduk }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Kategori</label>
                  <input type="text" id="kategoriInput" name="Kategori" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 bg-gray-100 dark:bg-slate-700" readonly>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Harga</label>
                  <input type="text" id="hargaDisplay" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 bg-gray-100 dark:bg-slate-700" readonly>
                  <input type="hidden" id="hargaInput" name="Harga">
                </div>
              </div>

              <!-- Mode New (Input Barang Baru) -->
              <div id="newMode" class="col-span-1 md:col-span-2 lg:col-span-4 hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Nama Barang Baru</label>
                    <input type="text" id="namaBaruInput" name="NamaProdukBaru" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" placeholder="Masukan nama barang baru">
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Upload Gambar</label>
                    <input type="file" id="gambarBaruInput" name="GambarBaru" accept="image/*" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600">
                    <small class="text-slate-500 dark:text-slate-400">Format: JPG, PNG, GIF (Max 2MB)</small>
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Kategori</label>
                    <select id="kategoriBaruSelect" name="KategoriBaru" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600">
                      <option value="">Pilih Kategori</option>
                      <option value="Drinks">Drinks</option>
                      <option value="Main Course">Main Course</option>
                      <option value="Snack">Snack</option>
                      <option value="Dessert">Dessert</option>
                    </select>
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Harga</label>
                    <input type="text" id="hargaBaruInput" name="HargaBaru" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" placeholder="Contoh: 21000 atau 21.000">
                  </div>
                </div>
              </div>

              <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Stok (Tambahan)</label>
                <input type="number" name="Stok" value="{{ old('Stok') }}" placeholder="Masukan jumlah stok tambahan" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>
              <div class="flex items-end" style="margin-top: 1.5cm;">
                <button type="submit" class="w-full text-white font-bold py-2 px-4 rounded-lg" style="background-color: #3d5a73;">
                  <i class="fas fa-plus"></i> Tambah/Update Stok
                </button>
              </div>
            </form>
          </div>
        </div>

        <footer class="pt-4">
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

    <script>
      const modeExisting = document.getElementById('modeExisting');
      const modeNew = document.getElementById('modeNew');
      const existingMode = document.getElementById('existingMode');
      const newMode = document.getElementById('newMode');
      const namaProdukSelect = document.getElementById('namaProdukSelect');
      const kategoriInput = document.getElementById('kategoriInput');
      const hargaDisplay = document.getElementById('hargaDisplay');
      const hargaInput = document.getElementById('hargaInput');
      const hargaBaruInput = document.getElementById('hargaBaruInput');

      function formatRupiah(angka) {
        return 'Rp. ' + parseInt(angka).toLocaleString('id-ID');
      }

      // Convert Indonesian number format to regular number
      function parseIndonesianNumber(str) {
        if (!str) return '';
        // Remove spaces
        str = str.trim();
        // Replace dots (thousands separator) with nothing
        str = str.replace(/\./g, '');
        // Replace comma (decimal separator) with dot
        str = str.replace(/,/g, '.');
        return str;
      }

      // Format number with thousands separator for display
      function formatNumberDisplay(num) {
        if (!num) return '';
        // Remove non-numeric characters except dot and comma
        num = num.toString().replace(/[^0-9.,]/g, '');
        // Convert to standard format first
        num = parseIndonesianNumber(num);
        // Split by decimal point
        let parts = num.split('.');
        let intPart = parts[0];
        let decPart = parts[1] || '';
        // Add thousands separator
        intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return decPart ? intPart + ',' + decPart : intPart;
      }

      // Handle harga input on change
      if (hargaBaruInput) {
        hargaBaruInput.addEventListener('input', function(e) {
          let value = e.target.value;
          let formatted = formatNumberDisplay(value);
          e.target.value = formatted;
        });

        // Handle form submission
        const form = hargaBaruInput.closest('form');
        if (form) {
          form.addEventListener('submit', function(e) {
            // Convert back to standard number format before sending
            let value = hargaBaruInput.value;
            let cleanValue = parseIndonesianNumber(value);
            hargaBaruInput.value = cleanValue;
          });
        }
      }

      // Mode toggle
      modeExisting.addEventListener('change', function() {
        if (this.checked) {
          existingMode.classList.remove('hidden');
          newMode.classList.add('hidden');
          namaProdukSelect.required = true;
          document.getElementById('namaBaruInput').required = false;
          document.getElementById('kategoriBaruSelect').required = false;
          document.getElementById('hargaBaruInput').required = false;
        }
      });

      modeNew.addEventListener('change', function() {
        if (this.checked) {
          existingMode.classList.add('hidden');
          newMode.classList.remove('hidden');
          namaProdukSelect.required = false;
          document.getElementById('namaBaruInput').required = true;
          document.getElementById('kategoriBaruSelect').required = true;
          document.getElementById('hargaBaruInput').required = true;
        }
      });

      namaProdukSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const kategori = selectedOption.getAttribute('data-kategori');
        const harga = selectedOption.getAttribute('data-harga');

        if (kategori && harga) {
          kategoriInput.value = kategori;
          hargaInput.value = harga;
          hargaDisplay.value = formatRupiah(harga);
        } else {
          kategoriInput.value = '';
          hargaInput.value = '';
          hargaDisplay.value = '';
        }
      });

      // Trigger change event jika ada nilai old (untuk reload page)
      if (namaProdukSelect.value !== '') {
        namaProdukSelect.dispatchEvent(new Event('change'));
      }
    </script>
  </body>
</html>

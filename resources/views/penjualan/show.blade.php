<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pembelian</title>
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
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
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
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('dashboard') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('produk.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pendataan Barang</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ route('penjualan.menu') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
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

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('stok.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stok Barang</span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account</h6>
          </li>

          @if(Auth::user()->level === 'administrator')
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('accounts.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
              </a>
            </li>
          @else
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('petugas.profile') }}">
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
      </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 rounded-xl overflow-auto">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Detail Pembelian</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Detail Pembelian #{{ $penjualan->PenjualanID }}</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        <div class="grid grid-cols-1 mb-6">
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="capitalize dark:text-white">Informasi Pembelian</h6>
            </div>
            <div class="p-6">
              <div class="grid grid-cols-2 gap-6">
                <div>
                  <p class="text-sm text-slate-500 dark:text-white/60 mb-1">Tanggal Pembelian</p>
                  <p class="text-lg font-semibold text-slate-700 dark:text-white">{{ \Carbon\Carbon::parse($penjualan->TanggalPenjualan)->format('d M Y') }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-white/60 mb-1">Nomor Pembelian</p>
                  <p class="text-lg font-semibold text-slate-700 dark:text-white">#{{ $penjualan->PenjualanID }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-white/60 mb-1">Nama Pelanggan</p>
                  <p class="text-lg font-semibold text-slate-700 dark:text-white">{{ $penjualan->pelanggan->NamaPelanggan }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-white/60 mb-1">Nomor Telepon</p>
                  <p class="text-lg font-semibold text-slate-700 dark:text-white">{{ $penjualan->pelanggan->NomorTelepon }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 mb-6">
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="capitalize dark:text-white">Detail Barang</h6>
            </div>
            <div class="overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">No</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Nama Barang</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Harga</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Jumlah</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($penjualan->detailPenjualan as $key => $detail)
                  <tr>
                    <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">{{ $key + 1 }}</p>
                    </td>
                    <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">{{ $detail->produk->NamaProduk }}</p>
                    </td>
                    <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">Rp {{ number_format($detail->produk->Harga, 0, ',', '.') }}</p>
                    </td>
                    <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">{{ $detail->JumlahProduk }}</p>
                    </td>
                    <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">Rp {{ number_format($detail->Subtotal, 0, ',', '.') }}</p>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="px-6 py-3 text-center text-sm font-semibold text-slate-400 dark:text-white">Tidak ada data</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="p-6 border-t border-slate-200 dark:border-slate-600">
              <div class="flex justify-end">
                <div class="w-full max-w-sm">
                  <div class="flex justify-between items-center py-2">
                    <span class="font-semibold text-slate-700 dark:text-white">Total Pembelian:</span>
                    <span class="text-lg font-bold text-blue-500">Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex gap-2">
          <a href="{{ route('penjualan.menu') }}" class="text-white font-bold text-2xl" style="background: none;">
            <
          </a>
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
  </body>
</html>

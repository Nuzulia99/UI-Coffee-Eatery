<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Dashboard Petugas</title>

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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Dashboard Petugas</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        <!-- Statistics Cards -->
        <div class="flex flex-wrap -mx-3 mb-6">
          <!-- Total Penjualan Hari Ini -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white text-sm">Total Penjualan</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-lg font-bold leading-normal text-gray-500" id="totalPenjualanValue">Rp {{ number_format($totalPenjualanHariIni, 0, ',', '.') }}</span>
                      </p>
                      <p class="text-xs text-gray-500 dark:text-white/60 mt-1" id="jumlahTransaksiValue">{{ $jumlahTransaksiHariIni }} transaksi</p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-600 to-emerald-400">
                      <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Produk Terlaris -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-2/3">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white text-sm">Produk Terlaris</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        @if($produkTerlaris)
                          <span class="text-sm font-bold leading-normal text-gray-700" id="produkTerlariValue">{{ $produkTerlaris->NamaProduk }}</span>
                        @else
                          <span class="text-sm font-bold leading-normal text-gray-500" id="produkTerlariValue">-</span>
                        @endif
                      </p>
                      <p class="text-xs text-gray-500 dark:text-white/60 mt-1" id="produkTerjualValue">
                        @if($produkTerlaris)
                          {{ $produkTerlaris->total_terjual }} item terjual
                        @else
                          Tidak ada penjualan
                        @endif
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-600 to-orange-400">
                      <i class="ni leading-none ni-bag-17 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sales Chart and Info Row -->
        <div class="flex flex-wrap mt-6 -mx-3 gap-0">
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none flex flex-col">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border h-full" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white text-slate-800">Penjualan Harian</h6>
                <p class="mb-0 text-sm leading-normal text-slate-600 dark:text-white dark:opacity-60">
                  <i class="fa fa-arrow-up text-emerald-500"></i>
                  <span class="font-semibold" id="petugasPercentageIncrease">0%</span> increase today
                </p>
              </div>
              <div class="flex-auto p-4">
                <div>
                  <canvas id="petugasChart" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div style="border: 2px solid #3d5a73; border-radius: 1rem; display: flex; overflow: hidden; pointer-events: auto; position: relative; height: 100%;">
              <!-- Background image with overlay -->
              <div class="absolute inset-0 w-full h-full">
                <img class="w-full h-full object-cover" src="{{ asset('assets/img/COFFEE & EATERY_20260114_122950_0000.png') }}" alt="UI Coffee & Eatery" />
                <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(255,255,255,0.85) 0%, rgba(255,255,255,0.7) 100%);"></div>
              </div>
              
              <!-- Content overlay -->
              <div class="relative z-10 flex flex-col items-center justify-center w-full h-full p-8 text-center">
                <div class="inline-block w-16 h-16 mb-6 text-center text-white bg-orange-500 bg-center rounded-lg fill-current stroke-none">
                  <i class="fas fa-fire text-2xl relative top-3 text-white"></i>
                </div>
                <p class="text-sm leading-relaxed" style="color: #3d5a73; opacity: 0.9; margin-top: 4cm;">Amazing quality and taste, loved by customers every day.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Transactions -->
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-lg dark:bg-slate-850 dark:shadow-dark-lg rounded-lg bg-clip-border" style="border-top: 4px solid #3d5a73; margin-top: 0.5cm;">
          <div class="p-6 pb-0 mb-0 bg-white border-b border-slate-200 dark:border-slate-700 rounded-t-lg">
            <h6 class="capitalize font-semibold text-slate-800 dark:text-white text-lg">Transaksi Terbaru Anda</h6>
          </div>
          <div class="p-6 pb-4 bg-white">
            <input type="text" id="transactionSearch" placeholder="Cari berdasarkan pelanggan, tanggal, atau total..." class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-700 text-slate-700 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
          </div>
          <div class="overflow-x-auto">
            <table id="transactionTable" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-5 font-bold text-center uppercase align-middle bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600 text-sm text-slate-600 dark:text-slate-300">No</th>
                  <th class="px-6 py-5 font-bold text-center uppercase align-middle bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600 text-sm text-slate-600 dark:text-slate-300">Tanggal</th>
                  <th class="px-6 py-5 font-bold text-center uppercase align-middle bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600 text-sm text-slate-600 dark:text-slate-300">Pelanggan</th>
                  <th class="px-6 py-5 font-bold text-center uppercase align-middle bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600 text-sm text-slate-600 dark:text-slate-300">Total</th>
                  <th class="px-6 py-5 font-bold text-center uppercase align-middle bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600 text-sm text-slate-600 dark:text-slate-300">Aksi</th>
                </tr>
              </thead>
              <tbody id="transactionTableBody">
                @forelse ($transaksiTerbaru as $key => $item)
                <tr class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                  <td class="px-6 py-5 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">{{ $key + 1 }}</p>
                  </td>
                  <td class="px-6 py-5 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">{{ $item->TanggalPenjualan }}</p>
                  </td>
                  <td class="px-6 py-5 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">{{ $item->pelanggan->NamaPelanggan }}</p>
                  </td>
                  <td class="px-6 py-5 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">Rp {{ number_format($item->TotalHarga, 0, ',', '.') }}</p>
                  </td>
                  <td class="px-6 py-5 whitespace-nowrap text-center">
                    <a href="{{ route('penjualan.receipt', $item->PenjualanID) }}" class="inline-block text-white font-semibold py-2 px-4 rounded transition hover:shadow-lg" style="background-color: #3d5a73;">
                      Lihat
                    </a>
                  </td>
                </tr>
                @empty
                <tr id="emptyState">
                  <td colspan="5" class="px-6 py-8 text-center text-sm font-semibold text-slate-400 dark:text-slate-400">
                    <i class="fas fa-inbox text-3xl mb-2 block opacity-50"></i>
                    Tidak ada transaksi
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <script>
          // Function to load today's transactions
          async function loadTodayTransactions() {
            try {
              const response = await fetch('{{ route("api.today-transactions") }}');
              const data = await response.json();

              const tbody = document.getElementById('transactionTableBody');
              const emptyState = document.getElementById('emptyState');

              if (data.total === 0) {
                // Show empty state
                tbody.innerHTML = '<tr id="emptyState"><td colspan="5" class="px-6 py-8 text-center text-sm font-semibold text-slate-400 dark:text-slate-400"><i class="fas fa-inbox text-3xl mb-2 block opacity-50"></i>Tidak ada transaksi</td></tr>';
                return;
              }

              // Build table rows
              let html = '';
              data.transaksi.forEach(item => {
                html += `
                  <tr class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                    <td class="px-6 py-5 whitespace-nowrap text-center">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">${item.no}</p>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-center">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">${item.tanggal}</p>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-center">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">${item.pelanggan}</p>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-center">
                      <p class="mb-0 text-sm font-semibold leading-tight dark:text-white text-slate-700">${item.total}</p>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-center">
                      <a href="{{ route('penjualan.receipt', '') }}/${item.id}" class="inline-block text-white font-semibold py-2 px-4 rounded transition hover:shadow-lg" style="background-color: #3d5a73;">
                        Lihat
                      </a>
                    </td>
                  </tr>
                `;
              });

              tbody.innerHTML = html;

              // Reapply search filter if active
              const searchInput = document.getElementById('transactionSearch');
              if (searchInput && searchInput.value.trim()) {
                filterTransactions(searchInput.value);
              }
            } catch (error) {
              console.error('Error loading transactions:', error);
            }
          }

          // Function to filter transactions
          function filterTransactions(searchTerm) {
            const searchTermLower = searchTerm.toLowerCase();
            const tableRows = document.querySelectorAll('#transactionTable tbody tr');
            
            tableRows.forEach(row => {
              if (row.id === 'emptyState') return;
              const text = row.textContent.toLowerCase();
              if (text.includes(searchTermLower)) {
                row.style.display = '';
              } else {
                row.style.display = 'none';
              }
            });
          }

          // Search event listener
          document.getElementById('transactionSearch').addEventListener('keyup', function(e) {
            filterTransactions(e.target.value);
          });

          // Load transactions initially and refresh every 10 seconds
          loadTodayTransactions();
          setInterval(loadTodayTransactions, 10000);

          // Function to load petugas stats (Total Penjualan and Produk Terlaris)
          async function loadPetugasStats() {
            try {
              const response = await fetch('{{ route("api.petugas-stats") }}');
              const data = await response.json();

              // Update Total Penjualan card
              const totalPenjualanElement = document.getElementById('totalPenjualanValue');
              if (totalPenjualanElement) {
                totalPenjualanElement.textContent = data.totalPenjualan;
              }

              // Update transaction count
              const transactionCountElement = document.getElementById('jumlahTransaksiValue');
              if (transactionCountElement) {
                transactionCountElement.textContent = data.jumlahTransaksi + ' transaksi';
              }

              // Update Produk Terlaris card
              const produkNamaElement = document.getElementById('produkTerlariValue');
              if (produkNamaElement && data.produkTerlaris) {
                produkNamaElement.textContent = data.produkTerlaris;
              }

              // Update product sold count
              const produkCountElement = document.getElementById('produkTerjualValue');
              if (produkCountElement && data.produkTerjual) {
                produkCountElement.textContent = data.produkTerjual + ' item terjual';
              }
            } catch (error) {
              console.error('Error loading petugas stats:', error);
            }
          }

          // Load stats initially and refresh every 10 seconds
          loadPetugasStats();
          setInterval(loadPetugasStats, 10000);
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          // Load petugas daily sales chart
          async function loadPetugasDailySalesChart() {
            try {
              const response = await fetch('{{ route("api.petugas-daily-sales") }}');
              const data = await response.json();

              // Update percentage increase text
              const percentageElement = document.getElementById('petugasPercentageIncrease');
              if (percentageElement) {
                const percentage = data.percentageIncrease;
                const sign = percentage >= 0 ? '+' : '';
                percentageElement.textContent = sign + percentage + '%';
              }

              // Destroy existing chart if it exists
              const ctx = document.getElementById('petugasChart');
              if (ctx && window.petugasChartInstance) {
                window.petugasChartInstance.destroy();
              }

              // Create new chart with real data
              if (ctx) {
                var gradientStroke1 = ctx.getContext("2d").createLinearGradient(0, 230, 0, 50);
                gradientStroke1.addColorStop(1, 'rgba(61, 90, 115, 0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(61, 90, 115, 0.0)');
                gradientStroke1.addColorStop(0, 'rgba(61, 90, 115, 0)');

                window.petugasChartInstance = new Chart(ctx.getContext("2d"), {
                  type: "line",
                  data: {
                    labels: data.labels,
                    datasets: [{
                      label: "Penjualan",
                      tension: 0.4,
                      borderWidth: 0,
                      pointRadius: 0,
                      borderColor: "#3d5a73",
                      backgroundColor: gradientStroke1,
                      borderWidth: 3,
                      fill: true,
                      data: data.data,
                      maxBarThickness: 6
                    }],
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                      legend: {
                        display: false,
                      }
                    },
                    interaction: {
                      intersect: false,
                      mode: 'index',
                    },
                    scales: {
                      y: {
                        grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5]
                        },
                        ticks: {
                          display: true,
                          padding: 10,
                          color: '#3d5a73',
                          font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                          },
                        }
                      },
                      x: {
                        grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5]
                        },
                        ticks: {
                          display: true,
                          color: '#3d5a73',
                          padding: 20,
                          font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                          },
                        }
                      }
                    }
                  }
                });
              }
            } catch (error) {
              console.error('Error loading petugas daily sales data:', error);
            }
          }

          // Load chart when document is ready
          if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', loadPetugasDailySalesChart);
          } else {
            loadPetugasDailySalesChart();
          }

          // Reload chart every 10 seconds for real-time updates
          setInterval(loadPetugasDailySalesChart, 10000);
        </script>

        <footer class="pt-4" style="border: none;">
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

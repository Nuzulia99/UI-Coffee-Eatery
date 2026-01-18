<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Pembelian</title>
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Input Pembelian</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Input Pembelian Baru</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="capitalize dark:text-white">Form Input Pembelian</h6>
          </div>
          <div class="p-6">
            @if ($errors->any())
              <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                <h5 class="font-bold mb-2">Terjadi Kesalahan:</h5>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if ($message = Session::get('error'))
              <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                {{ $message }}
              </div>
            @endif

            <form action="{{ route('penjualan.store') }}" method="POST">
              @csrf
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Tanggal Pembelian</label>
                <input type="date" name="TanggalPenjualan" value="{{ old('TanggalPenjualan', date('Y-m-d')) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>

              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Pelanggan</label>
                <input type="text" name="NamaPelanggan" value="{{ old('NamaPelanggan') }}" placeholder="Masukkan nama pelanggan" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>

              <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                  <h6 class="font-semibold text-slate-700 dark:text-white">Barang yang Dibeli</h6>
                  <button type="button" id="add-item-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-sm">
                    <i class="fas fa-plus"></i> Tambah Barang
                  </button>
                </div>
                <div id="items-container">
                  <div class="item-row mb-4 p-4 border border-slate-300 rounded-lg dark:border-slate-600">
                    <div class="grid grid-cols-12 gap-4 mb-4">
                      <div class="col-span-6">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Barang</label>
                        <select name="items[0][ProdukID]" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 produk-select" required>
                          <option value="">-- Pilih Barang --</option>
                          @foreach ($produk as $p)
                            <option value="{{ $p->ProdukID }}" data-harga="{{ $p->Harga }}" data-stok="{{ $p->Stok }}">{{ $p->NamaProduk }} (Stok: {{ $p->Stok }}) - Rp {{ number_format($p->Harga, 0, ',', '.') }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-span-6">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Jumlah</label>
                        <input type="number" name="items[0][JumlahProduk]" min="1" value="1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 jumlah-input" required>
                        <p class="error-text text-red-500 text-sm mt-1" style="display:none;"></p>
                      </div>
                    </div>
                    <button type="button" class="remove-item-btn bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </div>
                </div>
              </div>

              <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                  <i class="fas fa-save"></i> Simpan Pembelian
                </button>
                <a href="{{ route('penjualan.menu') }}" class="text-white font-bold text-2xl" style="background: none;">
                  <
                </a>
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
      let itemCount = 1;
      const addItemBtn = document.getElementById('add-item-btn');
      const itemsContainer = document.getElementById('items-container');
      const form = document.querySelector('form');

      // Add stock validation on form submit
      form.addEventListener('submit', (e) => {
        const rows = document.querySelectorAll('.item-row');
        let hasError = false;
        let errorMessage = '';

        rows.forEach(row => {
          const select = row.querySelector('.produk-select');
          const jumlahInput = row.querySelector('.jumlah-input');
          
          if (select.value) {
            const stok = parseInt(select.options[select.selectedIndex].dataset.stok);
            const jumlah = parseInt(jumlahInput.value);

            if (jumlah > stok) {
              hasError = true;
              const produkName = select.options[select.selectedIndex].text;
              errorMessage += `${produkName}: Stok hanya ${stok}, tapi anda pesan ${jumlah}\n`;
            }
          }
        });

        if (hasError) {
          e.preventDefault();
          alert('❌ Stok tidak cukup!\n\n' + errorMessage);
        }
      });

      function updateRequiredAttributes() {
        const allItems = itemsContainer.querySelectorAll('.item-row');
        allItems.forEach((item, index) => {
          const select = item.querySelector('.produk-select');
          if (allItems.length > 1) {
            // Jika lebih dari 1 item, barang tidak wajib (optional)
            select.removeAttribute('required');
          } else {
            // Jika hanya 1 item, barang wajib diisi (required)
            select.setAttribute('required', 'required');
          }
        });
      }

      // Update max jumlah when produk is selected
      document.addEventListener('change', (e) => {
        if (e.target.classList.contains('produk-select')) {
          const row = e.target.closest('.item-row');
          const jumlahInput = row.querySelector('.jumlah-input');
          if (e.target.value) {
            const stok = parseInt(e.target.options[e.target.selectedIndex].dataset.stok);
            jumlahInput.max = stok;
            if (parseInt(jumlahInput.value) > stok) {
              jumlahInput.value = 1;
            }
          }
          clearErrorMessage(row);
        }

        if (e.target.classList.contains('jumlah-input')) {
          const row = e.target.closest('.item-row');
          const select = row.querySelector('.produk-select');
          if (select.value) {
            const stok = parseInt(select.options[select.selectedIndex].dataset.stok);
            const jumlah = parseInt(e.target.value);
            const errorText = row.querySelector('.error-text');

            if (jumlah > stok) {
              e.target.style.borderColor = '#ef4444';
              e.target.style.backgroundColor = '#fee2e2';
              errorText.textContent = `⚠️ Jumlah tidak boleh melebihi stok (tersedia: ${stok})`;
              errorText.style.display = 'block';
            } else {
              clearErrorMessage(row);
            }
          }
        }
      });

      function clearErrorMessage(row) {
        const jumlahInput = row.querySelector('.jumlah-input');
        const errorText = row.querySelector('.error-text');
        jumlahInput.style.borderColor = '';
        jumlahInput.style.backgroundColor = '';
        errorText.style.display = 'none';
      }

      function createNewItem() {
        const newItem = document.createElement('div');
        newItem.className = 'item-row mb-4 p-4 border border-slate-300 rounded-lg dark:border-slate-600';
        newItem.innerHTML = `
          <div class="grid grid-cols-12 gap-4 mb-4">
            <div class="col-span-6">
              <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Barang</label>
              <select name="items[${itemCount}][ProdukID]" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 produk-select">
                <option value="">-- Pilih Barang --</option>
                @foreach ($produk as $p)
                  <option value="{{ $p->ProdukID }}" data-harga="{{ $p->Harga }}" data-stok="{{ $p->Stok }}">{{ $p->NamaProduk }} (Stok: {{ $p->Stok }}) - Rp {{ number_format($p->Harga, 0, ',', '.') }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-span-6">
              <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Jumlah</label>
              <input type="number" name="items[${itemCount}][JumlahProduk]" min="1" value="1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600 jumlah-input" required>
              <p class="error-text text-red-500 text-sm mt-1" style="display:none;"></p>
            </div>
          </div>
          <button type="button" class="remove-item-btn bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
            <i class="fas fa-trash"></i> Hapus
          </button>
        `;
        itemsContainer.appendChild(newItem);
        itemCount++;

        newItem.querySelector('.remove-item-btn').addEventListener('click', () => {
          newItem.remove();
          updateRequiredAttributes();
        });

        updateRequiredAttributes();
        return newItem;
      }

      addItemBtn.addEventListener('click', () => {
        createNewItem();
      });

      // Auto-add new row when selecting product in last item
      document.addEventListener('change', (e) => {
        if (e.target.classList.contains('produk-select')) {
          const allItems = itemsContainer.querySelectorAll('.item-row');
          const lastItem = allItems[allItems.length - 1];
          const itemRow = e.target.closest('.item-row');
          
          if (itemRow === lastItem && e.target.value) {
            // Auto-add new empty row
            createNewItem();
          }
        }
      });

      document.addEventListener('click', (e) => {
        if (e.target.closest('.remove-item-btn')) {
          e.target.closest('.item-row').remove();
          updateRequiredAttributes();
        }
      });

      // Clean empty items before form submission
      form.addEventListener('submit', (e) => {
        const rows = document.querySelectorAll('.item-row');
        rows.forEach(row => {
          const select = row.querySelector('.produk-select');
          // Remove rows dengan produk kosong
          if (!select.value) {
            row.remove();
          }
        });
        
        // Re-update required attributes after removing empty items
        updateRequiredAttributes();
      });

      // Initialize on page load
      updateRequiredAttributes();
    </script>
  </body>
</html>

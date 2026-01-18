<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Penjualan</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
  <style>
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      gap: 15px;
      max-height: calc(100vh - 280px);
      overflow-y: auto;
      padding-right: 10px;
    }

    .menu-item {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border: 2px solid transparent;
    }

    .menu-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      border-color: #3b82f6;
    }

    .menu-item.selected {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }

    .menu-item-image {
      width: 100%;
      height: 120px;
      object-fit: cover;
      background-color: #f0f0f0;
    }

    .menu-item-info {
      padding: 10px;
      text-align: center;
    }

    .menu-item-name {
      font-weight: 600;
      font-size: 12px;
      color: #333;
      margin-bottom: 5px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .add-to-order-btn:hover {
      background: #2563eb !important;
      transform: scale(1.1);
    }

    .add-to-order-btn:active {
      transform: scale(0.95);
    }

    .menu-qty-control {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin: 8px 0;
      background: #f3f4f6;
      padding: 6px 8px;
      border-radius: 6px;
    }

    .qty-control-btn {
      width: 28px;
      height: 28px;
      border: 1px solid #3b82f6;
      background: white;
      color: #3b82f6;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .qty-control-btn:hover {
      background: #3b82f6;
      color: white;
    }

    .qty-display {
      min-width: 30px;
      text-align: center;
      font-weight: bold;
      color: #333;
      font-size: 13px;
    }

    .menu-item-price {
      color: #3b82f6;
      font-weight: bold;
      font-size: 11px;
    }

    .order-sidebar {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
      outline: 2px solid #3d5a73;
      outline-offset: -8px;
    }

    #orderItems {
      flex: 1;
      overflow-y: auto;
      padding-right: 8px;
      margin-bottom: 10px;
    }

    .order-item {
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      justify-items: center;
      align-items: center;
      padding: 12px;
      border-bottom: 1px solid #e5e7eb;
      background: #f9fafb;
      border-radius: 8px;
      margin-bottom: 10px;
      gap: 8px;
    }

    .order-item-name {
      font-size: 13px;
      font-weight: 500;
      text-align: left;
    }

    .order-item-qty {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin: 0 10px;
      text-align: center;
      font-weight: 500;
      font-size: 12px;
    }

    .qty-btn {
      width: 24px;
      height: 24px;
      border: none;
      background: #e5e7eb;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
      color: #333;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
    }

    .qty-btn:hover {
      background: #d1d5db;
    }

    .qty-input {
      width: 35px;
      text-align: center;
      border: 1px solid #d1d5db;
      border-radius: 4px;
      padding: 4px;
      font-size: 12px;
    }

    .order-item-price {
      font-weight: bold;
      color: #3b82f6;
      font-size: 12px;
      min-width: 50px;
      text-align: right;
    }

    .remove-item {
      background: #ef4444;
      color: white;
      border: none;
      padding: 4px 8px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 11px;
      transition: all 0.2s;
    }

    .remove-item:hover {
      background: #dc2626;
    }

    .order-summary {
      margin-top: auto;
      padding-top: 15px;
      border-top: 2px solid #e5e7eb;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 13px;
    }

    .summary-row.total {
      font-size: 16px;
      font-weight: bold;
      color: #3b82f6;
      margin-top: 10px;
    }

    .category-tabs {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .category-btn {
      padding: 8px 16px;
      background: #f3f4f6;
      border: 2px solid transparent;
      border-radius: 8px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 500;
      color: #4b5563;
      transition: all 0.2s;
    }

    .category-btn:hover {
      background: #e5e7eb;
    }

    .category-btn.active {
      background: #3d5a73;
      color: white;
      border-color: #3d5a73;
    }

    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }

    #submitBtn {
      transition: all 0.3s ease;
    }

    #submitBtn:not(:disabled) {
      cursor: pointer;
      background-color: #3d5a73 !important;
    }

    #submitBtn:not(:disabled):hover {
      background-color: #2d4558 !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(61, 90, 115, 0.3) !important;
    }

    #submitBtn:not(:disabled):active {
      transform: translateY(0);
    }

    #submitBtn:disabled {
      background-color: #cbd5e1 !important;
      cursor: not-allowed;
      opacity: 0.6;
    }
  </style>
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Menu Pemesanan</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Menu Pemesanan</h6>
          </nav>
        </div>
      </nav>

      <!-- end Navbar -->

      <div class="w-full px-4 py-6 mx-auto">
        <!-- Error Messages -->
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

        @if ($message = Session::get('success'))
          <div class="mb-4 p-4 bg-green-500 text-white rounded-lg">
            {{ $message }}
          </div>
        @endif

        <!-- Main Content -->
        <div class="flex gap-10 items-stretch" style="height: fit-content;">
          
          <!-- Menu Column -->
          <div class="flex-1" style="margin-right: 1.5rem;">
            <div class="bg-white rounded-2xl shadow-xl p-6" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <!-- Category Filter -->
              <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-slate-700">Kategori</h3>
                <div class="category-tabs">
                  <button class="category-btn active" data-category="all">Semua</button>
                  @foreach ($kategori as $kat)
                    <button class="category-btn" data-category="{{ $kat }}">{{ $kat }}</button>
                  @endforeach
                </div>
              </div>

              <!-- Menu Grid -->
              <div class="menu-grid" id="menuGrid">
                @foreach ($produk as $item)
                  <div class="menu-item" data-id="{{ $item->ProdukID }}" data-name="{{ $item->NamaProduk }}" data-price="{{ $item->Harga }}" data-stok="{{ $item->Stok }}" data-category="{{ $item->Kategori }}">
                    @if ($item->Gambar)
                      <img src="{{ asset($item->Gambar) }}" alt="{{ $item->NamaProduk }}" class="menu-item-image">
                    @else
                      <div class="menu-item-image flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                        <i class="fas fa-image text-blue-400 text-4xl"></i>
                      </div>
                    @endif
                    <div class="menu-item-info">
                      <div class="menu-item-name" title="{{ $item->NamaProduk }}">{{ $item->NamaProduk }}</div>
                      
                      <!-- Quantity Control -->
                      <div class="menu-qty-control" data-id="{{ $item->ProdukID }}">
                        <button type="button" class="qty-control-btn qty-minus" title="Kurangi">−</button>
                        <span class="qty-display">0</span>
                        <button type="button" class="qty-control-btn qty-plus" title="Tambah">+</button>
                      </div>
                      
                      <div class="menu-item-price">Rp {{ number_format($item->Harga, 0, ',', '.') }}</div>
                      <div style="font-size: 10px; color: #999;">Stok: {{ $item->Stok }}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Order Summary Column -->
          <div style="width: 32%;" class="flex-shrink-0 h-full">
            <div class="order-sidebar">
              <h3 class="text-xl font-bold text-slate-700 mb-4">Order Menu</h3>
              <form action="{{ route('penjualan.transaction') }}" method="POST" id="orderForm">
                @csrf

                <!-- Order Items Container -->
                <div id="orderItems">
                  <!-- Items will be added here dynamically -->
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                  <div class="summary-row">
                    <span>Subtotal:</span>
                    <span id="subtotal">Rp 0</span>
                  </div>
                  <div class="summary-row total">
                    <span>Total:</span>
                    <span id="total">Rp 0</span>
                  </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6">
                  <button type="submit" id="submitBtn" class="w-full text-white font-bold py-2 px-4 rounded-lg transition hover:shadow-lg" style="background-color: #3d5a73;" disabled>
                    <i class="fas fa-save"></i> Order Now
                  </button>
                </div>
              </form>
            </div>
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

    <!-- Scripts -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}"></script>
    
    <script>
      let orders = {};

      // Initialize items container
      const orderItems = document.getElementById('orderItems');
      const menuItems = document.querySelectorAll('.menu-item');
      const categoryBtns = document.querySelectorAll('.category-btn');
      const menuGrid = document.getElementById('menuGrid');
      const submitBtn = document.getElementById('submitBtn');

      // Category filter
      categoryBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          categoryBtns.forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          
          const category = btn.dataset.category;
          menuItems.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
              item.style.display = '';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

      // Function to add item to order
      function addToOrder(produkID) {
        const item = document.querySelector(`[data-id="${produkID}"]`);
        const id = item.dataset.id;
        const name = item.dataset.name;
        const price = parseFloat(item.dataset.price);
        const stok = parseInt(item.dataset.stok);

        if (stok <= 0) {
          alert('Stok habis untuk ' + name);
          return;
        }

        if (!orders[id]) {
          orders[id] = {
            name: name,
            price: price,
            qty: 1,
            stok: stok
          };
        } else {
          if (orders[id].qty < orders[id].stok) {
            orders[id].qty++;
          } else {
            alert('Stok tidak cukup');
            return;
          }
        }

        item.classList.add('selected');
        updateOrderDisplay();
        updateQtyDisplay();
      }

      // Function to remove item from order
      function removeFromOrder(produkID) {
        if (orders[produkID]) {
          if (orders[produkID].qty > 0) {
            orders[produkID].qty--;
            if (orders[produkID].qty === 0) {
              delete orders[produkID];
              const item = document.querySelector(`[data-id="${produkID}"]`);
              item.classList.remove('selected');
            }
          }
          updateOrderDisplay();
          updateQtyDisplay();
        }
      }

      // Update quantity display in menu items
      function updateQtyDisplay() {
        document.querySelectorAll('.menu-qty-control').forEach(control => {
          const produkID = control.dataset.id;
          const display = control.querySelector('.qty-display');
          if (orders[produkID]) {
            display.textContent = orders[produkID].qty;
          } else {
            display.textContent = '0';
          }
        });
      }

      // Quantity control button handlers
      document.querySelectorAll('.qty-plus').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const control = btn.closest('.menu-qty-control');
          const produkID = control.dataset.id;
          addToOrder(produkID);
        });
      });

      document.querySelectorAll('.qty-minus').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const control = btn.closest('.menu-qty-control');
          const produkID = control.dataset.id;
          removeFromOrder(produkID);
        });
      });

      function updateOrderDisplay() {
        orderItems.innerHTML = '';
        let subtotal = 0;

        Object.keys(orders).forEach(id => {
          const order = orders[id];
          const itemTotal = order.price * order.qty;
          subtotal += itemTotal;

          const orderItem = document.createElement('div');
          orderItem.className = 'order-item';
          orderItem.innerHTML = `
            <span class="order-item-name">${order.name}</span>
            <div class="order-item-qty">
              x${order.qty}
            </div>
            <span class="order-item-price">Rp ${number_format(itemTotal)}</span>
          `;
          orderItems.appendChild(orderItem);
        });

        const tax = subtotal * 0.025;
        const serviceCharge = subtotal * 0.01;
        const total = subtotal + tax + serviceCharge;

        document.getElementById('subtotal').textContent = 'Rp ' + number_format(subtotal);
        document.getElementById('total').textContent = 'Rp ' + number_format(total);

        submitBtn.disabled = Object.keys(orders).length === 0;
      }

      // Change quantity
      window.changeQty = function(id, change) {
        if (orders[id]) {
          const newQty = orders[id].qty + change;
          if (newQty > 0 && newQty <= orders[id].stok) {
            orders[id].qty = newQty;
            updateOrderDisplay();
          }
        }
      };

      // Set quantity
      window.setQty = function(id, value) {
        const qty = parseInt(value);
        if (orders[id]) {
          if (qty > 0 && qty <= orders[id].stok) {
            orders[id].qty = qty;
            updateOrderDisplay();
          } else {
            alert('Jumlah melebihi stok');
          }
        }
      };

      // Remove item
      window.removeItem = function(id) {
        delete orders[id];
        document.querySelector(`[data-id="${id}"]`).classList.remove('selected');
        updateOrderDisplay();
      };

      // Form submission
      document.getElementById('orderForm').addEventListener('submit', (e) => {
        e.preventDefault();
        
        if (Object.keys(orders).length === 0) {
          alert('Pilih minimal 1 menu');
          return;
        }

        // Remove any existing hidden inputs first
        const existingInputs = document.querySelectorAll('input[name^="items"]');
        existingInputs.forEach(input => input.remove());

        // Build items array
        const itemsArray = [];
        Object.keys(orders).forEach(id => {
          itemsArray.push({
            ProdukID: id,
            JumlahProduk: parseInt(orders[id].qty)
          });
        });

        // Create hidden inputs
        itemsArray.forEach((item, index) => {
          const input1 = document.createElement('input');
          input1.type = 'hidden';
          input1.name = `items[${index}][ProdukID]`;
          input1.value = item.ProdukID;
          
          const input2 = document.createElement('input');
          input2.type = 'hidden';
          input2.name = `items[${index}][JumlahProduk]`;
          input2.value = item.JumlahProduk;

          document.getElementById('orderForm').appendChild(input1);
          document.getElementById('orderForm').appendChild(input2);
        });

        document.getElementById('orderForm').submit();
      });

      // Helper function to format number
      function number_format(num) {
        return new Intl.NumberFormat('id-ID').format(Math.round(num));
      }
    </script>
  </body>
</html>

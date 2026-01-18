<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Akun</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
  <style>
    .profile-header {
      text-align: center;
      padding: 30px 0;
      border-bottom: 2px solid #e5e7eb;
      margin-bottom: 30px;
    }
    .profile-avatar {
      width: 120px;
      height: 120px;
      margin: 0 auto 15px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #3d5a73;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .profile-name {
      font-size: 28px;
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 5px;
    }
    .profile-username {
      font-size: 14px;
      color: #6b7280;
      margin-bottom: 15px;
    }
    .badge-status {
      display: inline-block;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }
    .badge-online {
      background-color: #dcfce7;
      color: #166534;
    }
    .badge-offline {
      background-color: #f3f4f6;
      color: #4b5563;
    }
    .badge-role {
      display: inline-block;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      margin-left: 10px;
    }
    .badge-administrator {
      background-color: #fca5a5;
      color: #7c2d2d;
    }
    .badge-petugas {
      background-color: #a5d6ff;
      color: #1e3a8a;
    }
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }
    .info-item {
      padding: 15px;
      background-color: #f9fafb;
      border-radius: 8px;
      border-left: 4px solid #3d5a73;
    }
    .info-label {
      font-size: 12px;
      color: #6b7280;
      text-transform: uppercase;
      font-weight: 600;
      margin-bottom: 5px;
    }
    .info-value {
      font-size: 15px;
      color: #1f2937;
      font-weight: 500;
    }
    .action-buttons {
      display: flex;
      gap: 10px;
      justify-content: center;
    }
    .btn {
      padding: 10px 20px;
      font-size: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
      color: white;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }
    .btn-primary {
      background-color: #3b82f6;
    }
    .btn-primary:hover {
      background-color: #2563eb;
    }
    .btn-secondary {
      background-color: #6b7280;
    }
    .btn-secondary:hover {
      background-color: #4b5563;
    }
  </style>
</head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500" style="background: #3d5a73; min-height: 100vh;">
    <div class="absolute w-full bg-gradient-to-b from-blue-500 to-blue-500 dark:hidden min-h-75" style="opacity: 0;"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
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
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('penjualan.menu') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('stok.index') }}">
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
            <a class="py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ route('accounts.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Detail Akun</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Detail Akun</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="profile-header">
            <div>
              @if($user->profile_photo)
                <img src="{{ asset($user->profile_photo) }}" alt="{{ $user->name }}" class="profile-avatar">
              @else
                <div class="profile-avatar bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                  <i class="fas fa-user text-5xl text-white"></i>
                </div>
              @endif
            </div>
            <div class="profile-name">{{ $user->name }}</div>
            <div class="profile-username">@{{ $user->username }}</div>
            <div>
              <span class="badge-status {{ $user->is_online ? 'badge-online' : 'badge-offline' }}">
                <i class="fas fa-circle" style="font-size: 8px; margin-right: 6px;"></i>
                {{ $user->status }}
              </span>
              <span class="badge-role {{ $user->level === 'administrator' ? 'badge-administrator' : 'badge-petugas' }}">
                <i class="fas {{ $user->level === 'administrator' ? 'fa-crown' : 'fa-user-tie' }}" style="margin-right: 6px;"></i>
                {{ ucfirst($user->level) }}
              </span>
            </div>
          </div>

          <div class="p-6">
            @if (session('success'))
              <div class="mb-4 p-4 bg-green-500 text-white rounded-lg flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
              </div>
            @endif

            <div class="info-grid">
              <div class="info-item">
                <div class="info-label">Username</div>
                <div class="info-value">{{ $user->username }}</div>
              </div>
              <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $user->email }}</div>
              </div>
              <div class="info-item">
                <div class="info-label">Role / Level</div>
                <div class="info-value">{{ ucfirst($user->level) }}</div>
              </div>
              <div class="info-item">
                <div class="info-label">Status</div>
                <div class="info-value">{{ $user->is_online ? 'Online' : 'Offline' }}</div>
              </div>
              <div class="info-item">
                <div class="info-label">Tanggal Daftar</div>
                <div class="info-value">{{ $user->created_at->format('d M Y H:i') }}</div>
              </div>
              <div class="info-item">
                <div class="info-label">Aktivitas Terakhir</div>
                <div class="info-value">
                  @if($user->last_activity)
                    {{ Carbon\Carbon::parse($user->last_activity)->diffForHumans() }}
                  @else
                    -
                  @endif
                </div>
              </div>
            </div>

            <div class="action-buttons">
              <a href="{{ route('accounts.edit', $user) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit Akun
              </a>
              <a href="{{ route('accounts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
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

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}"></script>
  </body>
</html>

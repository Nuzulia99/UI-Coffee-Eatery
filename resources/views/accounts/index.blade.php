<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Management Akun</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    thead {
      background-color: #f3f4f6;
      border-bottom: 2px solid #e5e7eb;
    }
    th {
      padding: 12px;
      text-align: left;
      font-weight: 600;
      font-size: 12px;
      color: #374151;
      text-transform: uppercase;
    }
    td {
      padding: 12px;
      border-bottom: 1px solid #e5e7eb;
      font-size: 14px;
    }
    tbody tr {
      transition: background-color 0.2s ease;
    }
    tbody tr:hover {
      background-color: #f9fafb;
    }
    .user-cell {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .avatar-img {
      width: 40px;
      height: 40px;
      min-width: 40px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #3d5a73;
    }
    .user-info {
      flex: 1;
    }
    .user-name {
      font-weight: 600;
      color: #1f2937;
    }
    .user-email {
      font-size: 12px;
      color: #6b7280;
    }
    .badge-role {
      display: inline-block;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 600;
    }
    .badge-administrator {
      background-color: #fca5a5;
      color: #7c2d2d;
    }
    .badge-petugas {
      background-color: #a5d6ff;
      color: #1e3a8a;
    }
    .badge-online {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 600;
      background-color: #dcfce7;
      color: #166534;
    }
    .badge-offline {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 600;
      background-color: #f3f4f6;
      color: #4b5563;
    }
    .action-buttons {
      display: flex;
      gap: 8px;
      justify-content: center;
    }
    .btn {
      padding: 7px 14px;
      font-size: 13px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
      color: white;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-weight: 500;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }
    .btn-info {
      background-color: #06b6d4;
    }
    .btn-info:hover {
      background-color: #0891b2;
    }
    .btn-edit {
      background-color: #10b981;
    }
    .btn-edit:hover {
      background-color: #059669;
    }
    .btn-delete {
      background-color: #ef4444;
    }
    .btn-delete:hover {
      background-color: #dc2626;
    }
  </style>
</head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500" style="background: #3d5a73; min-height: 100vh;">
    <div class="absolute w-full bg-gradient-to-b from-blue-500 to-blue-500 dark:hidden min-h-75" style="opacity: 0;"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-hidden antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Management Akun</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Management Akun</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      
      <!-- Notifikasi Alert -->
      @if(session('success'))
      <div id="successAlert" class="mx-6 mt-6 p-4 rounded-lg border-2 border-green-600 text-white flex items-center justify-between" style="animation: slideDown 0.3s ease-out; background-color: rgba(34, 197, 94, 0.6);">
        <div class="flex items-center">
          <i class="ni ni-check-bold text-lg mr-3"></i>
          <span>{{ session('success') }}</span>
        </div>
        <button type="button" onclick="closeAlert()" class="text-white hover:text-gray-200 font-bold text-lg">×</button>
      </div>
      @endif

      <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="capitalize dark:text-white">Daftar Akun Pengguna</h6>
            <p class="text-sm text-slate-500 dark:text-slate-400">Total: {{ $users->count() }} akun</p>
          </div>
          <div class="p-6">
            @if($users->isEmpty())
              <div class="text-center py-12">
                <i class="fas fa-users text-4xl text-slate-300 mb-3"></i>
                <p class="text-slate-500">Tidak ada akun pengguna</p>
              </div>
            @else
              <!-- Administrator Table -->
              <div class="mb-8">
                <h6 class="text-lg font-semibold text-slate-800 mb-4">
                  <i class="fas fa-crown" style="color: #fca5a5; margin-right: 8px;"></i>Administrator
                </h6>
                @php
                  $administrators = $users->filter(function($user) {
                    return $user->level === 'administrator';
                  });
                @endphp
                
                @if($administrators->isEmpty())
                  <div class="text-center py-8 bg-slate-50 rounded-lg">
                    <p class="text-slate-500">Tidak ada administrator</p>
                  </div>
                @else
                  <div class="overflow-x-auto">
                    <table>
                      <thead>
                        <tr>
                          <th style="width: 25%;">Pengguna</th>
                          <th style="width: 15%;">Username</th>
                          <th style="width: 15%;">Status</th>
                          <th style="width: 30%;">Email</th>
                          <th style="width: 15%; text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($administrators as $user)
                          <tr>
                            <td>
                              <div class="user-cell">
                                @if($user->profile_photo)
                                  <img src="{{ asset($user->profile_photo) }}" alt="{{ $user->name }}" class="avatar-img">
                                @else
                                  <div class="avatar-img bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <i class="fas fa-user text-lg text-white"></i>
                                  </div>
                                @endif
                                <div class="user-info">
                                  <div class="user-name">{{ $user->name }}</div>
                                  <div class="user-email">{{ $user->created_at->format('d M Y') }}</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span style="color: #3b82f6; font-weight: 500;">{{ $user->username }}</span>
                            </td>
                            <td>
                              @if($user->is_online)
                                <span class="badge-online">
                                  <i class="fas fa-circle" style="font-size: 8px; margin-right: 4px;"></i>Online
                                </span>
                              @else
                                <span class="badge-offline">
                                  <i class="fas fa-circle" style="font-size: 8px; margin-right: 4px;"></i>Offline
                                </span>
                              @endif
                            </td>
                            <td>
                              <span style="color: #3b82f6;">{{ $user->email }}</span>
                            </td>
                            <td>
                              <div class="action-buttons">
                                <a href="{{ route('accounts.show', $user) }}" class="btn btn-info" title="Detail">
                                  <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('accounts.edit', $user) }}" class="btn btn-edit" title="Edit">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" onclick="openDeleteModal({{ $user->id }})" class="btn btn-delete" title="Hapus">
                                  <i class="fas fa-trash"></i> Hapus
                                </button>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @endif
              </div>

              <!-- Petugas Table -->
              <div>
                <h6 class="text-lg font-semibold text-slate-800 mb-4">
                  <i class="fas fa-user-tie" style="color: #a5d6ff; margin-right: 8px;"></i>Petugas / Cashier
                </h6>
                @php
                  $petugas = $users->filter(function($user) {
                    return $user->level === 'petugas';
                  });
                @endphp
                
                @if($petugas->isEmpty())
                  <div class="text-center py-8 bg-slate-50 rounded-lg">
                    <p class="text-slate-500">Tidak ada petugas</p>
                  </div>
                @else
                  <div class="overflow-x-auto">
                    <table>
                      <thead>
                        <tr>
                          <th style="width: 25%;">Pengguna</th>
                          <th style="width: 15%;">Username</th>
                          <th style="width: 15%;">Status</th>
                          <th style="width: 30%;">Email</th>
                          <th style="width: 15%; text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($petugas as $user)
                          <tr>
                            <td>
                              <div class="user-cell">
                                @if($user->profile_photo)
                                  <img src="{{ asset($user->profile_photo) }}" alt="{{ $user->name }}" class="avatar-img">
                                @else
                                  <div class="avatar-img bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <i class="fas fa-user text-lg text-white"></i>
                                  </div>
                                @endif
                                <div class="user-info">
                                  <div class="user-name">{{ $user->name }}</div>
                                  <div class="user-email">{{ $user->created_at->format('d M Y') }}</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span style="color: #3b82f6; font-weight: 500;">{{ $user->username }}</span>
                            </td>
                            <td>
                              @if($user->is_online)
                                <span class="badge-online">
                                  <i class="fas fa-circle" style="font-size: 8px; margin-right: 4px;"></i>Online
                                </span>
                              @else
                                <span class="badge-offline">
                                  <i class="fas fa-circle" style="font-size: 8px; margin-right: 4px;"></i>Offline
                                </span>
                              @endif
                            </td>
                            <td>
                              <span style="color: #3b82f6;">{{ $user->email }}</span>
                            </td>
                            <td>
                              <div class="action-buttons">
                                <a href="{{ route('accounts.show', $user) }}" class="btn btn-info" title="Detail">
                                  <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('accounts.edit', $user) }}" class="btn btn-edit" title="Edit">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" onclick="openDeleteModal({{ $user->id }})" class="btn btn-delete" title="Hapus">
                                  <i class="fas fa-trash"></i> Hapus
                                </button>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @endif
              </div>
            @endif
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

    <!-- Modal Hapus Akun -->
    <div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
      <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px rgba(0,0,0,0.1); padding: 2rem; max-width: 28rem; margin: 0 1rem; width: 100%;">
        <div style="display: flex; justify-content: center; margin-bottom: 1rem;">
          <div style="border-radius: 9999px; background-color: #fed7aa; padding: 1rem; width: 4rem; height: 4rem; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 2.5rem; color: #f97316; font-weight: bold;">!</span>
          </div>
        </div>
        <h3 style="font-size: 1.25rem; font-weight: 600; text-align: center; color: #1f2937; margin-bottom: 0.5rem;">Apakah Anda yakin?</h3>
        <p style="text-align: center; color: #4b5563; margin-bottom: 1.5rem;">Data akun yang dihapus tidak dapat dikembalikan!</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center;">
          <button type="button" onclick="closeDeleteModal()" style="padding: 0.5rem 1.5rem; background-color: #3b82f6; color: white; font-weight: 600; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Batal</button>
          <button type="button" onclick="confirmDelete()" style="padding: 0.5rem 1.5rem; background-color: #ef4444; color: white; font-weight: 600; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">Ya, hapus!</button>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}"></script>
    
    <script>
      let deleteUserId = null;

      function openDeleteModal(userId) {
        deleteUserId = userId;
        const modal = document.getElementById('deleteModal');
        if (modal) {
          modal.style.display = 'flex';
        }
      }

      function closeDeleteModal() {
        deleteUserId = null;
        const modal = document.getElementById('deleteModal');
        if (modal) {
          modal.style.display = 'none';
        }
      }

      function closeAlert() {
        const alert = document.getElementById('successAlert');
        if (alert) {
          alert.style.animation = 'slideUp 0.3s ease-out forwards';
          setTimeout(() => {
            alert.style.display = 'none';
          }, 300);
        }
      }

      function confirmDelete() {
        if (deleteUserId) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '{{ route("accounts.destroy", ":id") }}'.replace(':id', deleteUserId);
          form.style.display = 'none';
          
          const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
          
          form.innerHTML = `
            <input type="hidden" name="_token" value="${token}">
            <input type="hidden" name="_method" value="DELETE">
          `;
          
          document.body.appendChild(form);
          form.submit();
        }
      }

      // Close modal when clicking outside
      document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('deleteModal');
        if (modal) {
          modal.addEventListener('click', function(e) {
            if (e.target === this) {
              closeDeleteModal();
            }
          });
        }

        // Auto close success alert after 5 seconds
        const successAlert = document.getElementById('successAlert');
        if (successAlert) {
          setTimeout(() => {
            closeAlert();
          }, 5000);
        }
      });

      // Add animations
      const style = document.createElement('style');
      style.textContent = `
        @keyframes slideDown {
          from {
            opacity: 0;
            transform: translateY(-20px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
        @keyframes slideUp {
          from {
            opacity: 1;
            transform: translateY(0);
          }
          to {
            opacity: 0;
            transform: translateY(-20px);
          }
        }
      `;
      document.head.appendChild(style);
    </script>
  </body>
</html>

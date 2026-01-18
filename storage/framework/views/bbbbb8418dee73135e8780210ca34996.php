<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Stok Barang</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/argon-dashboard-tailwind.css')); ?>" rel="stylesheet">
  <style>
    @keyframes slideIn {
      from {
        opacity: 0;
        transform: scale(0.95);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes slideOut {
      from {
        opacity: 1;
        transform: scale(1);
      }
      to {
        opacity: 0;
        transform: scale(0.95);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      from {
        opacity: 1;
      }
      to {
        opacity: 0;
      }
    }

    .modal-enter {
      animation: fadeIn 0.3s ease-in-out, slideIn 0.3s ease-in-out;
    }

    .modal-exit {
      animation: fadeOut 0.3s ease-in-out, slideOut 0.3s ease-in-out;
    }
  </style>
</head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500" style="background: #3d5a73; min-height: 100vh;">
    <div class="absolute w-full bg-gradient-to-b from-blue-500 to-blue-500 dark:hidden min-h-75" style="opacity: 0;"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-hidden antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="<?php echo e(route('dashboard')); ?>">
          <img src="<?php echo e(asset('assets/img/sidebarlogin.png')); ?>" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo" style="max-height: 43px;" />
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto overflow-hidden">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class="<?php if(Route::currentRouteName() === 'dashboard'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('dashboard')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="<?php if(Route::currentRouteName() === 'produk.index'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('produk.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pendataan Barang</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="<?php if(Route::currentRouteName() === 'penjualan.menu'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('penjualan.menu')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="<?php if(Route::currentRouteName() === 'stok.index'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('stok.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stok Barang</span>
            </a>
          </li>

          <?php if(Auth::user()->level === 'administrator'): ?>
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('penjualan.index')); ?>">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-purple-500 ni ni-briefcase-24"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riwayat Transaksi</span>
              </a>
            </li>
          <?php endif; ?>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account</h6>
          </li>

          <?php if(Auth::user()->level === 'administrator'): ?>
            <li class="mt-0.5 w-full">
              <a class="<?php if(Route::currentRouteName() === 'accounts.index'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('accounts.index')); ?>">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
              </a>
            </li>
          <?php else: ?>
            <li class="mt-0.5 w-full">
              <a class="<?php if(Route::currentRouteName() === 'petugas.profile'): ?> py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors <?php else: ?> dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php endif; ?>" href="<?php echo e(route('petugas.profile')); ?>">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-single-02"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profil Saya</span>
              </a>
            </li>
          <?php endif; ?>

          <li class="mt-0.5 w-full">
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="m-0">
              <?php echo csrf_field(); ?>
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
          <?php if(Auth::user()->profile_photo): ?>
            <img src="<?php echo e(asset(Auth::user()->profile_photo)); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="w-12 h-12 rounded-full object-cover border-2 border-slate-300 dark:border-slate-600 mb-3">
          <?php else: ?>
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center border-2 border-slate-300 dark:border-slate-600 mb-3">
              <i class="fas fa-user text-white text-sm"></i>
            </div>
          <?php endif; ?>
          <p class="text-sm font-bold text-slate-700 dark:text-white truncate max-w-full"><?php echo e(Auth::user()->name); ?></p>
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Stok Barang</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Laporan Stok Barang</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      
      <!-- Notifikasi Alert -->
      <?php if(session('success')): ?>
      <div id="successAlert" class="mx-6 mt-6 p-4 rounded-lg border-2 border-green-600 text-white flex items-center justify-between" style="animation: slideDown 0.3s ease-out; background-color: rgba(34, 197, 94, 0.6);">
        <div class="flex items-center">
          <i class="ni ni-check-bold text-lg mr-3"></i>
          <span><?php echo e(session('success')); ?></span>
        </div>
        <button type="button" onclick="closeAlert()" class="text-white hover:text-gray-200 font-bold text-lg">×</button>
      </div>
      <?php endif; ?>

      <?php if(session('error')): ?>
      <div id="errorAlert" class="mx-6 mt-6 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700 flex items-center justify-between" style="animation: slideDown 0.3s ease-out;">
        <div class="flex items-center">
          <i class="ni ni-fat-remove text-lg mr-3"></i>
          <span><?php echo e(session('error')); ?></span>
        </div>
        <button type="button" onclick="closeAlert()" class="text-red-700 hover:text-red-900 font-bold text-lg">×</button>
      </div>
      <?php endif; ?>
      
      <style>
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
      </style>

      <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="capitalize dark:text-white">Tabel Stok Barang</h6>
          </div>
          <div class="p-6 pb-4 bg-white">
            <div class="flex flex-wrap" style="gap: 0.2cm;">
              <button onclick="filterByCategory('all')" class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-colors hover:opacity-90 category-btn" data-category="all" style="background-color: #3d5a73;">Semua</button>
              <button onclick="filterByCategory('Drinks')" class="px-4 py-2 text-sm font-semibold text-slate-600 rounded-lg transition-colors bg-white border border-slate-300 hover:bg-slate-50 category-btn" data-category="Drinks" style="dark:text-white dark:bg-transparent dark:border-white/30 dark:hover:bg-slate-800">Drinks</button>
              <button onclick="filterByCategory('Main Course')" class="px-4 py-2 text-sm font-semibold text-slate-600 rounded-lg transition-colors bg-white border border-slate-300 hover:bg-slate-50 category-btn" data-category="Main Course" style="dark:text-white dark:bg-transparent dark:border-white/30 dark:hover:bg-slate-800">Main Course</button>
              <button onclick="filterByCategory('Snack')" class="px-4 py-2 text-sm font-semibold text-slate-600 rounded-lg transition-colors bg-white border border-slate-300 hover:bg-slate-50 category-btn" data-category="Snack" style="dark:text-white dark:bg-transparent dark:border-white/30 dark:hover:bg-slate-800">Snack</button>
              <button onclick="filterByCategory('Dessert')" class="px-4 py-2 text-sm font-semibold text-slate-600 rounded-lg transition-colors bg-white border border-slate-300 hover:bg-slate-50 category-btn" data-category="Dessert" style="dark:text-white dark:bg-transparent dark:border-white/30 dark:hover:bg-slate-800">Dessert</button>
            </div>
            <div class="mt-4">
              <input type="text" id="searchInput" placeholder="Cari barang..." class="w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:placeholder-slate-400" />
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">No</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Nama Barang</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Harga</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Stok</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Status</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-coloured border-solid text-xxs opacity-70 text-slate-400 dark:opacity-80 dark:border-white/30">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr data-kategori="<?php echo e($item->Kategori); ?>">
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white"><?php echo e($key + 1); ?></p>
                  </td>
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white"><?php echo e($item->NamaProduk); ?></p>
                  </td>
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white">Rp <?php echo e(number_format($item->Harga, 0, ',', '.')); ?></p>
                  </td>
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap text-center">
                    <p class="mb-0 text-sm font-semibold leading-tight dark:text-white"><?php echo e($item->Stok); ?></p>
                  </td>
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 whitespace-nowrap text-center">
                    <span class="status-badge">-</span>
                  </td>
                  <td class="px-6 py-3 border-b border-coloured border-solid dark:border-white/30 text-center">
                    <div class="flex flex-wrap items-center justify-center" style="gap: 0.2cm;">
                      <a href="<?php echo e(route('produk.edit', $item->ProdukID)); ?>" class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white rounded-lg transition-colors hover:opacity-80" style="background-color: #3d5a73; gap: 0.5rem;" title="Edit">
                        <span style="font-size: 1.2rem;">✎</span>
                        <span>Edit</span>
                      </a>
                      <button type="button" onclick="openDeleteModal(<?php echo e($item->ProdukID); ?>)" class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white rounded-lg transition-colors hover:opacity-80" style="background-color: #f87171; gap: 0.5rem; border: none; cursor: pointer;" title="Hapus">
                        <span style="font-size: 1.2rem;">×</span>
                        <span>Hapus</span>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="6" class="px-6 py-3 text-center text-sm font-semibold text-slate-400 dark:text-white">Tidak ada data</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
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
    
    <!-- Modal Hapus -->
    <div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
      <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px rgba(0,0,0,0.1); padding: 2rem; max-width: 28rem; margin: 0 1rem; width: 100%;">
        <div style="display: flex; justify-content: center; margin-bottom: 1rem;">
          <div style="border-radius: 9999px; background-color: #fed7aa; padding: 1rem; width: 4rem; height: 4rem; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 2.5rem; color: #f97316; font-weight: bold;">!</span>
          </div>
        </div>
        <h3 style="font-size: 1.25rem; font-weight: 600; text-align: center; color: #1f2937; margin-bottom: 0.5rem;">Apakah Anda yakin?</h3>
        <p style="text-align: center; color: #4b5563; margin-bottom: 1.5rem;">Data yang dihapus tidak dapat dikembalikan!</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center;">
          <button type="button" onclick="closeDeleteModal()" style="padding: 0.5rem 1.5rem; background-color: #3b82f6; color: white; font-weight: 600; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Batal</button>
          <button type="button" onclick="confirmDelete()" style="padding: 0.5rem 1.5rem; background-color: #ef4444; color: white; font-weight: 600; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">Ya, hapus!</button>
        </div>
      </div>
    </div>

    <script>
      let deleteProductId = null;

      function openDeleteModal(productId) {
        console.log('openDeleteModal called with productId:', productId);
        deleteProductId = productId;
        const modal = document.getElementById('deleteModal');
        const modalContent = modal.querySelector('div:nth-child(1)');
        console.log('Modal element:', modal);
        if (modal) {
          modal.style.display = 'flex';
          // Hapus class lama jika ada
          modalContent.classList.remove('modal-exit');
          // Tambah animasi masuk
          modalContent.classList.add('modal-enter');
          console.log('Modal displayed with animation');
        }
      }

      function closeDeleteModal() {
        deleteProductId = null;
        const modal = document.getElementById('deleteModal');
        const modalContent = modal.querySelector('div:nth-child(1)');
        if (modal && modalContent) {
          // Hapus class animasi masuk
          modalContent.classList.remove('modal-enter');
          // Tambah animasi keluar
          modalContent.classList.add('modal-exit');
          
          // Tunggu animasi selesai baru hilangkan
          setTimeout(() => {
            modal.style.display = 'none';
            modalContent.classList.remove('modal-exit');
          }, 300);
        }
      }

      function confirmDelete() {
        console.log('confirmDelete called, deleteProductId:', deleteProductId);
        if (deleteProductId) {
          // Buat form
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '<?php echo e(route("produk.destroy", ":id")); ?>'.replace(':id', deleteProductId);
          form.style.display = 'none';
          
          // Ambil CSRF token
          const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          
          // Tambah input fields
          form.innerHTML = `
            <input type="hidden" name="_token" value="${token}">
            <input type="hidden" name="_method" value="DELETE">
          `;
          
          console.log('Form action:', form.action);
          
          // Tambah form ke body dan submit
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

        // Auto close success/error alert after 5 seconds
        const successAlert = document.getElementById('successAlert');
        const errorAlert = document.getElementById('errorAlert');
        
        if (successAlert) {
          setTimeout(() => {
            closeAlert(successAlert);
          }, 5000);
        }
        
        if (errorAlert) {
          setTimeout(() => {
            closeAlert(errorAlert);
          }, 5000);
        }
      });

      function closeAlert(element) {
        const alert = element || document.getElementById('successAlert') || document.getElementById('errorAlert');
        if (alert) {
          alert.style.animation = 'slideUp 0.3s ease-out forwards';
          setTimeout(() => {
            alert.style.display = 'none';
          }, 300);
        }
      }

      // Add slideUp animation
      const style = document.createElement('style');
      style.textContent = `
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
    <script>
      let currentCategory = 'all';

      // Filter by category
      function filterByCategory(category) {
        currentCategory = category;
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
          const namaCell = row.querySelector('td:nth-child(2)');
          if (!namaCell) return;
          
          // Ambil kategori dari baris (kita perlu tambah data-kategori di table)
          const rowCategory = row.getAttribute('data-kategori');
          
          if (category === 'all' || rowCategory === category) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
        
        // Update button styling
        updateCategoryButtons();
      }

      // Update category button styling
      function updateCategoryButtons() {
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
          if (btn.getAttribute('data-category') === currentCategory) {
            // Active button
            btn.style.backgroundColor = '#3d5a73';
            btn.style.color = 'white';
            btn.classList.remove('bg-white', 'border', 'border-slate-300', 'text-slate-600');
            btn.classList.add('text-white');
          } else {
            // Inactive button
            btn.style.backgroundColor = 'white';
            btn.style.color = '#475569';
            btn.classList.remove('text-white');
            btn.classList.add('bg-white', 'border', 'border-slate-300', 'text-slate-600');
          }
        });
      }

      // Function untuk set status berdasarkan stok
      function updateStatus() {
        console.log('updateStatus called');
        const tableRows = document.querySelectorAll('tbody tr');
        console.log('Found rows:', tableRows.length);
        
        tableRows.forEach((row, index) => {
          const stokCell = row.querySelector('td:nth-child(4) p');
          const statusCell = row.querySelector('td:nth-child(5) span');
          
          if (stokCell && statusCell) {
            const stokValue = parseInt(stokCell.textContent.trim());
            console.log('Row', index, 'Stok:', stokValue);
            
            if (stokValue > 5) {
              statusCell.textContent = 'Tersedia';
              statusCell.style.cssText = 'background-color: #10b981; color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; display: inline-block;';
            } else if (stokValue > 0) {
              statusCell.textContent = 'Menipis';
              statusCell.style.cssText = 'background-color: #eab308; color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; display: inline-block;';
            } else {
              statusCell.textContent = 'Habis';
              statusCell.style.cssText = 'background-color: #ef4444; color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; display: inline-block;';
            }
          }
        });
      }
      // Jalankan saat halaman selesai load
      setTimeout(updateStatus, 100);
      
      // Update search function
      const searchInput = document.getElementById('searchInput');
      
      if (searchInput) {
        searchInput.addEventListener('keyup', function() {
          const searchValue = this.value.toLowerCase();
          const tableRows = document.querySelectorAll('tbody tr');
          
          tableRows.forEach(row => {
            const namaBarang = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            
            if (namaBarang.includes(searchValue) || searchValue === '') {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          });
        });
      }
    </script>
  </body>
</html>
<?php /**PATH C:\laragon\www\coffee\resources\views/stok/index.blade.php ENDPATH**/ ?>
   <!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Dashboard</title>

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/argon-dashboard-tailwind.css')); ?>" rel="stylesheet">
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
            <a class="py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="<?php echo e(route('dashboard')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('produk.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pendataan Barang</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('penjualan.menu')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pembelian</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('stok.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stok Barang</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('penjualan.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-purple-500 ni ni-briefcase-24"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riwayat Transaksi</span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('accounts.index')); ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
            </a>
          </li>

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

      </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  </div>
                </a>
              </li>
              <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                  <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                  <!-- fixed-plugin-button-nav  -->
                </a>
              </li>

              <!-- notifications -->

              <li class="relative flex items-center pr-2">
                <p class="hidden transform-dropdown-show"></p>
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger aria-expanded="false">
                  <i class="cursor-pointer fa fa-bell"></i>
                </a>

                <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                  <!-- add show class on dropdown open js -->
                  <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="<?php echo e(asset('assets/img/team-2.jpg')); ?>" class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New message</span> from Laur</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="<?php echo e(asset('assets/img/small-logos/logo-spotify.svg')); ?>" class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New album</span> by Travis Scott</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully completed</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- end Navbar -->

      <!-- cards -->
      <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <!-- card1 - Riwayat Transaksi -->
          <a href="<?php echo e(route('penjualan.index')); ?>" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer hover:scale-105 transition-transform">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white whitespace-nowrap">Riwayat Transaksi</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-gray-500"><?php echo e($drinksSales); ?> transaksi</span>
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-600 to-cyan-500">
                      <i class="ni leading-none ni-time-alarm text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card2 - Data Produk -->
          <a href="<?php echo e(route('produk.index')); ?>" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer hover:scale-105 transition-transform">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white">Data Produk</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-gray-500">Pendataan Barang</span>
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-600 to-orange-400">
                      <i class="ni leading-none ni-folder-17 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card3 - Pembelian -->
          <a href="<?php echo e(route('penjualan.menu')); ?>" class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer hover:scale-105 transition-transform">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white">Pembelian</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-gray-500">Transaksi Penjualan</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- card4 - Stok Barang -->
          <a href="<?php echo e(route('stok.index')); ?>" class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4 cursor-pointer hover:scale-105 transition-transform">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <h5 class="mb-2 font-bold dark:text-white">Stok Barang</h5>
                      <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="text-sm font-bold leading-normal text-gray-500">Manajemen Stok</span>
                      </p>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-pink-500 to-rose-400">
                      <i class="ni leading-none ni-box text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Daily Sales</h6>
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                  <i class="fa fa-arrow-up text-emerald-500"></i>
                  <span class="font-semibold" id="percentageIncrease">0%</span> increase today
                </p>
              </div>
              <div class="flex-auto p-4">
                <div>
                  <canvas id="chart-line" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div style="border: 2px solid #3d5a73; border-radius: 1rem; display: flex; height: 400px;">
              <div class="relative w-full h-full rounded-2xl bg-white flex items-center justify-center" style="overflow: hidden;">
                <img class="h-full w-full object-contain" src="<?php echo e(asset('assets/img/COFFEE & EATERY_20260114_122950_0000.png')); ?>" alt="UI Coffee & Eatery" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5" style="color: #3d5a73;">
                  <div class="inline-block w-8 h-8 mb-4 text-center text-white bg-orange-500 bg-center rounded-lg fill-current stroke-none">
                    <i class="top-0.75 text-xxs relative text-white ni ni-fire"></i>
                  </div>
                  <h5 class="mb-1" style="color: #3d5a73;">UI Coffee & Eatery</h5>
                  <p style="color: #3d5a73;">Amazing quality and taste, loved by customers every day.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- cards row 3 -->

        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="p-4 pb-0 mb-0 rounded-t-4">
                <div class="flex justify-between">
                  <h6 class="mb-2 dark:text-white">Top 4 Product Sales</h6>
                </div>
              </div>
              <div class="overflow-x-auto">
                <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                  <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $formattedTopProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr <?php if($index !== count($formattedTopProducts) - 1): ?> class="border-b dark:border-white/40" <?php endif; ?>>
                      <td class="p-2 align-middle bg-transparent w-3/10 whitespace-nowrap <?php if($index !== count($formattedTopProducts) - 1): ?> border-b dark:border-white/40 <?php endif; ?>">
                        <div class="flex items-center px-2 py-1">
                          <div>
                            <i class="fa <?php echo e($product['icon']); ?> text-slate-500 text-2xl"></i>
                          </div>
                          <div class="ml-6">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Product:</p>
                            <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo e($product['name']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent whitespace-nowrap <?php if($index !== count($formattedTopProducts) - 1): ?> border-b dark:border-white/40 <?php endif; ?>">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sold:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo e($product['sold']); ?></h6>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent whitespace-nowrap <?php if($index !== count($formattedTopProducts) - 1): ?> border-b dark:border-white/40 <?php endif; ?>">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Revenue:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">Rp <?php echo e(number_format($product['revenue'], 0, ',', '.')); ?></h6>
                        </div>
                      </td>
                      <td class="p-2 text-sm leading-normal align-middle bg-transparent whitespace-nowrap <?php if($index !== count($formattedTopProducts) - 1): ?> border-b dark:border-white/40 <?php endif; ?>">
                        <div class="flex-1 text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Stock:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo e($product['stock']); ?></h6>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="4" class="p-4 text-center text-gray-500 dark:text-white/60">
                        Tidak ada data penjualan
                      </td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border" style="outline: 2px solid #3d5a73; outline-offset: -8px;">
              <div class="p-4 pb-0 rounded-t-4">
                <h6 class="mb-0 dark:text-white">Menu Categories</h6>
              </div>
              <div class="flex-auto p-4">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit <?php if($loop->first): ?> rounded-t-lg <?php endif; ?> <?php if($loop->last): ?> rounded-b-lg <?php endif; ?>">
                    <div class="flex items-center">
                      <div class="flex flex-col">
                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white"><?php echo e($category['name']); ?></h6>
                        <span class="text-xs leading-tight dark:text-white/80"><?php echo e($category['items']); ?> items, <span class="font-semibold"><?php echo e($category['sold']); ?>+ sold</span></span>
                      </div>
                    </div>
                    <div class="flex">
                      <a href="<?php echo e(route('produk.kategori', $category['name'])); ?>" class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></a>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <li class="relative flex justify-between py-2 pr-4 border-0 rounded-lg text-inherit">
                    <p class="text-center text-gray-500 dark:text-white/60">Tidak ada kategori</p>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
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
      <!-- end cards -->
    </main>
    <!-- plugin for charts  -->
  <script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>" async></script>
  <!-- plugin for scrollbar  -->
  <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>" async></script>
  <!-- main script file  -->
  <script src="<?php echo e(asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1')); ?>" async></script>
  
  <script>
    // Load daily sales data
    async function loadDailySalesChart() {
      try {
        const response = await fetch('<?php echo e(route("api.daily-sales")); ?>');
        const data = await response.json();

        // Update percentage increase text
        const percentageElement = document.getElementById('percentageIncrease');
        if (percentageElement) {
          const percentage = data.percentageIncrease;
          const sign = percentage >= 0 ? '+' : '';
          percentageElement.textContent = sign + percentage + '%';
        }

        // Destroy existing chart if it exists
        const ctx = document.getElementById('chart-line');
        if (ctx && window.chartLineInstance) {
          window.chartLineInstance.destroy();
        }

        // Create new chart with real data
        if (ctx) {
          var gradientStroke1 = ctx.getContext("2d").createLinearGradient(0, 230, 0, 50);
          gradientStroke1.addColorStop(1, 'rgba(61, 90, 115, 0.2)');
          gradientStroke1.addColorStop(0.2, 'rgba(61, 90, 115, 0.0)');
          gradientStroke1.addColorStop(0, 'rgba(61, 90, 115, 0)');

          window.chartLineInstance = new Chart(ctx.getContext("2d"), {
            type: "line",
            data: {
              labels: data.labels,
              datasets: [{
                label: "Daily Sales",
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
        console.error('Error loading daily sales data:', error);
      }
    }

    // Load chart when document is ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', loadDailySalesChart);
    } else {
      loadDailySalesChart();
    }

    // Reload chart every 30 seconds for real-time updates
    setInterval(loadDailySalesChart, 30000);
  </script>
  </body>
</html>
<?php /**PATH C:\laragon\www\coffee\resources\views/dashboard.blade.php ENDPATH**/ ?>
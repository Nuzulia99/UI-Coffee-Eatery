<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penjualan</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/argon-dashboard-tailwind.css')); ?>" rel="stylesheet">
  <style>
    @media print {
      body {
        background: white;
        margin: 0;
        padding: 0;
      }
      .print-hidden {
        display: none;
      }
      .filter-section {
        display: none !important;
      }
      table {
        page-break-inside: avoid;
      }
      tr {
        page-break-inside: avoid;
      }
      .page-break {
        page-break-after: always;
      }
      .no-print {
        display: none;
      }
      main {
        margin-left: 0 !important;
        background: white !important;
      }
      aside {
        display: none !important;
      }
    }

    .report-container {
      max-width: 900px;
      margin: 0 auto;
      background: white;
      padding: 40px;
      font-family: 'Times New Roman', Times, serif;
      line-height: 1.6;
    }

    .report-header {
      text-align: center;
      margin-bottom: 30px;
      border-bottom: 3px solid #3d5a73;
      padding-bottom: 20px;
    }

    .company-name {
      font-size: 24px;
      font-weight: bold;
      color: #3d5a73;
      margin-bottom: 5px;
    }

    .company-address {
      font-size: 12px;
      color: #666;
      margin-bottom: 20px;
    }

    .report-title {
      font-size: 18px;
      font-weight: bold;
      color: #3d5a73;
      text-transform: uppercase;
      margin-bottom: 5px;
    }

    .report-period {
      font-size: 13px;
      color: #666;
      margin-bottom: 30px;
    }

    .report-info {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 30px;
      font-size: 13px;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
    }

    .info-label {
      font-weight: bold;
      color: #3d5a73;
      width: 150px;
    }

    .summary-section {
      margin-bottom: 30px;
    }

    .summary-title {
      font-size: 14px;
      font-weight: bold;
      color: #3d5a73;
      margin-bottom: 15px;
      text-transform: uppercase;
      border-bottom: 2px solid #e5e7eb;
      padding-bottom: 10px;
    }

    .summary-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }

    .summary-item {
      border: 1px solid #d1d5db;
      padding: 15px;
      text-align: center;
    }

    .summary-label {
      font-size: 12px;
      color: #666;
      margin-bottom: 8px;
    }

    .summary-value {
      font-size: 20px;
      font-weight: bold;
      color: #3d5a73;
    }

    .table-section {
      margin-bottom: 30px;
    }

    .table-title {
      font-size: 14px;
      font-weight: bold;
      color: #3d5a73;
      margin-bottom: 15px;
      text-transform: uppercase;
      border-bottom: 2px solid #e5e7eb;
      padding-bottom: 10px;
    }

    .report-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
      margin-bottom: 20px;
    }

    .report-table thead {
      background-color: #3d5a73;
      color: white;
    }

    .report-table th {
      padding: 12px;
      text-align: left;
      font-weight: bold;
      border: 1px solid #3d5a73;
    }

    .report-table td {
      padding: 10px 12px;
      border: 1px solid #e5e7eb;
    }

    .report-table tbody tr:nth-child(even) {
      background-color: #f9fafb;
    }

    .report-table tbody tr:hover {
      background-color: #f3f4f6;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .total-section {
      margin-top: 20px;
      border-top: 2px solid #3d5a73;
      padding-top: 15px;
    }

    .total-row {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 8px;
      font-size: 13px;
    }

    .total-label {
      font-weight: bold;
      width: 200px;
      text-align: right;
      margin-right: 20px;
    }

    .total-value {
      width: 150px;
      text-align: right;
    }

    .grand-total {
      display: flex;
      justify-content: flex-end;
      margin-top: 15px;
      padding-top: 15px;
      border-top: 2px solid #3d5a73;
    }

    .grand-total-label {
      font-weight: bold;
      font-size: 14px;
      color: #3d5a73;
      width: 200px;
      text-align: right;
      margin-right: 20px;
    }

    .grand-total-value {
      font-weight: bold;
      font-size: 14px;
      color: #3d5a73;
      width: 150px;
      text-align: right;
    }

    .footer-section {
      margin-top: 60px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      font-size: 12px;
    }

    .signature-block {
      text-align: center;
    }

    .signature-line {
      border-top: 1px solid #333;
      margin-top: 50px;
      padding-top: 10px;
    }

    .no-data {
      text-align: center;
      padding: 40px;
      color: #999;
      font-style: italic;
    }

    .button-group {
      margin-bottom: 20px;
      display: flex;
      gap: 10px;
    }

    .btn-print {
      padding: 10px 20px;
      background-color: white;
      color: #3d5a73;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: background-color 0.3s;
    }

    .btn-print:hover {
      background-color: #f0f0f0;
    }

    .btn-back {
      background: none;
      color: white;
      font-weight: bold;
      font-size: 28px;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      line-height: 1;
      margin-top: -8px;
    }

    .btn-back:hover {
      opacity: 0.7;
    }
      transform: translateX(-3px);
    }
  </style>
</head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500" style="background: #3d5a73; min-height: 100vh;">
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-hidden antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
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

          <?php if(Auth::user()->level === 'administrator'): ?>
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('accounts.index')); ?>">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-badge"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Management Akun</span>
              </a>
            </li>
          <?php else: ?>
            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?php echo e(route('petugas.profile')); ?>">
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
      <div class="w-full px-6 py-6 mx-auto">
        <div class="button-group no-print" style="margin-bottom: 20px;">
          <button onclick="window.history.back()" class="btn-back">
            ←
          </button>
          <button onclick="window.print()" class="btn-print">
            <i class="fas fa-print"></i> Cetak Laporan
          </button>
        </div>

        <!-- Filter Form -->
        <div class="filter-section" style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
          <form method="GET" action="<?php echo e(route('penjualan.report')); ?>" class="flex flex-wrap gap-4 items-end">
            <div style="flex: 1; min-width: 200px;">
              <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #3d5a73; font-size: 14px;">Tanggal Mulai</label>
              <input type="date" name="start_date" value="<?php echo e($startDate); ?>" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px;">
            </div>
            <div style="flex: 1; min-width: 200px;">
              <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #3d5a73; font-size: 14px;">Tanggal Akhir</label>
              <input type="date" name="end_date" value="<?php echo e($endDate); ?>" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px;">
            </div>
            <button type="submit" style="padding: 10px 24px; background-color: #3d5a73; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; transition: background-color 0.3s;">
              <i class="fas fa-search"></i> Filter
            </button>
            <a href="<?php echo e(route('penjualan.report')); ?>" style="padding: 10px 24px; background-color: #3d5a73; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: background-color 0.3s; margin-left: 0.2cm;">
              <i class="fas fa-redo"></i> Reset
            </a>
          </form>
        </div>

        <div class="report-container">
          <!-- Report Header -->
          <div class="report-header">
            <div style="text-align: center; margin-bottom: 15px;">
              <img src="<?php echo e(asset('assets/img/sidebarlogin.png')); ?>" alt="UI Coffee & Eatery Logo" style="max-height: 70px; display: inline-block;">
            </div>
            <div class="company-name">UI COFFEE & EATERY</div>
            <div class="company-address">
              Jl. Raya Sambirejo, RT 19 RW 8, Desa Sambirejo, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah | Telp: 0271 7889747 | Email: info@uicoffee.com
            </div>
            <div class="report-title">Laporan Penjualan</div>
            <div class="report-period">
              <?php if($startDate && $endDate): ?>
                Periode: <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d F Y')); ?> - <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d F Y')); ?>

              <?php elseif($startDate): ?>
                Periode: <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d F Y')); ?> - Sekarang
              <?php elseif($endDate): ?>
                Periode: Awal - <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d F Y')); ?>

              <?php else: ?>
                Periode: <?php echo e(now()->format('d F Y')); ?>

              <?php endif; ?>
            </div>
          </div>

          <!-- Report Info -->
          <div style="margin-bottom: 30px; font-size: 13px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
              <span style="font-weight: bold; color: #3d5a73; white-space: nowrap;">Tanggal Pembuatan Laporan:</span>
              <span><?php echo e(now()->format('d F Y H:i')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <span style="font-weight: bold; color: #3d5a73; white-space: nowrap;">Total Transaksi:</span>
              <span><?php echo e($totalPenjualan); ?></span>
            </div>
          </div>

          <!-- Summary Section -->
          <div class="summary-section">
            <div class="summary-title">Ringkasan Kinerja</div>
            <div class="summary-grid">
              <div class="summary-item">
                <div class="summary-label">TOTAL TRANSAKSI</div>
                <div class="summary-value"><?php echo e($totalPenjualan); ?></div>
              </div>
              <div class="summary-item">
                <div class="summary-label">TOTAL PENJUALAN</div>
                <div class="summary-value">Rp <?php echo e(number_format($totalRevenue, 0, ',', '.')); ?></div>
              </div>
              <div class="summary-item">
                <div class="summary-label">RATA-RATA / TRANSAKSI</div>
                <div class="summary-value">Rp <?php echo e(number_format($totalPenjualan > 0 ? $totalRevenue / $totalPenjualan : 0, 0, ',', '.')); ?></div>
              </div>
            </div>
          </div>

          <!-- Detail Table Section -->
          <div class="table-section">
            <div class="table-title">Detail Penjualan</div>
            
            <?php if($penjualan->isEmpty()): ?>
              <div class="no-data">
                <p>Tidak ada data penjualan untuk periode ini</p>
              </div>
            <?php else: ?>
              <table class="report-table">
                <thead>
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%;">Tanggal</th>
                    <th style="width: 20%;">Pelanggan</th>
                    <th style="width: 12%; text-align: center;">Item</th>
                    <th style="width: 24%; text-align: right;">Subtotal</th>
                    <th style="width: 24%; text-align: right;">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $penjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="text-center"><?php echo e($key + 1); ?></td>
                    <td><?php echo e($item->created_at->format('d-m-Y H:i')); ?></td>
                    <td><?php echo e($item->pelanggan->NamaPelanggan ?? 'Umum'); ?></td>
                    <td class="text-center"><?php echo e($item->detailPenjualan->sum('JumlahProduk')); ?></td>
                    <td class="text-right">Rp <?php echo e(number_format($item->detailPenjualan->sum('Subtotal'), 0, ',', '.')); ?></td>
                    <td class="text-right" style="font-weight: bold; color: #3d5a73;">Rp <?php echo e(number_format($item->TotalHarga, 0, ',', '.')); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>

              <!-- Total Section -->
              <div class="total-section">
                <div class="total-row">
                  <span class="total-label">Subtotal Penjualan:</span>
                  <span class="total-value">Rp <?php echo e(number_format($penjualan->sum(function($item) { return $item->detailPenjualan->sum('Subtotal'); }), 0, ',', '.')); ?></span>
                </div>
                <div class="total-row">
                  <span class="total-label">Pajak & Biaya Layanan:</span>
                  <span class="total-value">Rp <?php echo e(number_format($totalRevenue - $penjualan->sum(function($item) { return $item->detailPenjualan->sum('Subtotal'); }), 0, ',', '.')); ?></span>
                </div>
                <div class="grand-total">
                  <span class="grand-total-label">TOTAL PENJUALAN:</span>
                  <span class="grand-total-value">Rp <?php echo e(number_format($totalRevenue, 0, ',', '.')); ?></span>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <!-- Footer Section -->
          <div class="footer-section">
            <div class="signature-block">
              <p style="font-size: 12px; margin-bottom: 50px;">Pembuat Laporan</p>
              <div class="signature-line">
                <p style="margin: 0;"><?php echo e(auth()->user()->name); ?></p>
              </div>
            </div>
            <div class="signature-block">
              <p style="font-size: 12px; margin-bottom: 50px;">Diketahui Oleh</p>
              <div class="signature-line">
                <p style="margin: 0;">Pimpinan</p>
              </div>
            </div>
          </div>

          <!-- Notes -->
          <div style="margin-top: 40px; font-size: 11px; color: #999; border-top: 1px solid #e5e7eb; padding-top: 20px;">
            <p style="margin: 0;">
              <strong>Catatan:</strong> Laporan ini dibuat secara otomatis oleh sistem dan merupakan dokumen resmi. 
              Untuk pertanyaan lebih lanjut, hubungi bagian administrasi.
            </p>
            <p style="margin: 5px 0 0 0;">
              Dicetak pada: <?php echo e(now()->format('d F Y H:i:s')); ?>

            </p>
          </div>
        </div>

        <!-- Copyright Footer -->
        <div style="margin-top: 60px; padding-top: 20px; border-top: 1px solid #e5e7eb; text-align: center; font-size: 11px; color: white;">
          <p style="margin: 0;">
            © 2026 UI Cashier & Eatery by Nuzulia Nur Azizah. All rights reserved.
          </p>
        </div>
      </div>
    </main>

    <!-- plugin for charts  -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  </body>
</html>
<?php /**PATH C:\laragon\www\coffee\resources\views/penjualan/report.blade.php ENDPATH**/ ?>
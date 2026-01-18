<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Barang</title>
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
            <a class="py-2.7 bg-slate-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ route('produk.index') }}">
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
        </ul>
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
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Tambah Barang</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Tambah Barang</h6>
          </nav>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="capitalize dark:text-white">Form Tambah Barang</h6>
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

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Nama Barang</label>
                <input type="text" name="NamaProduk" value="{{ old('NamaProduk') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Kategori</label>
                <select name="Kategori" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
                  <option value="">Pilih Kategori</option>
                  <option value="Drinks" {{ old('Kategori') == 'Drinks' ? 'selected' : '' }}>Drinks</option>
                  <option value="Main Course" {{ old('Kategori') == 'Main Course' ? 'selected' : '' }}>Main Course</option>
                  <option value="Snack" {{ old('Kategori') == 'Snack' ? 'selected' : '' }}>Snack</option>
                  <option value="Dessert" {{ old('Kategori') == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Harga</label>
                <input type="number" name="Harga" step="0.01" value="{{ old('Harga') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Stok</label>
                <input type="number" name="Stok" value="{{ old('Stok') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600" required>
              </div>
              <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Gambar Barang</label>
                <div class="mb-3">
                  <input type="file" id="gambarInput" accept="image/*" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:text-white dark:border-slate-600">
                  <small class="text-slate-500">Hanya file gambar (JPEG, PNG, GIF). Maksimal 2MB</small>
                </div>
                
                <!-- Preview gambar -->
                <div id="gambarPreview" class="mb-3" style="display: none;">
                  <div class="p-4 bg-gray-100 rounded-lg">
                    <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px;">
                  </div>
                </div>
                
                <!-- Hidden input untuk menyimpan path gambar -->
                <input type="hidden" id="gambarPath" name="Gambar" value="">
                
                <!-- Loading indicator -->
                <div id="uploadLoading" class="mb-3" style="display: none;">
                  <div class="flex items-center gap-2">
                    <div class="animate-spin h-5 w-5 border-2 border-blue-500 border-t-transparent rounded-full"></div>
                    <span class="text-sm text-blue-500">Sedang upload gambar...</span>
                  </div>
                </div>
                
                <!-- Status message -->
                <div id="uploadStatus" class="mb-3" style="display: none;"></div>
              </div>
              <div class="flex gap-2">
                <button type="submit" class="text-white font-bold py-2 px-4 rounded-lg" style="background-color: #3d5a73;">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('produk.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                  <i class="fas fa-arrow-left"></i> Kembali
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
    document.addEventListener('DOMContentLoaded', function() {
        const gambarInput = document.getElementById('gambarInput');
        const gambarPreview = document.getElementById('gambarPreview');
        const previewImg = document.getElementById('previewImg');
        const gambarPath = document.getElementById('gambarPath');
        const uploadLoading = document.getElementById('uploadLoading');
        const uploadStatus = document.getElementById('uploadStatus');

        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Validate file
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                showError('Hanya file JPEG, PNG, dan GIF yang diperbolehkan');
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                showError('Ukuran file maksimal 2MB');
                return;
            }

            // Show loading
            uploadLoading.style.display = 'block';
            uploadStatus.style.display = 'none';
            gambarPreview.style.display = 'none';

            // Create FormData
            const formData = new FormData();
            formData.append('gambar', file);
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            // Upload file
            fetch('{{ route("api.upload-gambar") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                uploadLoading.style.display = 'none';

                if (data.success) {
                    // Set the hidden input value
                    gambarPath.value = data.gambar_path;

                    // Show preview
                    previewImg.src = data.gambar_url;
                    gambarPreview.style.display = 'block';

                    // Show success message
                    showSuccess('Gambar berhasil diupload! Siap untuk disimpan.');
                } else {
                    showError(data.message || 'Gagal mengupload gambar');
                    gambarInput.value = '';
                }
            })
            .catch(error => {
                uploadLoading.style.display = 'none';
                showError('Error: ' + error.message);
                gambarInput.value = '';
            });
        });

        function showSuccess(message) {
            uploadStatus.className = 'p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm';
            uploadStatus.textContent = '✓ ' + message;
            uploadStatus.style.display = 'block';
        }

        function showError(message) {
            uploadStatus.className = 'p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm';
            uploadStatus.textContent = '✗ ' + message;
            uploadStatus.style.display = 'block';
        }
    });
    </script>
  </body>
</html>

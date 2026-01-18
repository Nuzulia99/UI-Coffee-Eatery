# Dokumentasi Fitur Upload Gambar Otomatis

## Deskripsi Fitur
Sistem upload gambar produk yang otomatis menyimpan gambar ke folder `public/img` dan langsung bisa ditampilkan di halaman menu penjualan.

## Fitur-Fitur

### 1. Upload Gambar Otomatis
- **Lokasi**: Form Tambah Barang (`/produk/create`)
- **Cara Kerja**:
  - Pilih file gambar dari komputer
  - Gambar otomatis terupload ke folder `public/img` saat dipilih
  - Preview gambar langsung muncul
  - Path gambar otomatis tersimpan di database

### 2. Validasi File
- **Format yang diizinkan**: JPEG, PNG, GIF
- **Ukuran maksimal**: 2MB
- **Pesan error otomatis** jika file tidak sesuai

### 3. Tampilan di Menu Penjualan
- Gambar otomatis ditampilkan di halaman `/penjualan/menu`
- Jika tidak ada gambar, muncul placeholder default
- Gambar responsif dengan ukuran optimal untuk grid

## Struktur File & Folder

```
public/
├── img/                          # Folder penyimpanan gambar produk (PENTING)
│   ├── espresso_1234567890.jpg
│   ├── cappuccino_1234567891.png
│   └── ... (gambar-gambar lainnya)
└── storage/ → link ke storage/app/public/

resources/views/produk/
├── create.blade.php              # Form tambah produk dengan upload otomatis
├── edit.blade.php
├── index.blade.php
└── kategori.blade.php

resources/views/penjualan/
├── menu.blade.php                # Menampilkan gambar dari folder img

app/Http/Controllers/
└── ProdukController.php           # Controller dengan method uploadGambar
```

## Kode Implementasi

### 1. Route API Upload (routes/web.php)
```php
Route::post('/api/upload-gambar', [ProdukController::class, 'uploadGambar'])->name('api.upload-gambar');
```

### 2. Method Controller (ProdukController.php)
```php
public function uploadGambar(Request $request)
{
    $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    try {
        $file = $request->file('gambar');
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
        
        $imgPath = public_path('img');
        if (!File::isDirectory($imgPath)) {
            File::makeDirectory($imgPath, 0755, true, true);
        }
        
        $file->move($imgPath, $filename);
        $imagePath = 'img/' . $filename;
        
        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil diupload',
            'gambar_path' => $imagePath,
            'gambar_url' => asset($imagePath)
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupload gambar: ' . $e->getMessage()
        ], 500);
    }
}
```

### 3. Form HTML dengan Upload AJAX (create.blade.php)
```html
<div class="mb-4">
    <label class="block text-sm font-semibold text-slate-700 dark:text-white mb-2">Gambar Barang</label>
    <div class="mb-3">
        <input type="file" id="gambarInput" accept="image/*" class="w-full px-4 py-2 border border-slate-300 rounded-lg">
        <small class="text-slate-500">Hanya file gambar (JPEG, PNG, GIF). Maksimal 2MB</small>
    </div>
    
    <!-- Preview gambar -->
    <div id="gambarPreview" class="mb-3" style="display: none;">
        <div class="p-4 bg-gray-100 rounded-lg">
            <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px;">
        </div>
    </div>
    
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
```

### 4. JavaScript Handler
```javascript
document.addEventListener('DOMContentLoaded', function() {
    const gambarInput = document.getElementById('gambarInput');
    
    gambarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        // Validasi file
        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            showError('Hanya file JPEG, PNG, dan GIF yang diperbolehkan');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            showError('Ukuran file maksimal 2MB');
            return;
        }

        // Upload dengan AJAX
        const formData = new FormData();
        formData.append('gambar', file);
        formData.append('_token', document.querySelector('input[name="_token"]').value);

        fetch('{{ route("api.upload-gambar") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('gambarPath').value = data.gambar_path;
                document.getElementById('previewImg').src = data.gambar_url;
                document.getElementById('gambarPreview').style.display = 'block';
                showSuccess('Gambar berhasil diupload! Siap untuk disimpan.');
            } else {
                showError(data.message || 'Gagal mengupload gambar');
            }
        });
    });
});
```

### 5. Tampilan di Menu Penjualan (menu.blade.php)
```blade
@if ($item->Gambar)
    <img src="{{ asset($item->Gambar) }}" alt="{{ $item->NamaProduk }}" class="menu-item-image">
@else
    <div class="menu-item-image flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
        <i class="fas fa-image text-blue-400 text-4xl"></i>
    </div>
@endif
```

## Alur Kerja

### Menambah Produk Baru dengan Gambar:

1. **Buka Form** → Ke menu "Pendataan Barang" → Klik tombol "Tambah Barang"
   - URL: `/produk/create`

2. **Isi Form**:
   - Nama Barang
   - Kategori
   - Harga
   - Stok
   - **Gambar** (pilih file dari komputer)

3. **Upload Gambar**:
   - Ketika file dipilih, gambar otomatis terupload ke `public/img/`
   - Preview gambar muncul di bawah input file
   - Status "Gambar berhasil diupload!" ditampilkan

4. **Simpan Produk**:
   - Klik tombol "Simpan"
   - Path gambar otomatis tersimpan di database kolom `Gambar`

5. **Lihat di Menu**:
   - Buka halaman "Pembelian" → "Menu"
   - Gambar produk otomatis ditampilkan di grid menu
   - URL: `/penjualan/menu`

## Database Schema

Model Produk (`app/Models/Produk.php`):
```php
protected $fillable = [
    'NamaProduk',
    'Gambar',        // Menyimpan path: 'img/nama-file.jpg'
    'Kategori',
    'Harga',
    'Stok',
];
```

## Contoh Path Gambar yang Disimpan

```
Database:  img/espresso_1705318250.jpg
URL Asset: /img/espresso_1705318250.jpg
Path Real: public/img/espresso_1705318250.jpg
```

## Troubleshooting

### Gambar tidak tampil di menu
- Pastikan folder `public/img/` memiliki permission 755
- Periksa di database apakah path gambar tersimpan dengan benar
- Clear browser cache atau buka di incognito mode

### Upload gagal dengan error "Tidak ada file"
- Pastikan form method="POST" dan enctype="multipart/form-data"
- Periksa ukuran file (max 2MB)
- Periksa format file (JPEG, PNG, GIF)

### Gambar terpotong atau tidak sesuai
- Ukuran optimal gambar: 300x300px atau 4:3 ratio
- Preview akan scale sesuai dengan CSS `object-fit: cover`

## Keamanan

✓ Validasi file extension (JPEG, PNG, GIF)
✓ Validasi MIME type
✓ Validasi ukuran file (2MB max)
✓ Generate nama file unik dengan timestamp (prevent overwrite)
✓ CSRF token protection
✓ Requires authentication (middleware 'auth')

## Performance

- Gambar disimpan langsung ke `public/img/` (tidak melalui storage)
- Loading time lebih cepat dibanding storage symlink
- Bisa di-serve langsung tanpa symbolic link
- Support CloudFlare/CDN dengan path `img/`

## Tips & Trik

### Batch Upload Gambar untuk Produk Existing
Jika sudah ada produk tanpa gambar, bisa diupdate via:
1. Form edit produk (belum ditambahkan, bisa extend)
2. Admin panel untuk batch update
3. Script CLI untuk mass update

### Resize & Optimize Gambar
Untuk hasil lebih optimal, bisa tambahkan:
```php
// Di method uploadGambar, gunakan library seperti Intervention Image
\Image::make($file)->resize(300, 300)->save($imgPath . '/' . $filename);
```

## Referensi

- Route: [routes/web.php](routes/web.php#L82-L83)
- Controller: [ProdukController.php](app/Http/Controllers/ProdukController.php#L476-L513)
- View Form: [create.blade.php](resources/views/produk/create.blade.php#L150-L189)
- View Menu: [menu.blade.php](resources/views/penjualan/menu.blade.php#L477-L489)

---

**Created**: January 15, 2026
**Last Updated**: January 15, 2026

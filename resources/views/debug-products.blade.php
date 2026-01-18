<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Produk</title>
    <style>
        body {
            font-family: monospace;
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 20px;
            margin: 0;
        }
        h1 {
            color: #4ec9b0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #252526;
        }
        th, td {
            border: 1px solid #3e3e42;
            padding: 12px;
            text-align: left;
        }
        th {
            background: #007acc;
            color: white;
        }
        tr:hover {
            background: #2d2d30;
        }
        .true {
            color: #4ec9b0;
        }
        .false {
            color: #f44747;
        }
        .url {
            color: #569cd6;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <h1>🔍 Debug Produk & Gambar</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Path di DB</th>
                <th>URL</th>
                <th>File Ada?</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($debug as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['kategori'] }}</td>
                    <td>{{ $item['gambar'] ?: '-' }}</td>
                    <td><span class="url">{{ $item['url'] ? substr($item['url'], -40) : '-' }}</span></td>
                    <td><span class="{{ $item['file_exists'] ? 'true' : 'false' }}">{{ $item['file_exists'] ? 'YES ✓' : 'NO ✗' }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data produk</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <br>
    <p><a href="{{ route('penjualan.menu') }}" style="color: #569cd6;">← Kembali ke Menu</a></p>
</body>
</html>

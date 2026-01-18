<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Gambar Produk</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Open Sans', sans-serif;
    }
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    h1 {
      color: #333;
      margin-bottom: 30px;
      text-align: center;
    }
    .summary {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }
    .stat-box {
      background: #f5f5f5;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
      border-left: 4px solid #667eea;
    }
    .stat-box.updated {
      border-left-color: #10b981;
    }
    .stat-box.skipped {
      border-left-color: #f59e0b;
    }
    .stat-number {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .stat-label {
      color: #666;
      font-size: 14px;
    }
    .stat-box.updated .stat-number {
      color: #10b981;
    }
    .stat-box.skipped .stat-number {
      color: #f59e0b;
    }
    .results-container {
      max-height: 400px;
      overflow-y: auto;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 15px;
      background: #fafafa;
    }
    .result-item {
      padding: 10px;
      margin-bottom: 8px;
      background: white;
      border-left: 3px solid #ddd;
      border-radius: 4px;
      font-family: 'Monaco', 'Courier New', monospace;
      font-size: 13px;
      color: #333;
    }
    .result-item.success {
      border-left-color: #10b981;
      background-color: #f0fdf4;
    }
    .result-item.warning {
      border-left-color: #f59e0b;
      background-color: #fffbf0;
    }
    .result-item.error {
      border-left-color: #ef4444;
      background-color: #fef2f2;
    }
    .back-button {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 20px;
      background: #667eea;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      text-align: center;
      transition: background 0.3s;
      border: none;
      cursor: pointer;
      font-size: 14px;
    }
    .back-button:hover {
      background: #764ba2;
    }
  </style>
</head>

  <body>
    <div class="container">
      <h1><i class="fas fa-images"></i> Update Gambar Produk</h1>
      
      <div class="summary">
        <div class="stat-box updated">
          <div class="stat-number">{{ $updated }}</div>
          <div class="stat-label">Gambar Diupdate</div>
        </div>
        <div class="stat-box skipped">
          <div class="stat-number">{{ $skipped }}</div>
          <div class="stat-label">Dilewati</div>
        </div>
        <div class="stat-box">
          <div class="stat-number">{{ $updated + $skipped }}</div>
          <div class="stat-label">Total Produk</div>
        </div>
      </div>

      <h3 style="margin-top: 30px; color: #333;">Detail Perubahan:</h3>
      <div class="results-container">
        @forelse ($results as $result)
          @if (strpos($result, '✓') === 0)
            <div class="result-item success">{{ $result }}</div>
          @elseif (strpos($result, '⊘') === 0)
            <div class="result-item warning">{{ $result }}</div>
          @else
            <div class="result-item error">{{ $result }}</div>
          @endif
        @empty
          <div class="result-item">Tidak ada hasil</div>
        @endforelse
      </div>

      <button onclick="window.location.href='{{ route('penjualan.menu') }}'" class="back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Menu
      </button>
    </div>
  </body>
</html>

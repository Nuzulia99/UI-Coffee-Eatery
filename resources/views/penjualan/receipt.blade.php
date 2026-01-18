<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Penjualan</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Courier New', monospace;
      background: #f5f5f5;
      padding: 20px;
    }

    .receipt-container {
      background: white;
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .btn-back-top {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: transparent;
      color: #3d5a73;
      border: 2px solid #3d5a73;
      cursor: pointer;
      font-size: 24px;
      padding: 10px 14px;
      transition: all 0.3s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      border-radius: 6px;
    }

    .btn-back-top:hover {
      transform: translateX(-3px);
      opacity: 0.7;
    }

    .receipt-header {
      text-align: center;
      margin-bottom: 10px;
      border-bottom: 2px solid #000;
      padding-bottom: 10px;
    }

    .logo-placeholder {
      width: 80px;
      height: 80px;
      margin: 0 auto 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .logo-placeholder img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .logo-icon {
      font-size: 40px;
      color: #999;
    }

    .store-name {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .queue-info {
      font-size: 13px;
      margin-bottom: 10px;
    }

    .transaction-info {
      font-size: 12px;
      margin-bottom: 10px;
      line-height: 1.6;
    }

    .info-line {
      display: flex;
      justify-content: space-between;
    }

    .info-label {
      flex: 0 0 auto;
    }

    .info-value {
      flex: 1;
      text-align: right;
    }

    .section-title {
      font-size: 12px;
      font-weight: bold;
      margin: 10px 0 5px 0;
    }

    .item-group {
      font-size: 12px;
      margin-bottom: 8px;
      line-height: 1.4;
    }

    .item-name {
      font-weight: bold;
    }

    .item-detail {
      font-size: 11px;
      color: #666;
      margin-left: 10px;
    }

    .item-row {
      display: flex;
      justify-content: space-between;
      margin: 2px 0;
    }

    .item-qty-price {
      flex: 1;
    }

    .item-total {
      text-align: right;
      width: 80px;
    }

    .divider {
      border-top: 1px solid #000;
      margin: 8px 0;
    }

    .summary-section {
      font-size: 12px;
      margin: 10px 0;
      line-height: 1.8;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
    }

    .summary-label {
      flex: 1;
    }

    .summary-value {
      text-align: right;
      width: 80px;
    }

    .total-row {
      font-weight: bold;
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
      padding: 5px 0;
    }

    .action-buttons {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    .btn {
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 13px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s;
      width: 100%;
    }

    .btn-print {
      background: #3d5a73;
      color: white;
      flex: 1;
    }

    .btn-print:hover {
      background: #2d3d52;
    }

    @media print {
      body {
        background: white;
        padding: 0;
      }

      .action-buttons {
        display: none;
      }

      .receipt-container {
        max-width: 100%;
        box-shadow: none;
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <div class="receipt-container">
    <button onclick="goBackSafe()" class="btn-back-top" title="Kembali">←</button>
    <!-- Header -->
    <div class="receipt-header">
      <div class="logo-placeholder">
        <img src="{{ asset('assets/img/carousel-1.png') }}" alt="UI Coffee & Eatery Logo" />
      </div>
      <div class="store-name">UI Coffee & Eatery</div>
      <div class="queue-info">QUEUE : {{ $queueNumber }}</div>
    </div>

    <!-- Transaction Info -->
    <div class="transaction-info">
      <div class="info-line">
        <span class="info-label">Date</span>
        <span class="info-value">: {{ $transactionDate }}</span>
      </div>
      <div class="info-line">
        <span class="info-label">Order Number</span>
        <span class="info-value">: {{ $orderNumber }}</span>
      </div>
      <div class="info-line">
        <span class="info-label">Customer</span>
        <span class="info-value">: {{ $customerName }}</span>
      </div>
      <div class="info-line">
        <span class="info-label">Sales Type</span>
        <span class="info-value">: Normal</span>
      </div>
      <div class="info-line">
        <span class="info-label">User</span>
        <span class="info-value">: {{ $userName }}</span>
      </div>
      <div class="info-line">
        <span class="info-label">Cashier</span>
        <span class="info-value">: {{ $userName }}</span>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Items -->
    <div>
      @foreach($items as $item)
        <div class="item-group">
          <div class="item-name">{{ strtoupper($item['name']) }}</div>
          <div class="item-row">
            <span class="item-qty-price">{{ $item['qty'] }}x  Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
            <span class="item-total">Rp {{ number_format($item['total'], 0, ',', '.') }}</span>
          </div>
        </div>
      @endforeach
    </div>

    <div class="divider"></div>

    <!-- Total Items -->
    <div style="font-size: 12px; margin-bottom: 10px;">
      Total Item {{ count($items) }}
    </div>

    <div class="divider"></div>

    <!-- Summary -->
    <div class="summary-section">
      <div class="summary-row">
        <span class="summary-label">Subtotal</span>
        <span class="summary-value">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Discount</span>
        <span class="summary-value">-(Rp {{ number_format($discountAmount, 0, ',', '.') }})</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Service Charge</span>
        <span class="summary-value">Rp {{ number_format($serviceCharge, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Tax</span>
        <span class="summary-value">Rp {{ number_format($tax, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row total-row">
        <span class="summary-label">Total</span>
        <span class="summary-value">Rp {{ number_format($total, 0, ',', '.') }}</span>
      </div>
    </div>

    <!-- Payment -->
    <div class="summary-section">
      <div class="summary-row">
        <span class="summary-label">Cash</span>
        <span class="summary-value">Rp {{ number_format($cash, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Change</span>
        <span class="summary-value">Rp {{ number_format($change, 0, ',', '.') }}</span>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <button class="btn btn-print" onclick="window.print()">
        <i class="fas fa-print"></i> Cetak
      </button>
    </div>
  </div>

  <script>
    function goBackSafe() {
      // Check if previous page is transaction page
      if (document.referrer.includes('/penjualan/transaction')) {
        // Go back twice to skip transaction page
        window.history.go(-2);
      } else {
        // Go back normally
        window.history.back();
      }
    }
  </script>
</body>
</html>

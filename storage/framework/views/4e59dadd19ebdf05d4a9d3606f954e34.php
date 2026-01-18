<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi Penjualan</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/argon-dashboard-tailwind.css')); ?>" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #4a6fa5;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      font-family: 'Open Sans', sans-serif;
      padding: 10px;
    }

    .transaction-container {
      background: white;
      border-radius: 15px;
      padding: 20px;
      max-width: 440px;
      width: 100%;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      margin-top: 10px;
      border: 2px solid #e5e7eb;
    }

    .transaction-header {
      text-align: center;
      margin-bottom: 15px;
    }

    .transaction-header h1 {
      font-size: 24px;
      color: #4b5563;
      margin-bottom: 0;
      font-weight: 600;
    }

    .transaction-items {
      margin-bottom: 15px;
      padding-bottom: 10px;
      border-bottom: 2px solid #e5e7eb;
    }

    .transaction-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background: #f9fafb;
      border-radius: 8px;
      margin-bottom: 8px;
    }

    .transaction-item-info {
      flex: 1;
    }

    .transaction-item-name {
      font-size: 13px;
      font-weight: 600;
      color: #333;
      margin-bottom: 2px;
    }

    .transaction-item-details {
      font-size: 11px;
      color: #999;
    }

    .transaction-item-qty {
      text-align: center;
      margin: 0 12px;
      min-width: 35px;
    }

    .transaction-item-qty-label {
      font-size: 10px;
      color: #999;
    }

    .transaction-item-qty-value {
      font-size: 14px;
      font-weight: bold;
      color: #333;
    }

    .transaction-item-price {
      text-align: right;
      min-width: 85px;
      color: #4a6fa5;
      font-weight: 900;
      font-size: 13px;
    }

    .transaction-summary {
      margin-bottom: 12px;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      padding: 6px 0;
      font-size: 12px;
      color: #555;
    }

    .summary-row.subtotal {
      border-bottom: 1px solid #e5e7eb;
    }

    .summary-row.tax {
      border-bottom: 1px solid #e5e7eb;
    }

    .summary-row.total {
      font-size: 16px;
      font-weight: 900;
      color: #4a6fa5;
      padding: 8px 0;
    }

    .summary-label {
      color: #555;
    }

    .summary-value {
      text-align: right;
      font-weight: 600;
    }

    .transaction-info {
      background: #f9fafb;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 12px;
      font-size: 11px;
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      padding: 3px 0;
      color: #555;
    }

    .info-label {
      font-weight: 500;
      color: #333;
    }

    .info-value {
      text-align: right;
    }

    .summary-input-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 6px 0;
      font-size: 12px;
    }

    .summary-input-row input {
      width: 120px;
      padding: 4px 6px;
      border: 1px solid #d1d5db;
      border-radius: 4px;
      font-size: 11px;
      text-align: right;
    }

    .summary-input-row input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
    }

    .payment-method {
      margin-bottom: 12px;
    }

    .payment-method-title {
      font-size: 12px;
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
    }

    .payment-options {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
    }

    .payment-option {
      padding: 8px;
      border: 2px solid #e5e7eb;
      border-radius: 6px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
      background: white;
    }

    .payment-option:hover {
      border-color: #3b82f6;
      background: #f3f4f9;
    }

    .payment-option input[type="radio"] {
      display: none;
    }

    .payment-option input[type="radio"]:checked + label {
      color: #3b82f6;
    }

    .payment-option.selected {
      border-color: #3b82f6;
      background: #f3f4f9;
    }}

    .payment-option label {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 3px;
      cursor: pointer;
      color: #555;
      font-size: 11px;
      font-weight: 500;
    }

    .payment-option-icon {
      font-size: 16px;
    }

    .customer-input {
      margin-bottom: 10px;
    }

    .customer-input label {
      display: block;
      font-size: 11px;
      font-weight: 600;
      color: #333;
      margin-bottom: 4px;
    }

    .customer-input input {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #d1d5db;
      border-radius: 6px;
      font-size: 12px;
      transition: border-color 0.3s;
    }

    .customer-input input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
    }

    .action-buttons {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
      margin-top: 12px;
    }

    .btn {
      padding: 10px 14px;
      border: none;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .btn-back {
      background: #e5e7eb;
      color: #333;
    }

    .btn-back:hover {
      background: #d1d5db;
      transform: translateX(-2px);
    }

    .btn-confirm {
      background: #4a6fa5;
      color: white;
      grid-column: 1 / -1;
    }

    .btn-confirm:hover {
      background: #3d5682;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(74, 111, 165, 0.3);
    }

    .btn-confirm:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      transform: none;
    }

    @media (max-width: 768px) {
      .transaction-container {
        padding: 20px;
      }

      .payment-options {
        grid-template-columns: 1fr;
      }

      .transaction-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .transaction-item-qty {
        width: 100%;
        text-align: left;
        margin: 0;
      }

      .transaction-item-price {
        width: 100%;
        text-align: left;
      }
    }
  </style>
</head>
<body>
  <div class="transaction-container">
    <!-- Header -->
    <div class="transaction-header">
      <h1>UI Coffee & Eatery</h1>
    </div>

    <!-- Transaction Information -->
    <div class="transaction-info">
      <div class="info-row">
        <span class="info-label">Date</span>
        <span class="info-value"><?php echo e($date); ?></span>
      </div>
      <div class="info-row">
        <span class="info-label">Order Number</span>
        <span class="info-value"><?php echo e($orderNumber); ?></span>
      </div>
      <div class="info-row">
        <span class="info-label">User</span>
        <span class="info-value"><?php echo e($user->name); ?></span>
      </div>
      <div class="info-row">
        <span class="info-label">Cashier</span>
        <span class="info-value"><?php echo e($user->name); ?></span>
      </div>
    </div>

    <!-- Customer Name Input -->
    <div class="customer-input" style="margin-bottom: 15px;">
      <label for="customerName">Nama Pelanggan</label>
      <input 
        type="text" 
        id="customerName" 
        placeholder="Masukkan nama pelanggan" 
        value="WALK-IN CUSTOMER"
        required
        style="text-transform: uppercase;"
      >
    </div>

    <!-- Transaction Items -->
    <div class="transaction-items">
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="transaction-item">
          <div class="transaction-item-info">
            <div class="transaction-item-name"><?php echo e($item['name']); ?></div>
            <div class="transaction-item-details">Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?></div>
          </div>
          <div class="transaction-item-qty">
            <div class="transaction-item-qty-label">x<?php echo e($item['qty']); ?></div>
          </div>
          <div class="transaction-item-price">Rp <?php echo e(number_format($item['total'], 0, ',', '.')); ?></div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Summary -->
    <div class="transaction-summary">
      <div class="summary-row subtotal">
        <span class="summary-label">Subtotal</span>
        <span class="summary-value">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
      </div>
    </div>

    <form action="<?php echo e(route('penjualan.confirm')); ?>" method="POST" id="confirmForm">
      <?php echo csrf_field(); ?>

      <!-- Customer Name Hidden Input -->
      <input type="hidden" id="customerNameInput" name="customer_name" value="Walk-in Customer">

      <!-- Discount Input -->
      <div class="transaction-summary" style="margin-bottom: 10px;">
        <div class="summary-input-row">
          <span class="summary-label">Discount</span>
          <div style="display: flex; align-items: center; gap: 4px;">
            <input type="number" id="discountInput" name="discount" value="0" min="0" max="100" placeholder="0" step="0.1">
            <span style="font-size: 12px; color: #666; min-width: 15px;">%</span>
          </div>
        </div>
        <div class="summary-row">
          <span class="summary-label">Service Charge (1%)</span>
          <span class="summary-value" id="serviceChargeDisplay">Rp <?php echo e(number_format($serviceCharge, 0, ',', '.')); ?></span>
        </div>
        <div class="summary-row tax">
          <span class="summary-label">Tax (2.5%)</span>
          <span class="summary-value" id="taxDisplay">Rp <?php echo e(number_format($tax, 0, ',', '.')); ?></span>
        </div>
        <div class="summary-row total">
          <span class="summary-label">Total</span>
          <span class="summary-value" id="totalDisplay">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
        </div>
      </div>

      <!-- Cash and Change Section -->
      <div class="transaction-summary" style="margin-bottom: 10px;">
        <div class="summary-input-row">
          <span class="summary-label">Cash</span>
          <div style="display: flex; align-items: center; gap: 4px;">
            <span style="font-size: 12px; color: #666;">Rp</span>
            <input type="number" id="cashInput" name="cash" value="0" min="0" placeholder="0" step="1000">
          </div>
        </div>
        <div class="summary-row">
          <span class="summary-label">Change</span>
          <span class="summary-value" id="changeDisplay">Rp 0</span>
        </div>
      </div>
      
      <!-- Hidden inputs for items and totals -->
      <input type="hidden" name="date" value="<?php echo e(date('Y-m-d')); ?>">
      <input type="hidden" name="subtotal" value="<?php echo e($subtotal); ?>">
      <input type="hidden" name="tax" value="<?php echo e($tax); ?>">
      <input type="hidden" name="total" value="<?php echo e($total); ?>">
      
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="items[<?php echo e($index); ?>][ProdukID]" value="<?php echo e($item['id']); ?>">
        <input type="hidden" name="items[<?php echo e($index); ?>][JumlahProduk]" value="<?php echo e($item['qty']); ?>">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <!-- Action Buttons -->
      <div class="action-buttons">
        <button type="submit" class="btn btn-confirm" style="grid-column: 1 / -1;">
          <i class="fas fa-check-circle"></i> Selesaikan Transaksi
        </button>
      </div>
    </form>
  </div>

  <script>
    // Customer name sync
    const customerNameInput = document.getElementById('customerName');
    const customerNameHiddenInput = document.getElementById('customerNameInput');

    customerNameInput.addEventListener('input', function() {
      customerNameHiddenInput.value = this.value || 'Walk-in Customer';
    });

    // Initial values
    const subtotal = <?php echo e($subtotal); ?>;
    const taxRate = 0.025;
    const serviceChargeRate = 0.01;
    
    const discountInput = document.getElementById('discountInput');
    const cashInput = document.getElementById('cashInput');
    const totalDisplay = document.getElementById('totalDisplay');
    const taxDisplay = document.getElementById('taxDisplay');
    const serviceChargeDisplay = document.getElementById('serviceChargeDisplay');
    const changeDisplay = document.getElementById('changeDisplay');
    const totalHiddenInput = document.querySelector('input[name="total"]');

    function formatCurrency(value) {
      return 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.round(value));
    }

    function calculateTotal() {
      const discountPercent = parseFloat(discountInput.value) || 0;
      const discountAmount = subtotal * (discountPercent / 100);
      const subtotalAfterDiscount = Math.max(0, subtotal - discountAmount);
      const serviceCharge = subtotalAfterDiscount * serviceChargeRate;
      const tax = subtotalAfterDiscount * taxRate;
      const total = subtotalAfterDiscount + serviceCharge + tax;
      
      // Update display
      serviceChargeDisplay.textContent = formatCurrency(serviceCharge);
      taxDisplay.textContent = formatCurrency(tax);
      totalDisplay.textContent = formatCurrency(total);
      
      // Calculate change
      const cashAmount = parseFloat(cashInput.value) || 0;
      const change = Math.max(0, cashAmount - total);
      changeDisplay.textContent = formatCurrency(change);
      
      // Update hidden total field
      totalHiddenInput.value = total;
    }

    function calculateChange() {
      const cashAmount = parseFloat(cashInput.value) || 0;
      const discountPercent = parseFloat(discountInput.value) || 0;
      const discountAmount = subtotal * (discountPercent / 100);
      const subtotalAfterDiscount = Math.max(0, subtotal - discountAmount);
      const serviceCharge = subtotalAfterDiscount * serviceChargeRate;
      const tax = subtotalAfterDiscount * taxRate;
      const total = subtotalAfterDiscount + serviceCharge + tax;
      const change = Math.max(0, cashAmount - total);
      
      changeDisplay.textContent = formatCurrency(change);
    }

    discountInput.addEventListener('input', calculateTotal);
    cashInput.addEventListener('input', calculateChange);

    // Set initial cash value
    calculateTotal();
  </script>

  <footer class="pt-6 text-center">
    <div class="text-sm leading-normal text-white">
      © 2026 UI Cashier & Eatery by Nuzulia Nur Azizah. All rights reserved.
    </div>
  </footer>
</body>
</html>
<?php /**PATH C:\laragon\www\coffee\resources\views/penjualan/transaction.blade.php ENDPATH**/ ?>
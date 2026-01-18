<?php
/**
 * Check nama produk di database
 */

try {
    $host = '127.0.0.1';
    $db = 'kasir';
    $user = 'root';
    $pass = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get produk dengan ID 77 (Cappuchino yang not found)
    $stmt = $pdo->query("SELECT ProdukID, NamaProduk, Gambar FROM produk WHERE ProdukID = 77 OR NamaProduk LIKE '%appu%' ORDER BY NamaProduk");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "=== Produk dengan nama Cappuccino/Cappucino ===\n\n";
    foreach ($products as $p) {
        echo "ID: {$p['ProdukID']}, Nama: {$p['NamaProduk']}, Gambar: {$p['Gambar']}\n";
    }
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<?php
/**
 * Update Cappuchino (ID 77) dengan gambar Capuchino.jpeg
 */

try {
    $host = '127.0.0.1';
    $db = 'kasir';
    $user = 'root';
    $pass = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Update Cappuchino
    $stmt = $pdo->prepare("UPDATE produk SET Gambar = ? WHERE ProdukID = ?");
    $stmt->execute(['assets/img/Capuchino.jpeg', 77]);
    
    echo "✓ Updated Cappuchino (ID 77) dengan gambar assets/img/Capuchino.jpeg\n";
    
    // Verify
    $check = $pdo->query("SELECT NamaProduk, Gambar FROM produk WHERE ProdukID = 77")->fetch();
    echo "Verifikasi: {$check['NamaProduk']} → {$check['Gambar']}\n";
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

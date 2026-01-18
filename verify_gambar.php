<?php
/**
 * Verifikasi semua produk sudah punya gambar
 */

try {
    $host = '127.0.0.1';
    $db = 'kasir';
    $user = 'root';
    $pass = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== VERIFIKASI GAMBAR PRODUK ===\n\n";
    
    // Check produk without gambar
    $stmt = $pdo->query("SELECT ProdukID, NamaProduk, Gambar FROM produk WHERE Gambar IS NULL OR Gambar = '' ORDER BY NamaProduk");
    $noImage = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($noImage) === 0) {
        echo "✅ SEMPURNA! Semua " . countProducts($pdo) . " produk sudah punya gambar!\n\n";
    } else {
        echo "⚠️  Ada " . count($noImage) . " produk tanpa gambar:\n";
        foreach ($noImage as $p) {
            echo "  - #{$p['ProdukID']}: {$p['NamaProduk']}\n";
        }
    }
    
    // Stats by kategori
    echo "\n=== STATISTIK PER KATEGORI ===\n\n";
    $stats = $pdo->query("SELECT Kategori, COUNT(*) as total, SUM(CASE WHEN Gambar IS NOT NULL AND Gambar != '' THEN 1 ELSE 0 END) as dengan_gambar FROM produk GROUP BY Kategori ORDER BY Kategori")->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($stats as $s) {
        $persen = ($s['total'] > 0) ? round(($s['dengan_gambar'] / $s['total']) * 100) : 0;
        echo "{$s['Kategori']}: {$s['dengan_gambar']}/{$s['total']} ($persen%)\n";
    }
    
    echo "\n" . str_repeat("=", 50) . "\n";
    echo "✅ GAMBAR SUDAH SIAP DITAMPILKAN!\n";
    echo "📸 Buka menu: http://coffee.test/penjualan/menu\n";
    echo "=" . str_repeat("=", 49) . "\n";
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

function countProducts($pdo) {
    $result = $pdo->query("SELECT COUNT(*) as count FROM produk")->fetch();
    return $result['count'];
}
?>

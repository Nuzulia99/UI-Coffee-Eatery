<?php
/**
 * Script untuk update gambar produk - termasuk produk yang belum di-mapping
 */

try {
    // Database credentials
    $host = '127.0.0.1';
    $db = 'kasir';
    $user = 'root';
    $pass = '';
    
    // Connect to database
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✓ Database connected\n\n";
    
    // Mapping nama produk dengan lokasi gambar
    $imageMapping = [
        // Drinks - Main
        'Espresso' => 'assets/img/Espresso.jpeg',
        'Americano' => 'assets/img/Americano.jpeg',
        'Cappucino' => 'assets/img/Capuchino.jpeg',
        'Cappuccino' => 'assets/img/Capuchino.jpeg',
        'Cappuchino Variant' => 'assets/img/Capuchino.jpeg',
        'Latte' => 'assets/img/Latte.jpeg',
        'Macchiato' => 'assets/img/Macchiato.jpeg',
        'Mocha' => 'assets/img/Mocha.jpeg',
        'Flat White' => 'assets/img/Flat White.jpeg',
        'Iced Coffee' => 'assets/img/Iced Coffee.jpeg',
        'Ice Pure Matcha' => 'assets/img/Ice Pure Matcha.jpeg',
        'Iced Pure Matcha' => 'assets/img/Ice Pure Matcha.jpeg',
        'Matcha Latte' => 'assets/img/Matcha Latte.jpeg',
        'Caramel Latte' => 'assets/img/Caramel Latte.jpeg',
        'Affogato' => 'assets/img/Affogato.jpeg',
        
        // Drinks - Tea (substitute dengan Matcha Latte atau Iced Coffee)
        'Jasmine Tea' => 'assets/img/Matcha Latte.jpeg',
        'Lemon Tea' => 'assets/img/Iced Coffee.jpeg',
        'Rosemary Berry' => 'assets/img/Iced Coffee.jpeg',
        'Blue Sea' => 'assets/img/Iced Coffee.jpeg',
        'Mojito Cocktail' => 'assets/img/Iced Coffee.jpeg',
        
        // Main Course
        'Nasi Goreng Spesial' => 'assets/img/Nasi Goreng Spesial.jpeg',
        'Mie Goreng Kampung' => 'assets/img/Mie Goreng Kampung.jpeg',
        'Ayam Goreng Kampung' => 'assets/img/Ayam Goreng Kampung.jpeg',
        'Ayam Goreng Crispy' => 'assets/img/Ayam Goreng Kampung.jpeg',
        'Steak Daging Sapi' => 'assets/img/Steak Daging Sapi.jpeg',
        'Salmon Grilled' => 'assets/img/Salmon Grilled.jpeg',
        'Pasta Carbonara' => 'assets/img/Pasta Carbonara.jpeg',
        
        // Snack
        'Chicken Wings' => 'assets/img/Chicken Wings.jpeg',
        'Onion Rings' => 'assets/img/Onion Rings.jpeg',
        'French Fries' => 'assets/img/French Fries.jpeg',
        'Fish & Chips' => 'assets/img/Fish & Chips.jpeg',
        'Calamari Goreng' => 'assets/img/Calamari Goreng.jpeg',
        'Mozzarella Stick' => 'assets/img/Mozzarella Stick.jpeg',
        'Chicken Nassvile' => 'assets/img/Chicken Nassvile.jpeg',
        'Chicken Nashville' => 'assets/img/Chicken Nashville.jpeg',
        
        // Dessert
        'Chocolate Cake' => 'assets/img/Chocolate Cake.jpeg',
        'Cheesecake' => 'assets/img/Cheese Cake.jpeg',
        'Cheese Cake' => 'assets/img/Cheese Cake.jpeg',
        'Tiramisu' => 'assets/img/Tiramisu.jpeg',
        'Ice Cream Sunday' => 'assets/img/Ice Cream Sunday.jpeg',
        'Ice Cream Sundae' => 'assets/img/Ice Cream Sunday.jpeg',
        'Brownies' => 'assets/img/Brownies.jpeg',
        'Fruit Salad' => 'assets/img/Fruit Salad.jpeg',
        'Strawberry Mochi Donut' => 'assets/img/Strawberry Mochi Donut.jpeg',
    ];
    
    // Get all products
    $stmt = $pdo->query("SELECT ProdukID, NamaProduk, Gambar FROM produk ORDER BY NamaProduk");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "=== UPDATING PRODUCT IMAGES ===\n\n";
    
    $updated = 0;
    $skipped = 0;
    $notfound = 0;
    
    foreach ($products as $product) {
        $id = $product['ProdukID'];
        $nama = $product['NamaProduk'];
        $gambarSekarang = $product['Gambar'];
        
        if (isset($imageMapping[$nama])) {
            $gambarBaru = $imageMapping[$nama];
            
            if ($gambarSekarang !== $gambarBaru) {
                // Update database
                $updateStmt = $pdo->prepare("UPDATE produk SET Gambar = ? WHERE ProdukID = ?");
                $updateStmt->execute([$gambarBaru, $id]);
                
                echo "✓ Updated (#$id): $nama\n";
                echo "  → $gambarBaru\n";
                $updated++;
            } else {
                echo "⊘ Already set (#$id): $nama\n";
                $skipped++;
            }
        } else {
            echo "✗ Not in mapping (#$id): $nama\n";
            $notfound++;
        }
    }
    
    echo "\n=== SUMMARY ===\n";
    echo "Updated:  $updated\n";
    echo "Skipped:  $skipped\n";
    echo "Not found: $notfound\n";
    echo "Total:    " . ($updated + $skipped + $notfound) . "\n";
    
    if ($updated > 0) {
        echo "\n✅ SUCCESS! {$updated} produk berhasil diupdate.\n";
        echo "📸 Gambar sekarang akan tampil di halaman menu!\n";
        echo "   Buka: http://coffee.test/penjualan/menu\n";
    }
    
} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage() . "\n");
} catch (Exception $e) {
    die("❌ Error: " . $e->getMessage() . "\n");
}
?>

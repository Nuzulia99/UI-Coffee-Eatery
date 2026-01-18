<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = \App\Models\User::where('username', 'JAKE SIM')->first();

if ($user) {
    $user->level = 'petugas';
    $user->save();
    echo "User JAKE SIM level telah diupdate menjadi: " . $user->level . "\n";
} else {
    echo "User 'JAKE SIM' tidak ditemukan\n";
}

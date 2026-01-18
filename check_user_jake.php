<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = \App\Models\User::where('username', 'jake sim')->first();

if ($user) {
    echo "User Found:\n";
    echo "Username: " . $user->username . "\n";
    echo "Level: " . $user->level . "\n";
    echo "Email: " . $user->email . "\n";
} else {
    echo "User 'jake sim' tidak ditemukan\n";
}

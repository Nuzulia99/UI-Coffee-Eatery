<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            // Add Gambar column if it doesn't exist
            if (!Schema::hasColumn('produk', 'Gambar')) {
                $table->string('Gambar')->nullable()->after('NamaProduk');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            if (Schema::hasColumn('produk', 'Gambar')) {
                $table->dropColumn('Gambar');
            }
        });
    }
};

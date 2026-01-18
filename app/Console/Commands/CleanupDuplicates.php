<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produk;

class CleanupDuplicates extends Command
{
    protected $signature = 'cleanup:duplicates';
    protected $description = 'Hapus data produk yang duplikat';

    public function handle()
    {
        $this->info('=== Membersihkan Data Duplikat ===');
        $this->newLine();

        // Cari duplikasi
        $duplicates = Produk::select('NamaProduk')
            ->groupBy('NamaProduk')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('NamaProduk');

        if ($duplicates->isEmpty()) {
            $this->info('✓ Tidak ada data duplikat!');
            return 0;
        }

        foreach ($duplicates as $nama) {
            $records = Produk::where('NamaProduk', $nama)
                ->orderBy('created_at', 'asc')
                ->get();

            $this->info("Produk: {$nama}");
            $this->info("Total: " . count($records) . " data");

            // Simpan yang pertama, hapus sisanya
            $first = $records->first();
            $this->line("  ✓ Simpan: ID {$first->ProdukID} - Stok {$first->Stok}");

            foreach ($records->skip(1) as $record) {
                $this->line("  ✗ Hapus: ID {$record->ProdukID} - Stok {$record->Stok}");
                $record->delete();
            }
            $this->newLine();
        }

        $this->info('=== Selesai! Data duplikat sudah dihapus ===');
        return 0;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\TbcRecord;

class DataTbcSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan file CSV ada di folder database/data/DataFinal.csv
        $filePath = base_path('database/data/DataFinal.csv');

        if (!file_exists($filePath)) {
            $this->command->error("File CSV tidak ditemukan di: $filePath");
            return;
        }

        $file = fopen($filePath, 'r');
        fgetcsv($file); // Melewati baris header

        while (($row = fgetcsv($file)) !== FALSE) {
            // 1. Cari atau buat wilayah (menghindari duplikasi)
            // Asumsi: kolom ke-0 di CSV adalah nama kabupaten
            $region = Region::firstOrCreate(['nama_kabupaten' => $row[0]]);

            // 2. Simpan data TBC ke tabel tbc_records
            TbcRecord::create([
                'region_id'      => $region->id,
                'tahun'          => $row[1], // Sesuaikan index
                'jumlah_kasus'   => $row[2], // Sesuaikan index
                'jumlah_kematian'=> $row[3], // Sesuaikan index
                'succes_rate'    => $row[4], // Sesuaikan index
            ]);
        }
        fclose($file);
        $this->command->info("Data berhasil diimpor!");
    }
}

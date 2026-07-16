<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\TbcRecord;
use App\Models\Faskes;
use App\Models\RegionStatistic;

class ImportDataSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = base_path('database/data/DataFinal.csv');
        $file = fopen($filePath, 'r');

        fgetcsv($file); // Lewati header

        while (($row = fgetcsv($file, 0, ";")) !== FALSE) {
            if (empty($row) || count($row) < 13) {
                continue;
            }

            // --- PROSES DATA ---
            $year = $row[1];
            $regionName = $row[2];
            $result_caseTBC = (int) $row[3];
            $result_successRate = (int) $row[4];
            $result_deathTBC = (int) $row[5];
            $result_faskes = (int) $row[10];
            $result_population_density = (int) $row[11];
            $result_poverty_rate = (float) str_replace(',', '.', $row[12]);

            // --- PROSES KOORDINAT (Membersihkan format berantakan) ---
            $latitude = $this->cleanCoordinate($row[13] ?? '0');
            $longitude = $this->cleanCoordinate($row[14] ?? '0');

            // Find or create the region
            $region = Region::firstOrCreate(
                ['name' => $regionName],
                ['latitude' => $latitude, 'longitude' => $longitude]
            );

            TbcRecord::create([
                'region_id' => $region->id,
                'year' => $year,
                'result_caseTBC' => $result_caseTBC,
                'result_deathTBC' => $result_deathTBC,
                'result_successRate' => $result_successRate,
            ]);

            Faskes::create([
                'region_id' => $region->id,
                'year' => $year,
                'result_faskes' => $result_faskes,
            ]);

            RegionStatistic::create([
                'region_id' => $region->id,
                'year' => $year,
                'population_density' => $result_population_density,
                'poverty_rate' => $result_poverty_rate,
            ]);
        }

        fclose($file);
    }

    /**
     * Fungsi pembersih koordinat
     * Mengubah "-77.158.568" atau "1.089.909.857" menjadi float murni
     */
    private function cleanCoordinate($value)
    {
        // 1. Ganti koma ke titik (jika ada koma desimal)
        $value = str_replace(',', '.', $value);

        // 2. Hapus semua titik, KECUALI titik terakhir (karena titik terakhir adalah desimal)
        $parts = explode('.', $value);
        if (count($parts) > 1) {
            $lastPart = array_pop($parts); // Ambil angka setelah titik terakhir
            $firstPart = implode('', $parts); // Gabungkan semua angka di depan
            $value = $firstPart . '.' . $lastPart;
        }

        return (float) $value;
    }
}

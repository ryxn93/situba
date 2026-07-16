<?php

namespace Database\Seeders;

use App\Models\Faskes;
use App\Models\Region;
use App\Models\RegionStatistic;
use App\Models\TbcRecord;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create
        ([
            'name' => 'Admin',
            'email' => 'adminsituba@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        // $regions =[
        //     ['name' => 'Kabupaten Semarang', 'latitude' => -7.005145, 'longitude' => 110.438125],
        //     ['name' => 'Kabupaten Demak', 'latitude' => -6.906944, 'longitude' => 110.638611],
        //     ['name' => 'Kabupaten Kendal', 'latitude' => -6.991667, 'longitude' => 110.166667],
        //     ['name' => 'Kabupaten Jepara', 'latitude' => -6.594722, 'longitude' => 110.668611],
        //     ['name' => 'Kabupaten Pati', 'latitude' => -6.748611, 'longitude' => 111.024167],
        //     ['name' => 'Kabupaten Kudus', 'latitude' => -6.808611, 'longitude' => 110.828611],
        //     ['name' => 'Kabupaten Grobogan', 'latitude' => -7.150000, 'longitude' => 110.850000],
        //     ['name' => 'Kabupaten Blora', 'latitude' => -7.150000, 'longitude' => 111.000000],
        //     ['name' => 'Kabupaten Rembang', 'latitude' => -6.700000, 'longitude' => 111.400000],
        //     ['name' => 'Kabupaten Purbalingga', 'latitude' => -7.400000, 'longitude' => 109.350000],
        // ];
        // foreach ($regions as $region) {
        //     Region::create($region);
        // }
        // $tbc_records = [
        //     ['id' => 1, 'region_id' => 1, 'year' => 2020, 'result_caseTBC' => 100, 'result_deathTBC' => 5, 'result_successRate' => 95],
        //     ['id' => 2, 'region_id' => 2, 'year' => 2020, 'result_caseTBC' => 80, 'result_deathTBC' => 3, 'result_successRate' => 96],
        //     ['id' => 3, 'region_id' => 3, 'year' => 2020, 'result_caseTBC' => 90, 'result_deathTBC' => 4, 'result_successRate' => 95],
        //     ['id' => 4, 'region_id' => 4, 'year' => 2020, 'result_caseTBC' => 70, 'result_deathTBC' => 7, 'result_successRate' => 63],
        // ];
        // foreach ($tbc_records as $tbc) {
        //     TbcRecord::create($tbc);
        // }
        // $faskes = [
        //     ['id' => 1, 'region_id' => 1, 'year' => 2020, 'result_faskes' => 30],
        //     ['id' => 2, 'region_id' => 2, 'year' => 2020, 'result_faskes' => 30],
        //     ['id' => 3, 'region_id' => 3, 'year' => 2020, 'result_faskes' => 30],
        //     ['id' => 4, 'region_id' => 4, 'year' => 2020, 'result_faskes' => 30]
        // ];
        // foreach ($faskes as $f) {
        //     Faskes::create($f);
        // }

        // $region_statistics =[
        //     ['id' => 1, 'region_id' => 1, 'year' => 2020, 'population_density' => 987, 'poverty_rate' => 5.2],
        //     ['id' => 2, 'region_id' => 2, 'year' => 2020, 'population_density' => 1000, 'poverty_rate' => 6.2],
        //     ['id' => 3, 'region_id' => 3, 'year' => 2020, 'population_density' => 537, 'poverty_rate' => 7.2],
        //     ['id' => 4, 'region_id' => 4, 'year' => 2020, 'population_density' => 789, 'poverty_rate' => 8.2]
        // ];
        // foreach ($region_statistics as $reg_stats) {
        //     RegionStatistic::create($reg_stats);
        // }
    }
}

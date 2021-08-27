<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GenderSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CountrySeeder;
use Database\Seeders\PradeshSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\MuniTypeSeeder;
use Database\Seeders\MenusTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\MunicipalitySeeder;
use Database\Seeders\CalenderTableSeeder;
use Database\Seeders\UserRolesTableSeeder;
use Database\Seeders\UserGroupsTableSeeder;
use Database\Seeders\FiscalYearsTableSeeder;
use Database\Seeders\DesignationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
//            CalenderTableSeeder::class,
            MenusTableSeeder::class,
//            DesignationsTableSeeder::class,
//            UserGroupsTableSeeder::class,
//            FiscalYearsTableSeeder::class,
//            UsersTableSeeder::class,
//            UserRolesTableSeeder::class,
//            CountrySeeder::class,
//            PradeshSeeder::class,
//            DistrictSeeder::class,
//            MuniTypeSeeder::class,
//            MunicipalitySeeder::class,
//            GenderSeeder::class,
        ]);
    }
}

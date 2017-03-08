<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(RangeSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(ProdukRangeSeeder::class);
        $this->call(KondisiSeeder::class);
    }
}

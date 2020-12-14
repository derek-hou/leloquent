<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\SUpport\Facades\DB;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'name' => 'Jewels',
                'founded_at' => '2018-09-01 19:43:18'
            ],
            [
                'name' => 'Big Boy',
                'founded_at' => '2019-11-23 19:43:43'
            ],
            [
                'name' => 'Snow',
                'founded_at' => '2020-10-09 19:43:58'
            ],
            [
                'name' => 'Powell',
                'founded_at' => '2020-12-01 19:44:03'
            ],
            [
                'name' => 'Synydy',
                'founded_at' => '2020-11-17 19:44:08'
            ]
        ]);
    }
}

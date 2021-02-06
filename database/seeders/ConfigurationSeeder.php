<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'data_inicio' => Carbon::create(2020,02,13,15),
            'data_fim'  => Carbon::create(2020,02,13,18),
            'intervalo' => 20,
            'quantidade_atendentes' => 5
        ],[
            'data_inicio' => Carbon::create(2020,02,14,8),
            'data_fim'  => Carbon::create(2020,02,14,12),
            'intervalo' => 20,
            'quantidade_atendentes' => 5
        ],[
            'data_inicio' => Carbon::create(2020,02,21,8),
            'data_fim'  => Carbon::create(2020,02,21,12),
            'intervalo' => 20,
            'quantidade_atendentes' => 5
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')->truncate();
        DB::table('agendas')->insert( $this->createHorarios( Carbon::create(2021,02,12,15), Carbon::create(2021,02,12,18), 20, 5 ) );
        DB::table('agendas')->insert( $this->createHorarios( Carbon::create(2021,02,13,15), Carbon::create(2021,02,13,18), 20, 5 ) );
        DB::table('agendas')->insert( $this->createHorarios( Carbon::create(2021,02,14,8), Carbon::create(2021,02,14,12), 20, 5 ) );
        DB::table('agendas')->insert( $this->createHorarios( Carbon::create(2021,02,21,8), Carbon::create(2021,02,21,12), 20, 5 ) );

    }

    // TODO Mover, futuramente, para o método que criará os horários a partir da data de início e data final, com os devidos intervalos
    private function createHorarios( $dataInicio, $dataFinal, $intervalo, $quantidade ){
        $horarios = [];
        while( $dataInicio->lessThan( $dataFinal ) ){
            for( $i = 0; $i < $quantidade; $i++ ){
                array_push( $horarios, [
                    'horario' => $dataInicio->copy(),
                ] );
            }
            $dataInicio = $dataInicio->addMinutes( $intervalo );
        }
        return $horarios;
    }
}

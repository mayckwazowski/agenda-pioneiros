<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    public function vagas() {
        DB::table('agendas')->insert( $this->createHorarios( Carbon::create(2021,02,21,14), Carbon::create(2021,02,21,17), 20, 15 ) );

        return view('confirmacaoVagas');
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

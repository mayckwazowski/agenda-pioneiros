<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda', ['horarios' => Agenda::where("reservado", false)->select('horario')->distinct()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $agenda = Agenda::where('horario', $request['horario'])
        ->where("reservado", false)
        ->first();
        $success = false;
        $dados = [];
        if( $agenda != null ){
            $agenda->nome = $request["nome"];
            $agenda->telefone = $request["celular"];
            $agenda->inscritos = $request["inscritos"];
            $agenda->reservado = true;

            $agenda->save();
            $success = true;
            $dados = [
                "horario" => $agenda->horario->format('d/m/Y à\s H:i'),
                "telefone" => $agenda->telefone
            ];
        }

        // return view("confirmacao", [ "mensagem" => json_encode( $request )  ]);
        return view("confirmacao", [ "success" => $success, "agendas" => Agenda::all(), "dados" => $dados  ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Reserva;
use App\Unidade;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');

        $reservas = DB::table('reserva')
            ->join('users', 'users.id', '=', 'reserva.id_usuario')
            ->join('unidades', 'unidades.id_unidade', '=', 'reserva.id_unidade')
            ->select('reserva.*', 'users.id', 'users.name', 'unidades.id_unidade', 'unidades.nome_unidade')
            ->get();


        return view('reserva.index', ['reservas' => $reservas,  'mensagem'  => $mensagem]);
    }

    public function listar(Request $request, $mes, $ano)
    {

        if (empty($mes)) {
            $mes = date('m');
            $ano = date('Y');
        }

        $reservas_mes_ano = DB::table('reserva')
            ->join('users', 'users.id', '=', 'reserva.id_usuario')
            ->join('unidades', 'unidades.id_unidade', '=', 'reserva.id_unidade')
            ->join('periodo', 'periodo.id_reserva', '=', 'reserva.id_reserva')
            ->join('instancia', 'instancia.id_instancia', '=', 'periodo.id_instancia')

            ->select(
                'reserva.*',
                'users.id',
                'users.name',
                'unidades.id_unidade',
                'unidades.nome_unidade',
                'periodo.*',
                'instancia.*'
            )
            ->distinct('reserva.id_reserva')
            ->whereMonth('periodo.data_inicial', $mes)
            ->whereYear('periodo.data_inicial', $ano)
            ->get();

            return response()->json([
                'reservas' => $reservas_mes_ano,
                'mes' => $mes, 
                'ano' => $ano
            ]);

        //return  ['reservas' => $reservas_mes_ano, 'mes' => $mes, 'ano' => $ano];
    }


    //CRIAR
    public function create()
    {
        $unidades = DB::table('unidades')->select('*')->get();

        return view('reserva.edit', ['unidades' => $unidades]);
    }

    public function store(Request $request)
    {


        // Validação: Vamos validar se o campo equipamento está preenchido

        $reserva = Reserva::create([

            'nome_atividade' => $request->nome_atividade,
            'nome_solicitante' => $request->nome_solicitante,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'departamento' => $request->departamento,
            'descricao_atividade' => $request->descricao_atividade,
            'obs' => $request->obs,
            'status' => '',
            'id_usuario' => '1', //https://stackoverflow.com/questions/45522428/how-to-get-current-user-id-in-laravel-5-4/51926832
            'id_unidade' => $request->unidade
        ]);

        // Informar ao usuário sobre o status da sua requsição
        $request->session()->flash(
            'mensagem',
            "Reserva {$reserva->nome_atividade}, foi criada com sucesso!"
        );

        return redirect()->route('reserva_home');
    }

    // ATUALIZAR

    public function update(Request $request, $id_reserva)
    {

        // validação
        $this->validate($request, [

            'nome_equipamento' => 'required|min:3',
            'nome_atividade' =>  'required|min:3',
            'nome_solicitante' =>  'required|min:3',
            'email' =>  'required|min:3',
            'telefone' =>  'required|min:9',
            'departamento' =>  'required|min:3',
            'descricao_atividade' =>  'required|min:3',
            'obs' =>  'required|min:3',
            'status' => '',
            'id_usuario' => '',
            'id_unidade' =>  'required|min:1'

        ]);

        Reserva::where('id_reserva', $id_reserva)->update([

            'nome_atividade' => $request->nome_atividade,
            'nome_solicitante' => $request->nome_solicitante,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'departamento' => $request->departamento,
            'descricao_atividade' => $request->descricao_atividade,
            'obs' => $request->obs,
            'status' => '',
            'id_usuario' => '1', //https://stackoverflow.com/questions/45522428/how-to-get-current-user-id-in-laravel-5-4/51926832
            'id_unidade' => $request->unidade

        ]);

        // Imprimir em uma sessão flash
        $request->session()->flash(
            'mensagem',
            "A reserva {$request->nome_atividade} foi atualizada com sucesso!"
        );

        return redirect()->route('equipamentos_home');
    }

    //EDITAR

    public function edit($id_reserva)
    {
        //$equipamento = Equipamento::where('id_equipamento', $id_equipamento)->firstOrFail();
        $unidades = DB::table('unidades')->select('*')->get();

        $reservas = DB::table('reserva')
            ->join('users', 'users.id', '=', 'reserva.id_usuario')
            ->join('unidades', 'unidades.id_unidade', '=', 'reserva.id_unidade')
            ->join('periodo', 'periodo.id_reserva', '=', 'reserva.id_reserva')
            ->join('instancia', 'instancia.id_instancia', '=', 'periodo.id_instancia')
            ->join('equipamentos_x_reserva', 'equipamentos_x_reserva.id_reserva', '=', 'reserva.id_reserva')
            ->join('equipamentos', 'equipamentos.id_equipamento', '=', 'equipamentos_x_reserva.id_equipamento')
            ->select(
                'reserva.*',
                'users.id',
                'users.name',
                'unidades.id_unidade',
                'unidades.nome_unidade',
                'periodo.*',
                'instancia.*',
                'equipamentos.*',
                'equipamentos_x_reserva.*'
            )
            ->where('reserva.id_reserva', $id_reserva)
            ->get();

        return view('reserva.edit', ['reserva' => $reservas, 'unidades' => $unidades]);
    }
}

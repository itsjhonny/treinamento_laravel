<?php

namespace App\Http\Controllers;

use App\Equipamento;
use Illuminate\Http\Request;
use App\Http\Requests\EquipamentosFormRequest;

class EquipamentosController extends Controller
{
    // LISTAR

    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $equipamentos = Equipamento::query()->orderBy('nome_equipamento')->get();
        return view('equipamentos.index', ['equipamentos' => $equipamentos,  'mensagem'  => $mensagem]);
    }

    //CRIAR
    public function create()
    {
        return view('equipamentos.edit');
    }

    public function store(EquipamentosFormRequest $request)
    {

        // Validação: Vamos validar se o campo equipamento está preenchido
        
        $equipamento = Equipamento::create([
            'nome_equipamento'          => $request->nome_equipamento,            
        ]);
        
        // Informar ao usuário sobre o status da sua requsição
        $request->session()->flash(
            'mensagem', "Equipamento {$equipamento->nome_equipamento}, foi criada com sucesso!"
        );

        return redirect()->route('equipamentos_home');
    }

    // EXIBIR
    
    public function show($id_equipamento)
    {
        $equipamento = Equipamento::where('id_equipamento', $id_equipamento)->firstOrFail();
      
        return view('equipamentos.show', compact('equipamento'));
    }

    // ATUALIZAR

    public function update(Request $request, $id_equipamento)
    {
        $equipamento = Equipamento::where('id_equipamento', $id_equipamento)->firstOrFail();    

        // validação
        $this->validate($request, [
            
            'nome_equipamento' => 'required|min:3',
            
        ]);

        $equipamento->where('id_equipamento', $id_equipamento)->update([
            
            'nome_equipamento'=>$request->nome_equipamento
        
        ]);

        // Imprimir em uma sessão flash
        $request->session()->flash(
            'mensagem', 
            "Infração de id {$request->id_equipamento} foi atualizada com sucesso!"
        );
        
        return redirect()->route('equipamentos_home');
    }

    public function edit($id_equipamento)
    {
        $equipamento = Equipamento::where('id_equipamento', $id_equipamento)->firstOrFail();

        return view('equipamentos.edit', [ 'equipamento' => $equipamento ]);
    }

    //EXCLUIR 

    public function destroy(Request $request)
    {
        // Pedir para o model apagar de acrdo com o ID vindo na request
        // Infracao::destroy($request->id);
        Equipamento::where('id_equipamento', $request->id_equipamento)->delete();

        $request->session()->flash(
            'mensagem', "Infração com ID {$request->id_equipamento} foi removida com sucesso!"
        );

        return redirect()->route('equipamentos_home');
    }
}

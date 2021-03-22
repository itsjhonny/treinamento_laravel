@extends('layout')

@section('cabecalho')
Detalhe do equipamento #{{ $equipamento->id_equipamento }}
@endsection

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">{{$mensagem}}</div>
    @endif

    <table class="table table-stripped">
        <tbody>
            <tr>
                <td>Id do Equipamento</td><td>{{ $equipamento->id_equipamento }}</td>
            </tr>
            <tr>
                <td>Nome do Equipamento:</td><td>{{ $equipamento->nome_equipamento }}</td>
            </tr>
            
        </tbody>
    </table>
    <a href="#" class="btn btn-primary" onclick="window.print()">Imprimir</a>
    <a href="/equipamentos" class="btn btn-primary">Voltar</a>
@endsection
@extends('layout')

@section('cabecalho')
<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" type="text/css" href="{{ asset('/js/datetimepicker/jquery.datetimepicker.css') }}">
</link>
<script src="{{ asset('/js/datetimepicker/jquery.js') }}"></script>
<script src="{{ asset('/js/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

<!-- Telefone Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

@if(isset($reserva[0]->id_reserva))
Editar Reserva #{{ $reserva[0]->id_reserva }}
@else
Criar Reserva
@endif
@endsection

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif

@if(isset($reserva[0]->id_reserva))
<form action="{{ route('atualizar_reserva', $reserva[0]->id_reserva) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('criar_reserva') }}" method="POST">
        @endif


        @csrf



        <div class="form-group">
            <label for="nome_atividade">Nome da Atividade:</label>
            @if(isset($reserva[0]->nome_atividade))
            <input type="text" name="nome_atividade" id="nome_atividade" class="form-control" value="{{ old('nome_atividade', $reserva[0]->nome_atividade) ?? '' }}">
            @else
            <input type="text" name="nome_atividade" id="nome_atividade" class="form-control" value="">
            @endif

            <label for="nome_solicitante">Nome do Solicitante:</label>
            @if(isset($reserva[0]->nome_solicitante))
            <input type="text" name="nome_solicitante" id="nome_solicitante" class="form-control" value="{{ old('nome_solicitante', $reserva[0]->nome_solicitante) ?? '' }}">
            @else
            <input type="text" name="nome_solicitante" id="nome_solicitante" class="form-control" value="">
            @endif

            <label for="email">E-mail:</label>
            @if(isset($reserva[0]->email))
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $reserva[0]->email) ?? '' }}">
            @else
            <input type="email" name="email" id="email" class="form-control" value="">
            @endif

            <label for="telefone">Telefone:</label>
            @if(isset($reserva[0]->telefone))
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $reserva[0]->telefone) ?? '' }}">
            @else
            <input type="text" name="telefone" id="telefone" class="form-control" value="">
            @endif

            <label for="departamento">Departamento:</label>
            @if(isset($reserva[0]->departamento))
            <input type="text" name="departamento" id="departamento" class="form-control" value="{{ old('departamento', $reserva[0]->departamento) ?? '' }}">
            @else
            <input type="text" name="departamento" id="departamento" class="form-control" value="">
            @endif

            <label for="descricao_atividade">Descrição da atividade:</label>
            @if(isset($reserva[0]->descricao_atividade))
            <textarea type="text" name="descricao_atividade" id="descricao_atividade" class="form-control" value="{{ old('descricao_atividade', $reserva[0]->descricao_atividade) ?? '' }}"></textarea>
            @else
            <textarea type="text" name="descricao_atividade" id="descricao_atividade" class="form-control" value=""></textarea>
            @endif

            <label for="obs">OBS:</label>
            @if(isset($reserva[0]->obs))
            <textarea type="text" name="obs" id="obs" class="form-control" value="{{ old('obs', $reserva[0]->obs) ?? '' }}"></textarea>
            @else
            <textarea type="text" name="obs" id="obs" class="form-control" value=""></textarea>
            @endif


            <label for="unidade">Unidade:</label>

            <select name="unidade" id="unidade" class="form-control">
                @if(isset($reserva[0]->nome_unidade))
                <option value="{{$reserva[0]->nome_unidade}}" selected disabled>{{$reserva[0]->nome_unidade}}</option>
                @else
                <option value="" selected disabled>Selecione uma unidade</option>
                @endif
                @foreach ($unidades as $unidade)

                <option value="{{ $unidade->id_unidade }}">{{ $unidade->sigla_unidade }}</option>

                @endforeach

            </select>




            <div style="display: inline-block">
                <div class="form-group">
                    <label for="data_inicial">Horário de início:</label>
                    <div class="input-group date">

                        @if(isset($reserva[0]->data_inicial))
                        <input type="text" style="pointer-events: none" placeholder="Clique no calendário" name="data_inicial" id="data_inicial" class="form-control" value="{{ old('obs', $reserva[0]->data_inicial) ?? '' }}">

                        @else
                        <input type="text" style="pointer-events: none" placeholder="Clique no calendário" name="data_inicial" id="data_inicial" class="form-control" value="">

                        @endif

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="jQuery('#data_inicial').datetimepicker('show');"><i class="fa fa-calendar" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div style="display: inline-block">
                <div class="form-group">
                    <label for="data_final">Horário de término:</label>
                    <div class="input-group date">
                        @if(isset($reserva[0]->data_final))
                        <input type="text" style="pointer-events: none" placeholder="Clique no calendário" name="data_final" id="data_final" class="form-control" value="{{ old('obs', $reserva[0]->data_final) ?? '' }}">

                        @else

                        <input type="text" style="pointer-events: none" placeholder="Clique no calendário" name="data_final" id="data_final" class="form-control" value="">
                        @endif
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="jQuery('#data_final').datetimepicker('show');"><i class="fa fa-calendar" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Salvar
        </button>



    </form>
    <script>
        $(function() {

            $("#telefone").mask("(99) 9999-9999")

            //https://xdsoft.net/jqplugins/datetimepicker/

            $.datetimepicker.setLocale('pt');

            $('#data_inicial,#data_final').datetimepicker({

                closeOnDateSelect: false,
                format: 'Y-m-d H:i',
                onChangeDateTime: function(dp, $input) {
                    if ($input.val() == '2021-03-10 09:00') {
                        $('#data_inicial').val('')
                        alert('Horário não disponível')

                    }

                }
            });

        });
    </script>



    @endsection
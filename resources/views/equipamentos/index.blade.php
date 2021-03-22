@extends('layout')
@section('cabecalho', 'Listagem de Equipamentos')
@section('conteudo')

<!-- Table Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif





<div class="col-xs-2 mb-3">
    <a href="/equipamentos/criar" class="btn btn-dark mb-2">
        Adicionar
    </a>
</div>

<table class="table table-dark" id="table-equipamentos">

    <thead>
        <tr>
            <th>Id</th>
            <th>Nome do Equipamento</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($equipamentos as $equipamento)
        <tr>
            <td>{{ $equipamento->id_equipamento }}</td>
            <td>{{ $equipamento->nome_equipamento }}</td>

            <td>
                <div class="d-flex justify-content-center">


                    <a href="{{ route('exibir_equipamento', $equipamento->id_equipamento)}}" class="btn btn-primary btn-sm mr-1">
                        <i class="fas fa-eye"></i>
                    </a>



                    <a href="{{ route('form_editar_equipamento', $equipamento->id_equipamento)}}" class="btn btn-success btn-sm mr-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>



                    <form action="/equipamentos/excluir/{{ $equipamento->id_equipamento }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o equipamento ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

<script>
    $(document).ready(function() {
        tableEquipamentos()
    });

    function tableEquipamentos() {
        $('#table-equipamentos').DataTable({
            "language": {
                "info": "",
                sLengthMenu: "Listar _MENU_ itens",
                search: "Buscar",
                searchPlaceholder: "Nome do equipamento",
                "paginate": {
                    "previous": "Voltar",
                    "next": "Avançar"
                }
            },
            columnDefs: [{
                orderable: false,
                targets: -1
            }],
            // esconder paginacao quando so tiver uma pagina
            drawCallback: function(settings) {
                const pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });

    }
</script>


@endsection
@extends('layout')

@section('cabecalho', 'Listagem de Reservas')

@section('conteudo')


<!-- Table Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<!-- FullCallendar -->
<link rel="stylesheet" type="text/css" href="{{ asset('/fullcallendar/main.css') }}">
<script src="{{ asset('/fullcallendar/main.js') }}"></script>


@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<div class="col-xs-2 mb-3">
    <a href="/reserva/criar" class="btn btn-dark mb-2">
        Adicionar
    </a>

</div>


<style>
    table {
        width: 100% !Important;
    }
</style>


<div>
    <table class="table table-dark" id="table-reservas">

        <thead>
            <tr>
                <th>Id</th>
                <th>Nome da Atividade</th>
                <th>Solicitante</th>
                <th>E-mail</th>
                <th>Departamento</th>
                <th>Descrição</th>
                <th>Obs</th>
                <th>Status</th>
                <th>Usuário</th>
                <th>Unidade</th>
                <td></td>
            </tr>
        </thead>

        <tbody>

            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id_reserva }}</td>
                <td>{{ $reserva->nome_atividade }}</td>
                <td>{{ $reserva->nome_solicitante }}</td>
                <td>{{ $reserva->email }}</td>
                <td>{{ $reserva->departamento }}</td>
                <td>{{ $reserva->descricao_atividade }}</td>
                <td>{{ $reserva->obs }}</td>
                <td>{{ $reserva->status }}</td>
                <td>{{ $reserva->name }}</td>
                <td>{{ $reserva->nome_unidade }}</td>



                <td>
                    <div class="d-flex justify-content-center">


                        <a href="#" class="btn btn-primary btn-sm mr-1">
                            <i class="fas fa-eye"></i>
                        </a>



                        <a href="{{ route('form_editar_reserva', $reserva->id_reserva)}}" class="btn btn-success btn-sm mr-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>



                        <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o reserva ?')">
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
</div>


<script>
    var reservas = [];

    function getData(p_mes, p_ano) {
        reservas = []

        return $.get(`/reserva/listar/${p_mes}/${p_ano}`, function(data) {

            for (let i = 0; i < data.reservas.length; i++)

                reservas.push({
                    title: data.reservas[i].nome_atividade,
                    start: data.reservas[i].data_inicial.replace(" ", "T"),
                    end: data.reservas[i].data_final.replace(" ", "T"),
                    constraint: 'businessHours',
                    id: data.reservas[i].id_reserva
                })

        });

        console.log(reservas)

    };


    $(document).ready(function() {

        // tableReserva()
        setTimeout(function() {
            const params = new URL(location.href).searchParams;
            let mes = params.get('mes');
            let ano = params.get('ano');
            let instancia = params.get('instancia');
            let mes_final = null;
            let ano_final = null;


            $(".fc-next-button").click(function() {
                //alert(mes)

                if (parseInt(mes) + 1 < 10) {
                    mes = parseInt(mes) + 1
                    mes_final = '0' + mes
                } else {
                    mes_final = parseInt(mes) + 1
                }

                if (parseInt(mes) + 1 > 12) {
                    mes_final = '01'
                    ano_final = parseInt(ano) + 1

                } else {
                    ano_final = ano
                }


                window.location.href = "/reserva?instancia=0&mes=" + mes_final + "&ano=" + ano_final;
            });




            $(".fc-prev-button").click(function() {

 
                if (parseInt(mes) - 1 < 10) {
                    mes_final = '01';
                } else {
                    mes_final = parseInt(mes) - 1
                }

                if (parseInt(mes) - 1 < 1) {
                    mes_final = 12
                    ano_final = parseInt(ano) - 1
                } else {
                    ano_final = ano
                }
                window.location.href = "/reserva?instancia=0&mes=" + mes_final + "&ano=" + ano_final;

            });



        }, 1000);







    });


    function tableReserva() {
        $('#table-reservas').DataTable({
            lengthChange: false,
            autoWidth: false,
            "deferRender": true,
            bSort: false,
            "language": {
                "info": "",
                sLengthMenu: "Listar _MENU_ itens",
                search: "Buscar",
                searchPlaceholder: "",
                "paginate": {
                    "previous": "Voltar",
                    "next": "Avançar"
                }
            },
            /*columnDefs: [
               { orderable: false, targets:  [ 0,1,2,3,4,5,6,7,8,9,10  ]}
            ], */
            // esconder paginacao quando so tiver uma pagina
            drawCallback: function(settings) {
                const pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });
    }





    document.addEventListener('DOMContentLoaded', async function() {
        var calendarEl = document.getElementById('calendar');

        const params = new URL(location.href).searchParams;
        const mes = params.get('mes');
        const ano = params.get('ano');


        await getData(mes, ano)



        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },

            initialDate: `${ano}-${mes}-01T00:00:00`,
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: true,
            selectable: true,
            events: reservas,
            eventClick: function(event, element) {

                $('#calendar').fullCalendar('updateEvent', event);

            }

        });

        calendar.render();
    });
</script>


<div id='calendar'></div>


<script>

</script>

@endsection
@extends('adminlte::page')

@section('content')
    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Prontuário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Quadro Geral</a></li>
                        <li class="breadcrumb-item active">Prontuário</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <section class="content-wrapper">
        <div class="container-fluid">

            {{-- Menu --}}
            <div class="card lotes" id='mymenu'>
                <form action="" id="cform">
                    <div class="card-body text-center">

                        <a class="btn btn-app ml-0 vazia">
                            <span class="badge bg-success">
                                {{-- {{ $lstanimal->where('idtipo_lote', '=', '1')->count() }} --}}
                                <span class="vazia" id="vazia"></span>
                            </span>
                            <i class="fab fa-creative-commons-zero"></i><small> Vazia</small>
                        </a>
                        <a class="btn btn-app vacaseca">
                            <span class="badge bg-orange">
                                <span id="vacaseca"></span>
                            </span>
                            <i class="fas fa-circle-notch"></i><small> Vacas Secas</small>
                        </a>
                        <a class="btn btn-app pre-parto">
                            <span class="badge bg-light">
                                <span id="pre-parto"></span>
                            </span>
                            <i class="fas fa-ambulance"></i><small> Pré-Parto</small>
                        </a>
                        <a class="btn btn-app pos-parto">
                            <span class="badge bg-maroon">
                                <span id="pos-parto"></span>
                            </span>
                            <i class="fas fa-briefcase-medical"></i><small> Pós-Parto</small>
                        </a>
                        <a class="btn btn-app primiparas">
                            <span class="badge bg-primary">
                                <span id="primiparas"></span>
                            </span>
                            <i class="fab fa-product-hunt"></i><small> Primíparas</small>
                        </a>
                        <a class="btn btn-app baixaproducao">
                            <span class="badge bg-danger">
                                <span id="baixaproducao"></span>
                            </span>
                            <i class="fas fa-hand-holding"></i><small> Baixa Produção</small>
                        </a>
                        <a class="btn btn-app altaproducao">
                            <span class="badge bg-blue">
                                <span id="altaproducao"></span>
                            </span>
                            <i class="fas fa-hand-holding-usd"></i><small> Alta Produção</small>
                        </a>
                        <a class="btn btn-app bezerreiro">
                            <span class="badge bg-green">
                                <span id="bezerreiro"></span>
                            </span>
                            <i class="fas fa-baby-carriage"></i><small> Bezerreiro</small>
                        </a>
                        <a class="btn btn-app enfermaria">
                            <span class="badge bg-warning">
                                <span id="enfermaria"></span>
                            </span>
                            <i class="fas fa-clinic-medical"></i><small> Enfermaria</small>
                        </a>
                        <a class="btn btn-app triagem">
                            <span class="badge bg-indigo">
                                <span id="triagem"></span>
                            </span>
                            <i class="fas fa-laptop-house"></i><small> Triagem</small>
                        </a>

                    </div>
                    <!-- /.card-body -->
                </form>
            </div>

            {{-- Grid --}}
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">Lote de Animais </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    {{-- Tabela com a Dieta Montada --}}
                    <table class="table table-striped table-sm" id="ingredientes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Dias de Vida</th>
                                <th scope="col">Data de Chegada</th>
                                <th scope="col">Peso de Entrada</th>
                                <th scope="col">Lote</th>
                                <th scope="col">Tipo do Lote</th>
                            </tr>
                        </thead>
                        <tbody id="tblingredientes"></tbody>
                    </table>

                </div>
                <!-- /.card-body -->

            </div>

        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    {{-- <link rel="stylesheet" href="css/app.css" /> --}}
    <style>
        .button-action {
            margin-end: 10px;
        }

    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //--> Inclusão do Token CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //--> Carregamento Principal
        $(document).ready(function() {
            //listar();
            lstLotes();
        });

        //--> Inserir um novo animal
        $(document).on('click', '.vazia', function(e) {
            e.preventDefault();
        });
        //-- end

        //--> Atualiza as quantidades para cada lote
        var lstLotes = function() {

            var data = {
                idanimal: 1,
            };
            $.ajax({
                type: "POST",
                url: "/getLotesAnimal",
                data: data,
                dataType: "json",
                success: function(response) {
                    //--
                    if (response.status == 200) {
                        $("#vazia").html(response.objeto.filter(x => x.idtipo_lote === 1).length);
                        $("#vacaseca").html(response.objeto.filter(x => x.idtipo_lote === 2).length);
                        $("#pre-parto").html(response.objeto.filter(x => x.idtipo_lote === 3).length);
                        $("#pos-parto").html(response.objeto.filter(x => x.idtipo_lote === 4).length);
                        $("#primiparas").html(response.objeto.filter(x => x.idtipo_lote === 5).length);
                        $("#baixaproducao").html(response.objeto.filter(x => x.idtipo_lote === 6).length);
                        $("#altaproducao").html(response.objeto.filter(x => x.idtipo_lote === 7).length);
                        $("#bezerreiro").html(response.objeto.filter(x => x.idtipo_lote === 8).length);
                        $("#enfermaria").html(response.objeto.filter(x => x.idtipo_lote === 9).length);
                        $("#triagem").html(response.objeto.filter(x => x.idtipo_lote === 10).length);
                    }
                }
            });
        };
        //-- end

        //--> Carregamento Inicial do Grid de Animais
        var listar = function() {

        };
        //-- end

        //--> Função incorporada ao botão dentro do grid.
        var msgs = function(idanimal) {

            var data = {
                idanimal: idanimal,
            };
            //-- .end

            //--> Obtem o animal pelo ID
            var animal = function() {
                var tmp = null;
                $.ajax({
                    type: "GET",
                    url: "/getAnimal",
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function(response) {
                        tmp = response.data[0];
                    }
                });
                return tmp;
            }();

            //-- .end

            //--> Carrega a modal de associação - HTML
            $.ajax({
                type: "POST",
                url: "/getTipoLote",
                data: data,
                dataType: "json",
                success: function(response) {

                    //--> Parametrização
                    var options = {};
                    $.map(response.data,
                        function(o) {
                            options[o.idtipo_lote] = o.nome;
                        });


                }
            });
            //--> .end

        };
        //--> .end msgs
    </script>
@stop

@extends('adminlte::page')


@section('content')

    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quadro Geral do Rebanho</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Home</a></li>
                        <li class="breadcrumb-item active">Rebanho</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <section class="content-wrapper">
        <div class="container-fluid">

            <!-- Default box -->
            <div class="card  card-success card-outline">
                <div class="card-body pb-0">

                    <!-- Info: quantitativos -->
                    <div class="row">

                        <div class="col-md-3 col-sm-6 col-3">
                            <div class="info-box shadow-lg">
                                <span class="info-box-icon bg-warning"><i class="fas fa-exclamation-triangle"></i></span>

                                {{-- Aguardando Triagem --}}
                                <div class="info-box-content">
                                    <span class="info-box-text">Aguardando Triagem</span>
                                    <span class="info-box-number">
                                        {{ $totalemtriagem }} {{ $totalemtriagem > 1 ? 'animais' : 'animal' }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ($totalemtriagem * 100) / $total; ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Corresponde a {{ round(($totalemtriagem * 100) / $total) }}% do rebanho
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        {{-- Em Lactação --}}
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box shadow-lg">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fill-drip"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Em Lactação</span>
                                    <span class="info-box-number">
                                        {{ $totalemlactacao }} {{ $totalemlactacao > 1 ? 'animais' : 'animal' }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ($totalemlactacao * 100) / $total; ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Corresponde a {{ round(($totalemlactacao * 100) / $total) }}% do rebanho
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        {{-- Enfermaria --}}
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box shadow-lg mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Na Enfermaria</span>
                                    <span class="info-box-number">
                                        {{ $totalenfermas }} {{ $totalenfermas > 1 ? 'animais' : 'animal' }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ($totalenfermas * 100) / $total; ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Corresponde a {{ round(($totalenfermas * 100) / $total) }}% do rebanho
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        {{-- Aguardando Cobertura --}}
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box shadow-lg mb-3">
                                <span class="info-box-icon bg-teal elevation-1"><i
                                        class="fas fa-prescription-bottle-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Aguardando Cobertura</span>
                                    <span class="info-box-number">
                                        {{ $totalcobertura }} {{ $totalcobertura > 1 ? 'animais' : 'animal' }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ($totalcobertura * 100) / $total; ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Corresponde a {{ round(($totalcobertura * 100) / $total) }}% do rebanho
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->

                    <!-- Info: Gráfico -->
                    <div class="row">

                        <!-- Coluna 1: Help -->
                        <div class="col-md-8">
                            {{-- Grid --}}
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h5><i class="fab fa-mendeley p-1 "></i>Rebanho Leiteiro</h5>

                                    <p>Esses espaço é dedicada ao cadastro de novos animais. São informados dados básicos,
                                        como:</p>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body bg-light">
                                    <table class="ui celled table" id="lstanimallote" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Brinco</th>
                                                <th>Nome</th>
                                                <th>Tipo de Lote</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->

                            </div>
                        </div>

                        {{-- Gráfico --}}
                        <div class="col-md-4">

                            <div class="card collapsed-card">

                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-chart-line"></i> Gráfico - Situação do
                                        Rebanho</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                {{-- <div class="card-header">

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div> --}}

                                <div class="card-body">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <canvas id="donutChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 485px;"
                                        width="485" height="250" class="chartjs-render-monitor"></canvas>
                                </div>

                            </div>

                        </div>
                        {{-- .end Gráfico --}}

                    </div>

                </div>

            </div>
            <!-- /.card -->

        </div>
    </section>

    {{-- Modal: Atualizar --}}
    <section>
        <div class="modal fade" id="modal-atualizar" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog">

                <div class="modal-content">
                    <form action="{{ route('update.animal') }}" method="POST" enctype="multipart/form-data"
                        id="formavatar">
                        @csrf
                        <div class="modal-body">

                            <div class="container-fluid align-left">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="card card-success card-outline">

                                            <div class="card-header">
                                                <h3 class="card-title">Atualizar a Foto do Animal</h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">

                                                    {{-- Image Antiga --}}
                                                    <div class="form-group col-sm-5">
                                                        <div class="row attachment-block clearfix ">
                                                            <div class="form-group col-sm-12">
                                                                <img src="" class="img-thumbnail img-responsive img-fluid"
                                                                    id="avatar-atual">
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <p class="lead text-muted text-center mt-1">
                                                                    <i class="fas fa-check"></i><small> Imagem
                                                                        atual</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-2 mt-5">
                                                        <div class="row text-center">
                                                            <div class="form-group col-sm-12">
                                                                <i class="fas fa-arrow-left fa-3x"></i>
                                                                {{-- <i class="fas fa-exchange-alt fa-3x"></i> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Image Nova --}}
                                                    <div class="form-group col-sm-5">
                                                        <div class="form-group col-sm-12">

                                                            <div class="attachment-block clearfix btn-upload"
                                                                id="img-upload">
                                                                <div class="form-group col-sm-12">
                                                                    <input type="file" name="image" id="image"
                                                                        accept="image/*" class="pointer">
                                                                    <img src=""
                                                                        class="img-thumbnail img-responsive img-fluid"
                                                                        id="avatar-novo">
                                                                </div>
                                                                <div class="form-group col-sm-12">
                                                                    <p class="lead text-muted text-center mt-1">
                                                                        <i class="fas fa-cloud-upload-alt"></i><small>
                                                                            Clique na imagem</small>
                                                                    </p>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            {{-- <button type="button" class="btn btn-primary salvar">Salvar as Alterações</button> --}}
                            <button type="submit" class="btn btn-primary enviar">Enviar</button>

                        </div>
                        <input type="hidden" id="animalid" name="animalid" value="">
                        <input type="hidden" id="nome" name="nome" value="">

                    </form>
                </div>
                <!-- /.modal-content -->

            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.semanticui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />

    <link rel="stylesheet" href="css\util.css">
    <style>
        .align-left {
            text-align: left;
        }

        .pointer {
            cursor: pointer;
        }

        .acoes {
            border: solid 1px #CCC !important;
            max-width: 52px !important;
        }

        .acoes span {
            border-left: solid 1px #CCC !important;
            margin-left: 3px !important;
        }

        .dropdown-toggle::after {
            border: none;
            font: normal normal normal 12px/1 'Font Awesome 5 Free';
            content: "\f142";
            vertical-align: 0;
            text-align: left !important;
        }

        .divider {
            margin: 0 0.5em !important;
            border-top: #CCC solid 0.1px !important;
        }

    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- : Criação do Gráfico de Fases do Animal --}}
    <script>
        //--: INFO: 1. Criação do Gráfico de Fases do Animal
        var total = '<?php echo $total; ?>';
        var totalemtriagem = '<?php echo $totalemtriagem; ?>';
        var totalemlactacao = '<?php echo $totalemlactacao; ?>';
        var totalenfermas = '<?php echo $totalenfermas; ?>';
        var totalcobertura = '<?php echo $totalcobertura; ?>';

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Aguardando Triagem',
                'Em Lactação',
                'Na Enfermaria',
                'Aguardando Cobertura',
            ],
            datasets: [{
                data: [totalemtriagem, totalemlactacao, totalenfermas, totalcobertura],
                backgroundColor: ['#f39c12', '#00c0ef', '#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
            autoPadding: false,
            plugins: {
                subtitle: {
                    display: true,
                    //text: 'Gráfico de Situação Geral do Rebanho',
                    color: 'rgb(255, 255, 255)',
                    font: {
                        size: 14,
                    },
                    padding: 10,
                },
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 15,
                        boxHeight: 15,
                        color: 'rgb(255, 255, 255)',
                        font: {
                            size: 10,
                        },
                        padding: 10,
                    },
                }
            }

        }

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        });

        // .end Criação do Gráfico

        //--: INFO: 2. Carregamento do Grid de Animais
        //--> Inclusão do Token CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //--> Carregamento Principal
        $(document).ready(function() {
            listar();
        });

        //--> Carregamento Inicial do Grid de Animais
        var listar = function() {
            var table = $('#lstanimallote').DataTable({
                processing: true,
                info: true,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-6'l><'d-flex flex-row-reverse col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'d-flex flex-row-reverse col-sm-12'i><'d-flex flex-row-reverse col-sm-12'p>>",
                ajax: "{{ route('get.animal.list') }}",
                pageLength: 5,
                aLengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All']
                ],
                "language": {
                    "url": "js/pt-br.json"
                },
                columns: [{
                        data: 'numero_brinco',
                        name: 'numero_brinco',
                        width: '10%',
                    },
                    {
                        data: 'nome',
                        name: 'nome',
                    },
                    {
                        data: 'tnome',
                        name: 'tnome',
                        width: '30%',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        width: '20%',
                        className: 'dt-body-center',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
        };
        //-- end

        //--> Modal: Carregamento da modal de Atualização
        $(document).on("click", ".open-modal", function() {

            var ids = $(this).attr('data-id');

            var data = {
                idanimal: ids,
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
                    cache: false,
                    success: function(response) {
                        tmp = response.data[0];
                    }
                });

                return tmp;
            }();

            // --> Preenche o modal para atualização do animal
            document.getElementById('animalid').value = animal.idanimal;
            document.getElementById('nome').value = animal.nome;

            document.getElementById('avatar-atual').src = '/' + (animal.foto ?? 'assets/img/no-foto.jpg');
            document.getElementById('avatar-novo').src = '/assets/img/update-foto.jpg';

            var imgatual = document.getElementById('avatar-atual');
            imgatual.classList.remove("img-avatar-upload");
        });
        //--> .end modal atualização

        //--> Pré-visualização de imagem no navegador
        $('#image').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            var imgatual = document.getElementById('avatar-atual');
            var imgnovo = document.getElementById('avatar-novo');

            if (file && file.type.match('image.*')) {
                reader.readAsDataURL(file);
            } else {
                // img.css('display', 'none');
                // img.attr('src', '');
                // qualquer coisa
            }

            reader.onloadend = function(e) {
                imgnovo.src = e.target.result;
                imgatual.classList.add("img-avatar-upload");
            }

        });


        //--> Modal: Carregamento da modal de Atualização
        $('#formavatar').on("submit", function(e) {
            e.preventDefault();

            //--> Ocultar a modal
            $("[data-dismiss=modal]").trigger({
                type: "click"
            });

            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {},
                success: function(response) {

                    //-- Salvo com sucesso
                    if (response.status == 200) {

                        //-- Para recarregar a imagem
                        d = new Date();
                        $("#avatar-atual").attr("src", response.url + "?" + d.getTime());

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Salvo com sucesso!',
                            showConfirmButton: false,
                            text: response.message,
                            timer: 2000
                        });
                    }

                }
            });
        });
    </script>

@stop

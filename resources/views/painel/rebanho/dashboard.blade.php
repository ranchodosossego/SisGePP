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
        <div class="modal fade" id="modal-atualizar">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="container-fluid align-left">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="card card-success card-outline">

                                        <div class="card-header">
                                            <h3 class="card-title">Ficha do Animal</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">

                                                {{-- Image --}}
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group col-sm-12">

                                                        <form action="{{ route('painel.configuracao.store') }}"
                                                            method="POST" enctype="multipart/form-data" id="upload-avatar">
                                                            @csrf
                                                            <div class="attachment-block clearfix btn-upload">
                                                                <img src="" class="img-thumbnail img-responsive"
                                                                    id="avatar">
                                                                <input type="file" name="avatar" id=""
                                                                    class="" accept="image/*">
                                                                @error('file')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                <button type="submit">Subir Imagem</button>
                                                                <input type="hidden" id="animalid" name="animalid" value="">
                                                                <input type="hidden" id="nome" name="nome" value="">
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-8">

                                                    <div class="row">

                                                        <div class="form-group col-sm-2">
                                                            <label for="numero_brinco">Brinco</label>
                                                            <input type="text"
                                                                class="form-control form-control-border numero_brinco"
                                                                id="numero_brinco" value="" />
                                                        </div>

                                                        <div class="form-group col-sm-4">
                                                            <label for="apelido">Apelido</label>
                                                            <input type="text"
                                                                class="form-control form-control-border apelido"
                                                                id="apelido" value="" />
                                                        </div>

                                                        <div class="form-group col-sm-3">
                                                            <label for="numero_sisbov">Sisbov</label>
                                                            <input type="text"
                                                                class="form-control form-control-border numero_sisbov"
                                                                id="numero_sisbov" value="" />
                                                        </div>

                                                        <div class="form-group col-sm-3">
                                                            <label for="rgd">RGD</label>
                                                            <input type="text" class="form-control form-control-border rgd"
                                                                id="rgd" value="" />
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-sm-3">
                                                            <label for="rgn">RGN</label>
                                                            <input type="text" class="form-control form-control-border rgn"
                                                                id="rgn" value="" />
                                                        </div>

                                                        <div class="form-group col-md-9">
                                                            <label for="observacao">Observação</label>
                                                            <textarea class="form-control form-control-border observacao"
                                                                rows="2" value="" id="observacao"></textarea>
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
                        <button type="button" class="btn btn-primary">Salvar as Alterações</button>
                    </div>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css\util.css">
    <style>
        .align-left {
            text-align: left;
        }

    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

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
                    success: function(response) {
                        tmp = response.data[0];
                    }
                });

                return tmp;
            }();

            // --> Preenche o modal para atualização do animal
            document.getElementById('animalid').value = animal.idanimal;
            document.getElementById('nome').value = animal.nome;
            document.getElementById('avatar').src = '/' + (animal.foto ?? 'assets/img/no-foto.jpg');
            document.getElementById('numero_brinco').value = (animal.numero_brinco ?? '---');
            document.getElementById('apelido').value = (animal.apelido ?? '---');
            document.getElementById('numero_sisbov').value = (animal.numero_sisbov ?? '---');
            document.getElementById('rgd').value = (animal.rgd ?? '---');
            document.getElementById('rgn').value = (animal.rgn ?? '---');
            document.getElementById('observacao').value = (animal.observacao ?? '---');
            console.log('animal: ' + animal);



        });
        //--> .end modal atualização

    </script>

@stop

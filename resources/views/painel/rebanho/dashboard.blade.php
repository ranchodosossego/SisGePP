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
                            <div class="callout callout-success card-outline direct-chat direct-chat-primary">
                                <h5><i class="far fa-question-circle"></i> Cadastro de Novos Animais</h5>

                                <p>Esses espaço é dedicada ao cadastro de novos animais. São informados dados básicos, como:
                                </p>

                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Origem</div>
                                            <small>Animal nascido, comprado ou adquirido de outra forma. Ex.: animal
                                                doado.</small>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Grau de Sangue</div>
                                            <small>Grau de sangue da raça predominante ou Puro.</small>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">2</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Data de Chegada</div>
                                            <small>É data em que o animal chegou a propriedade. Se nascido, informe a data
                                                do
                                                nascimento.</small>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">3</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="callout callout-success card-outline direct-chat direct-chat-primary">
                                <h5>Campos Obrigatórios</h5>
                                <i class="fas fa-asterisk text-danger  fa-xs"></i>
                                <small class="fw-light">Todos os campos com asterisco são de preenchimento
                                    obrigatório.
                                </small>
                            </div>

                        </div>

                        {{-- Gráfico --}}
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header">
                                    {{-- <h3 class="card-title">Situação Geral do Rebanho</h3> --}}

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div>

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
                    </div>

                </div>

            </div>
            <!-- /.card -->

        </div>
    </section>

@stop

@section('css')
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>

    <script>
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
                    text: 'Gráfico de Situação Geral do Rebanho',
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
    </script>
@stop

@extends('adminlte::page')

@section('content')

    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ficha Técnica</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Quadro Geral</a></li>
                        <li class="breadcrumb-item active">Ficha Técnica</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <div class="content-wrapper">

        <div class="container-fluid">

            <div class="row">

                {{-- ╔═════════════════════════════════╗ --}}
                {{-- ║     Coluna 1: Ficha Técnica     ║ --}}
                {{-- ╚═════════════════════════════════╝ --}}
                <div class="col-md-7">

                    @foreach ($lstanimal as $animal)
                        <!-- Card: Dados do Animal -->
                        <div class="card card-secondary card-outline">

                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-sm-6">

                                        <div class="card card-widget widget-user">

                                            <div class="widget-user-header text-white fundo">
                                                <div class="transbox">
                                                    <h3 class="widget-user-username text-right">{{ $animal->nome }}</h3>
                                                    <h5 class="widget-user-desc text-right">{{ $animal->rnome }}</h5>
                                                </div>
                                            </div>
                                            <div class="widget-user-image">
                                                <img class="avatar" src="{{ asset('/') . $animal->foto }}"
                                                    alt="User Avatar">
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header">{{ $animal->numero_brinco }}
                                                            </h5>
                                                            <span class="description-text">BRINCO</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>

                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header">{{ $animal->tlnome }}</h5>
                                                            <span class="description-text">LOTE</span>
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="description-block">
                                                            <h5 class="description-header">{{ $animal->ornome }}</h5>
                                                            <span class="description-text">ORIGEM</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>

                                    <div class="form-group col-sm-6">

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="anome">Nome</label>
                                                <span id="anome" class="form-control form-control-border">
                                                    {{ $animal->nome }}
                                                </span>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="peso_entrada">Peso Inicial</label>
                                                <span id="peso_entrada" class="form-control form-control-border">
                                                    {{ $animal->peso_entrada }}
                                                    <span class="text-muted"><small>Kg</small></span>
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-sm-6">
                                                <label for="data_nascimento">Data Nascimento</label>
                                                <span id="data_nascimento" class="form-control form-control-border">
                                                    {{ $animal->data_nascimento }}
                                                </span>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="diasdevida">Dias de Vida</label>
                                                <span id="diasdevida" class="form-control form-control-border">
                                                    {{ Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $animal->data_nascimento)->format('d-m-Y'))->diffInDays(Carbon::now()) }}
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-sm-6">
                                                <label for="data_nascimento">Data de Chegada</label>
                                                <span id="data_nascimento" class="form-control form-control-border">
                                                    {{ $animal->data_entrada }}
                                                </span>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="peso_entrada">Raça</label>
                                                <span id="peso_entrada" class="form-control form-control-border">
                                                    {{ $animal->rnome }}
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-sm-12">
                                                <label for="peso_entrada">Grau de Sangue</label>
                                                <span id="peso_entrada" class="form-control form-control-border">
                                                    {{ $animal->gsnome }}
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-sm-12">
                                                <label for="observacao">Observação</label>
                                                <p id="observacao" class="form-control form-control-border"
                                                    style="height: auto !important;">
                                                    {{ $animal->observacao }}
                                                </p>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /end.card-body -->

                            <!-- /.card-footer -->
                            <div class="card-footer">

                                <div class="row d-flex flex-row-reverse bd-highlight">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm imprimir">
                                            <i class="fas fa-print"></i> Imprimir
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm pdf">
                                            <i class="far fa-file-pdf"></i> PDF
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- /end.card-footer -->

                        </div>
                        <!-- /.card -->
                    @endforeach
                </div>

                {{-- ╔═════════════════════════════════╗ --}}
                {{-- ║    Coluna2: Painéis de Ações    ║ --}}
                {{-- ╚═════════════════════════════════╝ --}}
                <div class="col-md-5">

                    <!-- Card: Histórico de Pesagem  collapsed-card-->
                    <div class="card card-orange card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Histórico de Pesagem</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row">

                                @if (empty($lsthp))

                                    <div class="form-group col-sm-12">
                                        <span id="peso_anterior" class="form-control form-control-border"
                                            style="height: auto !important;">
                                            <div class="card-comment">

                                                {{-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image"> --}}
                                                <div class="info-box mb-3 bg-warning">
                                                    <span class="info-box-icon"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Atenção</span>

                                                        <span class="lead"
                                                            style="text-align: justify; line-height: 1.4rem; font-size: medium;">
                                                            <p style="font-size: large;">
                                                                <ins> Nenhum pesagem realizada para a
                                                                    {{ $animal->nome }}</ins>
                                                            </p>
                                                            <em>"A pesagem do rebanho é fundamental para a tomada de
                                                                decisões, sendo a base do que
                                                                chamamos de <strong>Pecuária de Precisão</strong>. Este
                                                                termo é utilizado por haver uso de tecnologia e
                                                                informação para maior produtividade e rentabilidade."</em>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </span>
                                    </div>

                                @else

                                    <div class="form-group col-sm-12">

                                        {{-- Tabela Historico de Peso --}}
                                        <div class="row">

                                            <table class="table table-striped table-sm historico_peso" id="historico_peso">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Data da Pesagem</th>
                                                        <th scope="col">Peso Anterior</th>
                                                        <th scope="col">Peso Atual</th>
                                                        <th scope="col">Variação</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tblhistorico">

                                                    @for ($i = 0; $i < count($lsthp); $i++)
                                                        <tr class="bg-dark">
                                                            <td scope="row">{{ count($lsthp) - $i }}.</td>
                                                            <td>{{ $lsthp[$i]['data_pesagem'] }}</td>
                                                            <td>{{ $lsthp[$i]['peso_anterior'] }} <span class="text-muted">Kg</span></td>
                                                            <td>{{ $lsthp[$i]['peso_atual'] }} <span class="text-muted">Kg</span></td>
                                                            <td><i class="{{ $lsthp[$i]['color_icon'] }}"></i>
                                                                {{ $lsthp[$i]['perc_variacao'] }}
                                                                <span class="text-muted">%</span>
                                                            </td>
                                                        </tr>
                                                    @endfor

                                                </tbody>

                                            </table>
                                        </div>

                                        {{-- Médias --}}
                                        <div class="row">

                                            {{-- Peso Médio --}}
                                            <div class="form-group col-sm-6">

                                                <div class="small-box bg-yellow">
                                                    <div class="inner">
                                                        <p>Peso Médio</p>
                                                        <h3>{{ array_sum(array_column($lsthp, 'peso_atual')) / count($lsthp) }}
                                                            <sup style="font-size: 20px">Kg</sup>
                                                        </h3>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-weight-hanging"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">
                                                        <i class="fas fa-history fa-sm me-1"></i>
                                                        <span>{{ Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $lsthp[0]['data_pesagem'])->format('d-m-Y'))
                                                        ->diffForHumans(
                                                            Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $lsthp[4]['data_pesagem'])->format('d-m-Y')))}}</span>
                                                    </a>
                                                </div>

                                            </div>

                                            {{-- Percentual de Variação --}}
                                            <div class="form-group col-sm-6">

                                                @if (array_sum(array_column($lsthp, 'perc_variacao')) / count($lsthp) < 0)
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <p>Perda Média</p>
                                                            <h3>{{ round(array_sum(array_column($lsthp, 'perc_variacao')) / count($lsthp), 2) }}
                                                                <sup style="font-size: 20px">%</sup>
                                                            </h3>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="far fa-thumbs-down"></i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="small-box bg-light">
                                                        <div class="inner">
                                                            <p>Aumento Médio</p>
                                                            <h3>{{ round(array_sum(array_column($lsthp, 'perc_variacao')) / count($lsthp), 2) }}<sup
                                                                    style="font-size: 20px">%</sup></h3>

                                                        </div>
                                                        <div class="icon">
                                                            <i class="far fa-thumbs-up"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">
                                                            <i class="fas fa-history fa-sm me-1"></i>
                                                            <span>{{ Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $lsthp[0]['data_pesagem'])->format('d-m-Y'))
                                                            ->diffForHumans(
                                                                Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $lsthp[4]['data_pesagem'])->format('d-m-Y')))}}</span>
                                                        </a>
                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                @endif
                            </div>

                        </div>
                        <!-- /end.card-body -->

                    </div>
                    <!-- /.card -->

                    <!-- Card: Histórico Reprodutivo -->
                    <div class="card card-cyan card-outline collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Histórico Reprodutivo</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                        </div>
                        <!-- /end.card-body -->

                        <!-- /.card-footer -->
                        <div class="card-footer">

                            <div class="row d-flex flex-row-reverse bd-highlight">

                                <div class="">

                                </div>
                            </div>

                        </div>
                        <!-- /end.card-footer -->

                    </div>
                    <!-- /.card -->

                </div>

            </div>

        </div>

    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="css\bootstrap-datepicker3.min.css"> --}}
    {{-- <link rel="stylesheet" href="css\iframe.css"> --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .avatar {
            width: 100px !important;
            height: 100px !important;
            border-radius: 50%;
        }

        .fundo {
            background-image: url("{{ asset('/') . 'assets/img/bg_350x150.jpg' }}");
        }

        .transbox {
            margin: 0px;
            opacity: 0.6;

        }

        div.transbox .widget-user-username {
            color: #000000;
            text-shadow: 0 0 3px #000 !important, 0 0 5px #000 !important;
        }

        .historico_peso {
            font-size: .7rem !important;
            line-height: 1.0rem !important;
            border-bottom: 1px solid #6c757d !important;
        }

        .historico_peso th {
            font-size: .8rem !important;
        }

    </style>
@stop

@section('js')
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js\bootstrap-datepicker.min.js"></script>
    <script src="js\bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}



    {{-- Info: Carrgamento da página --}}
    <script>
        //--> Load da tela
        $(document).ready(function() {

        });
        //--> .end load
    </script>

@stop

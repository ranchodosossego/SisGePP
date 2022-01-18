@extends('adminlte::page')

@section('content')

    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dieta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Home</a></li>
                        <li class="breadcrumb-item active">Dieta</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <section class="content-wrapper">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card card-success card-outline">

                        <div class="card-header">
                            <i class="fas fa-cart-arrow-down"></i> Montando a Dieta
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Tabs --}}
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                            href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                            aria-selected="true"><i class="fas fa-cog"></i> Formulação Básica</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                            href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                            aria-selected="false"><i class="fas fa-cogs"></i> Formulação Avançada</a>
                                    </div>
                                </div>

                                {{-- Conteúdo da Tab --}}
                                <div class="col-7 col-sm-9">

                                    <div class="tab-content" id="vert-tabs-tabContent">

                                        {{-- Tab-1: Formulação Básica --}}
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-home-tab">

                                            {{-- Dados Iniciais --}}
                                            <div class="row">

                                                <div class="form-group col-sm-12">

                                                    <div class="card m-0">

                                                        <div class="card-body">

                                                            {{-- Peso vivo / Produção de leite / Gordura desejado --}}
                                                            <div class="row">

                                                                <div class="form-group col-sm-3">
                                                                    <label for="peso_vivo">Qual o peso vivo?<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" min="400" max="800" step="50"
                                                                        placeholder="400-800"
                                                                        class="form-control peso w-50 peso_vivo" />
                                                                </div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="prodleitedia">Produção de leite
                                                                        desejada?<span
                                                                            class="text-danger">*</span></label>
                                                                    {{-- <input type="number" min="0" max="100" class="form-control leitedia w-50" /> --}}
                                                                    <select class="prodleitedia selectpicker w-50"
                                                                        data-selected-text-format="count"
                                                                        data-max-options="1" data-style="btn-dark"
                                                                        title="----" id="prodleitedia">
                                                                        <option value="0" data-subtext="Kg">0</option>
                                                                        <option value="10" data-subtext="Kg">10</option>
                                                                        <option value="15" data-subtext="Kg">15</option>
                                                                        <option value="20" data-subtext="Kg">20</option>
                                                                        <option value="25" data-subtext="Kg">25</option>
                                                                        <option value="30" data-subtext="Kg">30</option>
                                                                        <option value="35" data-subtext="Kg">35</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="perc_gordura">Qual o % de gordura
                                                                        desejado?<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" min="3" max="5" step="0.5"
                                                                        placeholder="3-5"
                                                                        class="form-control perc_gordura w-50" />
                                                                </div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="nucleo">Qual o % de núcleo?<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" min="1" max="10"
                                                                        placeholder="1-10"
                                                                        class="form-control nucleo w-50" />
                                                                </div>


                                                            </div>

                                                            {{-- Volumoso / Concentrado Energético / Concentrado Proteíco --}}
                                                            <div class="row mt-3">

                                                                {{-- 1 - Volumoso (Matéria Seca) --}}
                                                                <div class="form-group col-sm-4">
                                                                    <label for="volumoso">1 - Volumoso (Matéria Seca)<span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="volumoso" id="volumoso"
                                                                        class="volumoso selectpicker"
                                                                        data-selected-text-format="count" data-width="auto"
                                                                        data-max-options="1" data-live-search="true"
                                                                        data-style="btn-dark" title="Nada Selecionado">
                                                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '1') as $volumoso)
                                                                            <option value="{{ $volumoso->idalimento }}">
                                                                                {{ $volumoso->nome }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                {{-- 2 - Concentrado (Energético) --}}
                                                                <div class="form-group col-sm-4">
                                                                    <label for="concentrado_energetico">2 - Concentrado
                                                                        (Energético)<span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="concentrado_energetico"
                                                                        id="concentrado_energetico"
                                                                        class="concentrado_energetico selectpicker" multiple
                                                                        data-selected-text-format="count" data-width="auto"
                                                                        data-max-options="3" data-style="btn-dark"
                                                                        title="Nada Selecionado">
                                                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2')->where('subclasse_idsubclasse', '=', '1') as $concentrado_energetico)
                                                                            <option
                                                                                value="{{ $concentrado_energetico->idalimento }}">
                                                                                {{ $concentrado_energetico->nome }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                {{-- 3 - Concentrado (Proteíco) --}}
                                                                <div class="form-group col-sm-4">
                                                                    <label for="concentrado_proteico">3 - Concentrado
                                                                        (Proteíco)<span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="concentrado_proteico"
                                                                        id="concentrado_proteico"
                                                                        class="concentrado_proteico selectpicker" multiple
                                                                        data-selected-text-format="count" data-width="auto"
                                                                        data-max-options="1" data-style="btn-dark">
                                                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2')->where('subclasse_idsubclasse', '=', '2') as $concentrado_proteico)
                                                                            <option
                                                                                value="{{ $concentrado_proteico->idalimento }}">
                                                                                {{ $concentrado_proteico->nome }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <hr class="border-1 border-top border-secondary">

                                                            {{-- Botão Montar --}}
                                                            <div class="row d-flex flex-row-reverse">

                                                                <footer class="footer">
                                                                    <div class="container ">
                                                                        <button type="button"
                                                                            class="btn btn-dark btn-block btn-sm border border-secondary border-2 montar">
                                                                            <i class="fas fa-diagnoses fa-2x"></i> Montar
                                                                        </button>
                                                                    </div>
                                                                </footer>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            {{-- Tabela com a Dieta Montada --}}
                                            <div class="row">

                                                <div class="form-group col-sm-12">

                                                    <div class="card m-0">

                                                        <div class="card-header">

                                                            {{-- Totais Gerais --}}
                                                            <div class="row">
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage"
                                                                            id="tot_dieta_perc">
                                                                            <i class="fas fa-caret-left"></i> %</span>
                                                                        <h5 class="description-header" id="tot_deita_mn_kg">
                                                                            Kg</h5>
                                                                        <span class="description-text">TOTAL DA
                                                                            MISTURA</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage"
                                                                            id="tot_volumoso_dieta_perc">
                                                                            <i class="fas fa-caret-left"></i> %</span>
                                                                        <h5 class="description-header"
                                                                            id="volumoso_tot_mn_kg">Kg</h5>
                                                                        <span class="description-text">TOTAL DE
                                                                            VOLUMOSO</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage"
                                                                            id="tot_concentrado_dieta_perc">
                                                                            <i class="fas fa-caret-left"></i> %</span>
                                                                        <h5 class="description-header"
                                                                            id="concentrado_tot_mn_kg">Kg</h5>
                                                                        <span class="description-text">TOTAL DE
                                                                            CONCENTRADO</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage"
                                                                            id="tot_nucleo_dieta_perc">
                                                                            <i class="fas fa-caret-left"></i> %</span>
                                                                        <h5 class="description-header"
                                                                            id="nucleo_tot_mn_kg">Kg</h5>
                                                                        <span class="description-text">TOTAL DE
                                                                            NÚCLEO</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="card-body">
                                                            <table class="table table-striped table-sm" id="ingredientes">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Nome</th>
                                                                        <th scope="col">Categoria</th>
                                                                        <th scope="col">Mistura em %</th>
                                                                        <th scope="col">Total em Kg</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tblingredientes"></tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                        {{-- Tab-2: Formulação Avançada --}}
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-profile-tab">
                                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
                                            pharetra
                                            purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit
                                            amet,
                                            consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci
                                            luctus et
                                            ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum,
                                            nisl
                                            ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus,
                                            elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque
                                            diam.
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@stop


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <style>
        .salvar {
            box-shadow: 0 0 2px #c5c5c5 !important;
        }

        .nav a:link {
            color: #f5f5f5 !important;
        }

        .nav a:hover {
            color: #a6a6a6 !important;
        }

        #progress {
            animation-name: progressbar;
            animation-iteration-count: 1;
            animation-duration: 1.05s;
        }

        @keyframes progressbar {
            0% {
                width: 0%;
            }

            100% {
                width: 40%;
            }
        }

    </style>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-pt_BR.min.js"
        integrity="sha512-3l+bzQRu7gLEJq7fP1ox9u/rTpx0ECS2SF1gJpJllASEKQauLHRVwOSAGg1oqGeIfSdr+9iwYo6VGayJ4wc3gQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('click', '.montar', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var listar = function(items) {
                var alimento_ids = [];
                $(items).each(function() {
                    alimento_ids.push($(this).val());
                });
                return alimento_ids;
            };


            var volumoso_ids = listar($('#volumoso option:selected'));

            var prodleitedia = $('#prodleitedia option:selected').val();
            var concentrado_energetico_ids = [];
            var concentrado_proteico_ids = [];
            var nucleo = 0;

            if (prodleitedia > 0) {
                concentrado_energetico_ids = listar($('#concentrado_energetico option:selected'));
                concentrado_proteico_ids = listar($('#concentrado_proteico option:selected'));
                nucleo = $('.nucleo').val();
            }

            console.log('nucle: ' + $('.nucleo').val());
            var data = {
                'volumoso_ids': volumoso_ids,
                'concentrado_energetico_ids': concentrado_energetico_ids,
                'concentrado_proteico_ids': concentrado_proteico_ids,
                'peso_vivo': $('.peso_vivo').val(),
                'nucleo': nucleo,
                'prodleitedia': prodleitedia,
                'perc_gordura': $('.perc_gordura').val(),
            }

            $.ajax({
                type: "GET",
                url: "{{ route('get.dieta') }}",
                data: data,
                dataType: "json",
                success: function(response) {

                    //-- Variáveis com os totais de CONCENTRADO e VOLUMOSO
                    var tot_conc_kg = 0;
                    var tot_conc_perc = 0;
                    var tot_volumoso_kg = 0;
                    var tot_volumoso_perc = 0;
                    var tot_nucleo_kg = -1;
                    var tot_nucleo_perc = -1;

                    //-- Preenche Tabela de Ingredientes
                    $("#ingredientes tbody tr").remove();
                    var table = $("#ingredientes tbody");

                    $.each(response.grid_ing, function(idx, elem) {

                        switch (elem.classe) {
                            case 1:
                                bar_color = 'bg-success';
                                break;
                            case 2:
                                bar_color = (elem.subclasse == 1) ? 'bg-warning' : 'bg-info';
                                break;
                            case 8:
                                bar_color = 'bg-danger';
                                tot_nucleo_kg = elem.kg;
                                tot_nucleo_perc = elem.perc;
                                $("#nucleo_tot_mn_kg").html(tot_nucleo_kg + " Kg");
                                $("#tot_nucleo_dieta_perc").addClass("text-success");
                                $("#tot_nucleo_dieta_perc").html('<i class="fas fa-caret-up m-1"></i>' + tot_nucleo_perc + " %");
                                break;
                            default:
                                bar_color = 'bg-primary';
                        }

                        table.append(
                            "<tr>" +
                            "<th scope='row'>" + (idx + 1) + ".</th>" +
                            "<td>" + elem.nome + "</td>" +
                            "<td>" + elem.categoria + "</td>" +
                            "<td>" +
                            "<div id='progressbar' class='progress mt-1'>" +
                            "<div id='progress' class='progress-bar progress-bar-striped progress-bar-animated " +
                            bar_color + "'" +
                            "aria-valuemin='0' aria-valuemax='100' role='progressbar'" +
                            "style=' border-radius: 4px; width:" +
                            (elem.perc + 15)  + "%'>" +
                            "<span class='pe-2 ps-2'><strong>" + elem.perc +
                            "%</strong></span>" +

                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "<td><span style='font-size: 1.1em; width: 70%;' class='p-1 badge " +
                            bar_color + "'>" + elem.kg +
                            " Kg</span>" +
                            "</td>" +
                            "</tr>"
                        );

                    });

                    //-- Volumoso
                    tot_volumoso_kg = response.dados_volumoso[0].tot_mn_kg;
                    tot_volumoso_perc = response.dados_volumoso[0].tot_mn_perc;
                    $("#volumoso_tot_mn_kg").html(tot_volumoso_kg + " Kg");
                    if (tot_volumoso_perc >= 50) {
                        $("#tot_volumoso_dieta_perc").removeClass("text-warning").addClass(
                            "text-success");
                        $("#tot_volumoso_dieta_perc").html('<i class="fas fa-caret-up m-1"></i>' +
                            tot_volumoso_perc + " %");
                    } else {
                        $("#tot_volumoso_dieta_perc").removeClass("text-success").addClass(
                            "text-warning");
                        $("#tot_volumoso_dieta_perc").html('<i class="fas fa-caret-left m-1"></i>' +
                            tot_volumoso_perc + " %");
                    }

                    //-- Concentrado
                    if (typeof response.dados_concentrado !== 'undefined' && response.dados_concentrado
                        .length > 0) {

                        tot_conc_kg = response.dados_concentrado[0].tot_mn_kg;
                        tot_conc_perc = response.dados_concentrado[0].tot_mn_perc;

                        $("#concentrado_tot_mn_kg").html(tot_conc_kg + " Kg");

                        if (response.dados_concentrado[0].tot_mn_perc >= 50) {
                            $("#tot_concentrado_dieta_perc").removeClass(["text-warning",
                                "text-danger"
                            ]).addClass("text-success");
                            $("#tot_concentrado_dieta_perc").html(
                                "<i class=\"fas fa-caret-up m-1\"></i>" + tot_conc_perc + " %");
                        } else {
                            $("#tot_concentrado_dieta_perc").removeClass(["text-danger",
                                "text-success"
                            ]).addClass("text-warning");
                            $("#tot_concentrado_dieta_perc").html(
                                "<i class=\"fas fa-caret-left m-1\"></i>" + tot_conc_perc + " %");
                        }

                    } else {
                        $("#tot_concentrado_dieta_perc").removeClass(["text-warning", "text-success"])
                            .addClass(
                                "text-danger");
                        $("#concentrado_tot_mn_kg").html("0 Kg");
                        $("#tot_concentrado_dieta_perc").html(
                            "<i class=\"fas fa-caret-down m-1\"></i> 0 %");
                    }


                    //-- Total da Dieta
                    var tkg = parseFloat(tot_volumoso_kg) + parseFloat(tot_conc_kg);
                    var tperc = parseFloat(tot_volumoso_perc) + parseFloat(tot_conc_perc);

                    $("#tot_deita_mn_kg").html(parseFloat(tkg).toFixed(3) + " Kg");
                    $("#tot_dieta_perc").addClass("text-success");
                    $("#tot_dieta_perc").html("<i class=\"fas fa-plus fa-xs m-1\"></i>" + tperc + " %");

                }
                //-- end_success
            });

        });

        //-- Carregar Grau de Sangue
        $(document).on('click', '.lote', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {
                'tipolote_idlote': $('.lote').val(),
            }

            $.ajax({
                type: "GET",
                url: "/obtemTipoLote",
                data: data,
                dataType: "json",
                success: function(response) {

                    if (response.data.length == 0) {
                        $('#tipolote').val('----');
                    } else {
                        $('#tipolote').val(response.data[0].idtipo_lote + ' - ' + response.data[0]
                            .nome);
                        $('#observacao').val(response.data[0].observacao);
                    }
                }
            });

        });
    </script>
@stop

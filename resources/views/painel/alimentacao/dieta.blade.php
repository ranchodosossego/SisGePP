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
                                            aria-selected="true"><i class="fas fa-cog"></i> Simulador - Vaca Leiteira</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                            href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                            aria-selected="false"><i class="fas fa-cogs"></i> Dieta por Lote</a>
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
                                                                    <input type="number" min="400" max="800" step="25"
                                                                        placeholder="400-800"
                                                                        class="form-control peso w-75 peso_vivo" />
                                                                </div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="prodleitedia">Produção de leite<span
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
                                                                    <label for="perc_gordura" class="label_perc_gordura">% de Gordura</label>
                                                                    <input type="number" min="3" max="5" step="0.5"
                                                                        placeholder="3-5"
                                                                        class="form-control perc_gordura w-50" />
                                                                </div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="nucleo">% de Núcleo?</label>
                                                                    <input type="number" min="0" max="10" placeholder="0-10"
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
                                                                        data-selected-text-format="count"
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
                                                                    <label for="concentrado_energetico" class="concentrado_energetico">2 - Concentrado
                                                                        (Energético)</label>
                                                                    <select name="concentrado_energetico"
                                                                        id="concentrado_energetico"
                                                                        class="concentrado_energetico selectpicker" multiple
                                                                        data-selected-text-format="count"
                                                                        data-max-options="5" data-style="btn-dark"
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
                                                                    <label for="concentrado_proteico" class="concentrado_proteico">3 - Concentrado
                                                                        (Proteíco)</label>
                                                                    <select name="concentrado_proteico"
                                                                        id="concentrado_proteico"
                                                                        class="concentrado_proteico selectpicker" multiple
                                                                        data-selected-text-format="count"
                                                                        data-max-options="5" data-style="btn-dark">
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
                                                            <div class="row dados_gerais">

                                                            </div>

                                                        </div>

                                                        <div class="card-body">
                                                            <table class="table table-striped table-sm" id="ingredientes">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Nome</th>
                                                                        <th scope="col">Categoria</th>
                                                                        <th scope="col">% Ingredientes</th>
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

        .not-allowed {
            cursor: not-allowed;
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
        //--
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

            if (prodleitedia > 0) {
                concentrado_energetico_ids = listar($('#concentrado_energetico option:selected'));
                concentrado_proteico_ids = listar($('#concentrado_proteico option:selected'));
            }

            var data = {
                'volumoso_ids': volumoso_ids,
                'concentrado_energetico_ids': concentrado_energetico_ids,
                'concentrado_proteico_ids': concentrado_proteico_ids,
                'peso_vivo': $('.peso_vivo').val(),
                'nucleo': $('.nucleo').val(),
                'prodleitedia': prodleitedia,
                'perc_gordura': $('.perc_gordura').val(),
            }

            $.ajax({
                type: "GET",
                url: "{{ route('get.dieta') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    $("#itens div").remove();
                    var dados_gerais = $(".dados_gerais");
                    const bg_colors = new Array('bg-success', 'bg-warning', 'bg-danger', 'bg-primary',
                        'bg-dark', 'bg-info');
                    const icons = new Array('fas fa-caret-up', 'fas fa-caret-left', 'fas fa-caret-down',
                        'fas fa-plus fa-xs');
                    const texts = new Array('text-teal', 'text-warning', 'text-orange', 'text-info');

                    // COLOCAR A DURAÇÃO DO NÚCLEO EM MESES

                    $.each(response.dados_gerais, function(idx, elem) {
                        if (idx < 4) {
                            //let t = (elem.perc == 0) ? texts[2] : (elem.perc < 50) ? texts[1] : (elem.perc >= 50) ? texts[0] : texts[3];
                            let i = (elem.perc == 0) ? icons[2] : (elem.perc == 100) ? icons[
                                    3] : (elem.perc < 50) ? icons[1] : (elem.perc >= 50) ?
                                icons[
                                    0] : icons[0];


                            dados_gerais.append(
                                "<div class='col-sm-3 col-6' id='itens'>" +
                                "<div class='description-block border-right'>" +
                                "<span class='description-percentage " + texts[idx] +
                                "' id='perc'>" +
                                "<i class='" + i + "'></i><strong> " + elem.perc +
                                " % </strong></span>" +
                                "<h5 class='description-header' id='kg'>" + elem.kg +
                                " Kg</h5>" +
                                "<span class='description-text' id='nome'>" + elem.nome +
                                "</span>" +
                                "</div>" +
                                "</div>"
                            );
                        }

                    });


                    //-- Preenche Tabela de Ingredientes
                    $("#ingredientes tbody tr").remove();
                    var table = $("#ingredientes tbody");
                    var i = 0;
                    const bg_color = new Array('bg-dark', '', '', '', '', '');
                    const bar_color = new Array('bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-primary', 'bg-info');

                    $.each(response.dados_grid, function(idx, elem) {

                        table.append(

                            "<tr class='" + bg_color[i] + "'>" +
                            "<th scope='row'>" + (i + 1) + ".</th>" +
                            "<td>" + elem.nome + "</td>" +
                            "<td>" + elem.categoria + "</td>" +
                            "<td>" +
                            "<div id='progressbar' class='progress mt-1'>" +
                            "<div id='progress' class='progress-bar progress-bar-striped progress-bar-animated " +
                            bar_color[i] + "'" +
                            "aria-valuemin='0' aria-valuemax='100' role='progressbar'" +
                            "style=' border-radius: 4px; width:" +
                            (elem.perc + 15) + "%'>" +
                            "<span class='pe-2 ps-2'><strong>" + elem.perc +
                            "%</strong></span>" +

                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "<td><span style='font-size: 1.1em; width: 70%;' class='p-1 badge " +
                            bar_color[i] + "'>" + elem.kg +
                            " Kg</span>" +
                            "</td>" +
                            "</tr>"

                        );
                        i++;

                    });


                    // .dados_gerais
                    // response.tela[0].id

                    // //-- Variáveis com os totais de CONCENTRADO e VOLUMOSO
                    // var tot_conc_kg = 0;
                    // var tot_conc_perc = 0;
                    // var tot_volumoso_kg = 0;
                    // var tot_volumoso_perc = 0;
                    // var tot_nucleo_kg = -1;
                    // var tot_nucleo_perc = -1;
                    // bar_color = 'bg-primary';
                    // bar_bg = 'bg-primary';
                    // //-- Preenche Tabela de Ingredientes
                    // $("#ingredientes tbody tr").remove();
                    // var table = $("#ingredientes tbody");

                    // $.each(response.grid_ing, function(idx, elem) {

                    //     switch (elem.classe) {
                    //         case 1:
                    //             bar_color = 'bg-success';
                    //             bar_bg = 'bg-dark';
                    //             break;
                    //         case 2:
                    //             bar_color = (elem.subclasse == 1) ? 'bg-warning' : 'bg-info';
                    //             bar_bg = '';
                    //             break;
                    //         case 8:
                    //             bar_color = 'bg-danger';
                    //             bar_bg = '';
                    //             tot_nucleo_kg = elem.kg;
                    //             tot_nucleo_perc = elem.perc;
                    //             $("#nucleo_tot_mn_kg").html(tot_nucleo_kg + " Kg");
                    //             $("#tot_nucleo_dieta_perc").addClass("text-success");
                    //             $("#tot_nucleo_dieta_perc").html(
                    //                 '<i class="fas fa-caret-up m-1"></i>' +
                    //                 tot_nucleo_perc + " %");
                    //             break;
                    //         default:
                    //             bar_bg = '';
                    //             bar_color = 'bg-primary';
                    //     }

                    //     table.append(
                    //         "<tr class='" + bar_bg + "'>" +
                    //         "<th scope='row'>" + (idx + 1) + ".</th>" +
                    //         "<td>" + elem.nome + "</td>" +
                    //         "<td>" + elem.categoria + "</td>" +
                    //         "<td>" +
                    //         "<div id='progressbar' class='progress mt-1'>" +
                    //         "<div id='progress' class='progress-bar progress-bar-striped progress-bar-animated " +
                    //         bar_color + "'" +
                    //         "aria-valuemin='0' aria-valuemax='100' role='progressbar'" +
                    //         "style=' border-radius: 4px; width:" +
                    //         (elem.perc + 15) + "%'>" +
                    //         "<span class='pe-2 ps-2'><strong>" + elem.perc +
                    //         "%</strong></span>" +

                    //         "</div>" +
                    //         "</div>" +
                    //         "</td>" +
                    //         "<td><span style='font-size: 1.1em; width: 70%;' class='p-1 badge " +
                    //         bar_color + "'>" + elem.kg +
                    //         " Kg</span>" +
                    //         "</td>" +
                    //         "</tr>"
                    //     );

                    // });

                    // //-- Volumoso
                    // tot_volumoso_kg = response.dados_volumoso[0].tot_mn_kg;
                    // tot_volumoso_perc = response.dados_volumoso[0].tot_mn_perc;
                    // $("#volumoso_tot_mn_kg").html(tot_volumoso_kg + " Kg");
                    // if (tot_volumoso_perc >= 50) {
                    //     $("#tot_volumoso_dieta_perc").removeClass("text-warning").addClass(
                    //         "text-success");
                    //     $("#tot_volumoso_dieta_perc").html('<i class="fas fa-caret-up m-1"></i>' +
                    //         tot_volumoso_perc + " %");
                    // } else {
                    //     $("#tot_volumoso_dieta_perc").removeClass("text-success").addClass(
                    //         "text-warning");
                    //     $("#tot_volumoso_dieta_perc").html('<i class="fas fa-caret-left m-1"></i>' +
                    //         tot_volumoso_perc + " %");
                    // }

                    // //-- Concentrado
                    // // var a = (response.dados_concentrado.length > 0);
                    // // console.log('a: ' + a);
                    // // var b = (typeof response.dados_concentrado !== 'undefined');
                    // // console.log('b: ' + b);

                    // if (response.dados_concentrado.length > 0) {

                    //     tot_conc_kg = response.dados_concentrado[0].tot_mn_kg;
                    //     tot_conc_perc = response.dados_concentrado[0].tot_mn_perc;

                    //     $("#concentrado_tot_mn_kg").html(tot_conc_kg + " Kg");

                    //     if (response.dados_concentrado[0].tot_mn_perc >= 50) {
                    //         $("#tot_concentrado_dieta_perc").removeClass(["text-warning",
                    //             "text-danger"
                    //         ]).addClass("text-success");
                    //         $("#tot_concentrado_dieta_perc").html(
                    //             "<i class=\"fas fa-caret-up m-1\"></i>" + tot_conc_perc + " %");
                    //     } else {
                    //         $("#tot_concentrado_dieta_perc").removeClass(["text-danger",
                    //             "text-success"
                    //         ]).addClass("text-warning");
                    //         $("#tot_concentrado_dieta_perc").html(
                    //             "<i class=\"fas fa-caret-left m-1\"></i>" + tot_conc_perc + " %");
                    //     }

                    // } else {
                    //     $("#tot_concentrado_dieta_perc").removeClass(["text-warning", "text-success"])
                    //         .addClass(
                    //             "text-danger");
                    //     $("#concentrado_tot_mn_kg").html("0 Kg");
                    //     $("#tot_concentrado_dieta_perc").html(
                    //         "<i class=\"fas fa-caret-down m-1\"></i> 0 %");
                    // }


                    // //-- Total da Dieta
                    // $("#tot_deita_mn_kg").html(response.tot_mist_kg + " Kg");
                    // $("#tot_dieta_perc").addClass("text-success");
                    // $("#tot_dieta_perc").html("<i class=\"fas fa-plus fa-xs m-1\"></i>" + response
                    //     .tot_mist_perc + " %");

                }
                //-- end_success
            });

        });

        //-- Enable/Disabls dos itens de tela
        $('#prodleitedia').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            var prodleitedia = $('#prodleitedia option:selected').val();

            if (prodleitedia == 0) {
                $('.concentrado_energetico').prop('disabled', true);
                $('.concentrado_energetico').selectpicker('deselectAll');
                $('.concentrado_energetico').selectpicker('refresh');


                $('.concentrado_proteico').prop('disabled', true);
                $('.concentrado_proteico').selectpicker('deselectAll');
                $('.concentrado_proteico').selectpicker('refresh');

                $('.perc_gordura').prop('disabled', true);
                $('.perc_gordura').val('');

                $(".concentrado_energetico").addClass("not-allowed text-muted");
                $(".concentrado_proteico").addClass("not-allowed text-muted");
                $(".perc_gordura").addClass("not-allowed text-muted");
                $(".label_perc_gordura").addClass("not-allowed text-muted");
            }

            if (prodleitedia != 0) {
                $('.concentrado_energetico').prop('disabled', false);
                $('.concentrado_energetico').selectpicker('refresh');

                $('.concentrado_proteico').prop('disabled', false);
                $('.concentrado_proteico').selectpicker('refresh');
                $('.perc_gordura').prop('disabled', false);

                $(".concentrado_energetico").removeClass("not-allowed text-muted");
                $(".concentrado_proteico").removeClass("not-allowed text-muted");
                $(".perc_gordura").removeClass("not-allowed text-muted");
                $(".label_perc_gordura").removeClass("not-allowed text-muted");

            }

        });
    </script>
@stop

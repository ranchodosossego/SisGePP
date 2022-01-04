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

                <!-- Coluna 1: Buscas -->
                <div class="col-md-4">

                    <!-- Default box -->
                    <div class="card card-success card-outline">
                        <div class="card-body pb-0">

                            <h5><i class="fas fa-grip-horizontal"></i> Por Lote</h5>
                            <p>Crie uma dieta para um tipo de lote</p>

                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label for="lote">Lote <span class="text-danger">*</span></label>
                                    <select name="lote" id="lote" class="custom-select form-control-border lote">
                                        <option value="0">----</option>
                                        @foreach ($lstlote as $lote)
                                            <option value="{{ $lote->idlote }}">{{ $lote->codigo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-8">
                                    <label for="tipolote">Tipo de Lote</label>
                                    <input type="text" class="form-control form-control-border tipolote" readonly
                                        id="tipolote" />
                                </div>

                            </div>

                            {{-- Observação --}}
                            <div class="row">
                                <div class="form-group col-md-12">

                                    <label for="observacao">Observação</label>
                                    <textarea class="form-control form-control-border observacao" rows="2"
                                        id="observacao"></textarea>

                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="card card-success card-outline">
                        <div class="card-body pb-0">
                        </div>
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <i class="fas fa-cart-arrow-down"></i> Montando a Dieta
                        </div>
                        <div class="card-body pb-0">

                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label for="peso_vivo">Qual o peso vivo?<span class="text-danger">*</span></label>
                                    <input type="number" min="400" max="600" placeholder="400-600"
                                        class="form-control peso w-50 peso_vivo" />
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="prodleitedia">Qual o peso leite/dia desejado?<span
                                            class="text-danger">*</span></label>
                                    {{-- <input type="number" min="0" max="100" class="form-control leitedia w-50" /> --}}
                                    <select class="custom-select form-control-border w-50 prodleitedia" id="prodleitedia">
                                        <option value="99">----</option>
                                        <option value="0">0</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="perc_gordura">Qual o % de gordura desejado?<span
                                            class="text-danger">*</span></label>
                                    <input type="number" min="3" max="5" placeholder="3-5"
                                        class="form-control perc_gordura w-50" />
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label for="volumoso">1 - Volumoso (Matéria Seca)<span
                                            class="text-danger">*</span></label>
                                    <select name="volumoso" id="volumoso" class="volumoso selectpicker" multiple
                                        data-selected-text-format="count" data-style="btn-dark">
                                        {{-- <option value="0">----</option> --}}
                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '1') as $volumoso)
                                            <option value="{{ $volumoso->idalimento }}">{{ $volumoso->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="concentrado">2 - Concentrado ()<span class="text-danger">*</span></label>
                                    <select name="concentrado" id="concentrado" class="concentrado selectpicker" multiple
                                        data-selected-text-format="count" data-style="btn-dark">
                                        {{-- <option value="0">----</option> --}}
                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2') as $concentrado)
                                            <option value="{{ $concentrado->idalimento }}">{{ $concentrado->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="suplemento">3 - Suplemento ()<span class="text-danger">*</span></label>
                                    <select name="suplemento" id="suplemento" class="suplemento selectpicker" multiple
                                        data-selected-text-format="count" data-style="btn-dark">
                                        {{-- <option value="0">----</option> --}}
                                        @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '3') as $suplemento)
                                            <option value="{{ $suplemento->idalimento }}">{{ $concentrado->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row">

                            </div>

                        </div>

                        <div class="card-footer">

                            <div class="row d-flex flex-row-reverse bd-highlight">

                                <div class="">
                                    <button type="button"
                                        class="btn btn-dark btn-block btn-sm border border-secondary border-2 montar">
                                        <i class="fas fa-diagnoses fa-2x"></i> Montar
                                    </button>
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
                    //selected.push($(this).text());
                    alimento_ids.push($(this).val());
                });
                return alimento_ids;
            };


            var volumoso_ids = listar($('#volumoso option:selected'));
            var concentrado_ids = listar($('#concentrado option:selected'));


            var data = {
                'volumoso_ids': volumoso_ids,
                'concentrado_ids': concentrado_ids,
                'peso_vivo': $('.peso_vivo').val(),
                'prodleitedia': $('.prodleitedia').val(),
                'perc_gordura': $('.perc_gordura').val(),
            }

            $.ajax({
                type: "GET",
                url: "{{ route('get.dieta') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log('response:' + response.peso_vivo);

                }
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

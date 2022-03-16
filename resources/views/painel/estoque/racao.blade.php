@extends('adminlte::page')

@section('content')
    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Estoque</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/racao">Home</a></li>
                        <li class="breadcrumb-item active">Ração</li>
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
                            <i class="fas fa-box-open"></i> Montando o Estoque
                        </div>

                        <div class="card-body">

                            {{-- Volumoso / Concentrado Energético / Concentrado Proteíco --}}
                            <div class="row">

                                {{-- Volumoso / Concentrados / Núcleo --}}
                                <div class="form-group col-sm-3">
                                    <div class="card">

                                        <div class="card-body">

                                            {{-- 1 - Volumoso (Matéria Seca) --}}
                                            <div class="form-group col-sm-12">
                                                <label for="volumoso">1 - Volumoso (Matéria Seca)<span
                                                        class="text-danger">*</span></label>
                                                <select name="volumoso" id="volumoso" class="volumoso selectpicker"
                                                    data-selected-text-format="count" data-max-options="1"
                                                    data-live-search="true" data-style="btn-dark" title="Nada Selecionado">
                                                    @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '1') as $volumoso)
                                                        <option value="{{ $volumoso->idalimento }}">
                                                            {{ $volumoso->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- 2 - Concentrado (Energético) --}}
                                            <div class="form-group col-sm-12">
                                                <label for="concentrado_energetico" class="concentrado_energetico">2 -
                                                    Concentrado
                                                    (Energético)</label>
                                                <select name="concentrado_energetico" id="concentrado_energetico"
                                                    class="concentrado_energetico selectpicker"
                                                    data-selected-text-format="count" data-max-options="1"
                                                    data-live-search="true" data-style="btn-dark" title="Nada Selecionado">
                                                    @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2')->where('subclasse_idsubclasse', '=', '1') as $concentrado_energetico)
                                                        <option value="{{ $concentrado_energetico->idalimento }}">
                                                            {{ $concentrado_energetico->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- 3 - Concentrado (Proteíco) --}}
                                            <div class="form-group col-sm-12">
                                                <label for="concentrado_proteico" class="concentrado_proteico">3 -
                                                    Concentrado
                                                    (Proteíco)</label>
                                                <select name="concentrado_proteico" id="concentrado_proteico"
                                                    class="concentrado_proteico selectpicker"
                                                    data-selected-text-format="count" data-max-options="1"
                                                    data-live-search="true" data-style="btn-dark">
                                                    @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2')->where('subclasse_idsubclasse', '=', '2') as $concentrado_proteico)
                                                        <option value="{{ $concentrado_proteico->idalimento }}">
                                                            {{ $concentrado_proteico->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- 4 - Núcleo --}}
                                            <div class="form-group col-sm-12">
                                                <label for="concentrado_proteico" class="concentrado_proteico">
                                                    4 - Núcleo</label>
                                                <select name="concentrado_proteico" id="concentrado_proteico"
                                                    class="concentrado_proteico selectpicker"
                                                    data-selected-text-format="count" data-max-options="1"
                                                    data-live-search="true" data-style="btn-dark">
                                                    {{-- @foreach ($lstalimento->where('classe_alimento_idclasse_alimento', '=', '2')->where('subclasse_idsubclasse', '=', '2') as $concentrado_proteico)
                                                        <option value="{{ $concentrado_proteico->idalimento }}">
                                                            {{ $concentrado_proteico->nome }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-9">

                                    {{-- Tabela Historico de Estoque --}}
                                    <div class="row">

                                        <table class="table table-striped table-sm table-hover historico_est"
                                            id="historico_est">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Última Atualização</th>
                                                    <th scope="col">Quantidade</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tblhistorico">
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="row d-flex flex-row-reverse">

                                        <footer class="footer">
                                            <div class="container ">
                                                <button type="button"
                                                    class="btn btn-dark btn-block btn-sm border border-secondary border-2 montar">
                                                    <i class="fas fa-user-edit"></i> Atualizar Estoque
                                                </button>
                                            </div>
                                        </footer>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- /.card-footer -->
                        <div class="card-footer">

                            <div class="row d-flex flex-row-reverse bd-highlight">

                                <div class="">

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
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-pt_BR.min.js"
        integrity="sha512-3l+bzQRu7gLEJq7fP1ox9u/rTpx0ECS2SF1gJpJllASEKQauLHRVwOSAGg1oqGeIfSdr+9iwYo6VGayJ4wc3gQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Info: Carrgamento da página --}}
    <script>
        $(function() {

            $("#volumoso").on("changed.bs.select",

                function(e, clickedIndex, isSelected, previousValue) {
                    var volumoso_id = $("#volumoso option:selected").val();

                    var data = {
                        volumoso_id: volumoso_id,
                    };

                    $.ajax({
                        type: "GET",
                        url: "/getEstoqueAlimento",
                        data: data,
                        dataType: "json",
                        success: function(response) {

                            //-- Preenche Tabela de Ingredientes
                            $("#historico_est tbody tr").remove();
                            var table = $("#historico_est tbody");
                            $.each(response, function(idx, elem) {
                                console.log('Nome: ' + elem.nome);
                                table.append(
                                    "<tr>" +
                                    "<th scope='row'>1.</th>" +
                                    "<td>" +
                                    elem.nome +
                                    "</td>" +
                                    "<td>" +
                                    elem.data_update +
                                    "</td>" +
                                    "<td>" +
                                    elem.quantidade + ' <smal>' + elem.sigla + '</smal>' +
                                    "</td>" +

                                    "</tr>"
                                );
                            });

                        },
                        //-- end_success
                    });

                }

            );

        });
    </script>

@stop

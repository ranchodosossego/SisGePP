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
                                            aria-selected="true"><i class="fas fa-cog"></i> Simulador - Vaca
                                            Leiteira</a>
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
                                                                    <label for="perc_gordura" class="label_perc_gordura">%
                                                                        de Gordura</label>
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
                                                                    <label for="concentrado_energetico"
                                                                        class="concentrado_energetico">2 - Concentrado
                                                                        (Energético)</label>
                                                                    <select name="concentrado_energetico"
                                                                        id="concentrado_energetico"
                                                                        class="concentrado_energetico selectpicker" multiple
                                                                        data-selected-text-format="count"
                                                                        data-max-options="4" data-style="btn-dark"
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
                                                                    <label for="concentrado_proteico"
                                                                        class="concentrado_proteico">3 - Concentrado
                                                                        (Proteíco)</label>
                                                                    <select name="concentrado_proteico"
                                                                        id="concentrado_proteico"
                                                                        class="concentrado_proteico selectpicker" multiple
                                                                        data-selected-text-format="count"
                                                                        data-max-options="4" data-style="btn-dark">
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
                                            <ol>
                                                <li>Dieta por peso médio do lote;</li>
                                            </ol>
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
    <link rel="stylesheet" href="{{ asset('css/painel/alimentacao/dieta.css') }}" />
@stop

@section('js')
    <script src="{{ asset('js/painel/alimentacao/dieta.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-pt_BR.min.js"
        integrity="sha512-3l+bzQRu7gLEJq7fP1ox9u/rTpx0ECS2SF1gJpJllASEKQauLHRVwOSAGg1oqGeIfSdr+9iwYo6VGayJ4wc3gQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop

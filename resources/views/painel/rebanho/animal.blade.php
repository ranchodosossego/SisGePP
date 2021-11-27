@extends('adminlte::page')

@section('content')

    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Home</a></li>
                        <li class="breadcrumb-item active">Animal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">

                <!-- Coluna 1: Help -->
                <div class="col-md-4">
                    <div class="callout callout-success card-outline direct-chat direct-chat-primary">
                        <h5><i class="far fa-question-circle"></i> Cadastro de Novos Animais</h5>

                        <p>Esses espaço é dedicada ao cadastro de novos animais. São informados dados básicos, como:</p>

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
                                    <small>É data em que o animal chegou a propriedade. Se nascido, informe a data do
                                        nascimento.</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">3</span>
                            </li>
                        </ol>
                    </div>
                    <div class="callout callout-success card-outline direct-chat direct-chat-primary">
                        <h5>Campos Obrigatórios</h5>
                        <i class="fas fa-asterisk text-danger  fa-xs"></i>
                        <small class="fw-light">Todos os campos com asterisco são de preenchimento obrigatório.
                        </small>
                    </div>

                </div>

                <!-- Coluna 2: Dados -->
                <div class="col-md-8">

                    <form action="" id="cform">

                        <!-- Card: Dados do Animal -->
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Dados do Animal</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">

                                {{-- Brinco / Nome / Apelido / Genero --}}
                                <div class="row">

                                    <div class="form-group col-sm-2">
                                        <label for="numero_brinco">Brinco <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border numero_brinco"
                                            id="numero_brinco" placeholder="Brinco">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="nome">Nome <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border nome" id="nome"
                                            placeholder="Nome">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="apelido">Apelido</label>
                                        <input type="text" class="form-control form-control-border apelido" id="apelido"
                                            placeholder="apelido">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="genero">Genero <span class="text-danger">*</span></label>
                                        <select class="custom-select form-control-border genero" id="genero">
                                            <option value="0">----</option>
                                            <option value="1">Fêmea</option>
                                            <option value="2">Macho</option>
                                        </select>
                                    </div>

                                </div>

                                {{-- Raça / Grau de Sangue / Origem --}}
                                <div class="row">

                                    <div class="form-group col-sm-3">
                                        <label for="lstraca">Raça <span class="text-danger">*</span></label>
                                        <select name="raca_idraca" class="custom-select form-control-border raca_idraca"
                                            id="raca_idraca">
                                            <option value="0">----</option>
                                            @foreach ($lstraca as $raca)
                                                <option value="{{ $raca->idraca }}">{{ $raca->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="grau_sangue_idgrau_sangue">Grau de Sangue <span
                                                class="text-danger">*</span></label>
                                        <select name="grau_sangue_idgrau_sangue" id="grau_sangue_idgrau_sangue"
                                            class="custom-select form-control-border grau_sangue_idgrau_sangue">
                                            <option value="0">----</option>
                                            @foreach ($lstgrausangue as $grausangue)
                                                <option value="{{ $grausangue->idgrau_sangue }}">{{ $grausangue->grau }}
                                                    -
                                                    {{ $grausangue->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="origem_idorigem">Origem <span class="text-danger">*</span></label>
                                        <select name="origem_idorigem" id="origem_idorigem"
                                            class="custom-select form-control-border origem_idorigem">
                                            <option value="0">----</option>
                                            @foreach ($lstorigem as $origem)
                                                <option value="{{ $origem->idorigem }}">{{ $origem->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="peso_entrada">Peso (Kg) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border peso_entrada"
                                            id="peso_entrada" placeholder="Peso">
                                    </div>

                                </div>

                                {{-- Sisbov / RGD / RGN / Dias de Vida / Data de Chegada --}}
                                <div class="row">

                                    <div class="form-group col-sm-3">
                                        <label for="numero_sisbov">Sisbov</label>
                                        <input type="text" class="form-control form-control-border numero_sisbov"
                                            id="numero_sisbov" placeholder="Sisbov">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="rgd">RGD</label>
                                        <input type="text" class="form-control form-control-border rgd" id="rgd"
                                            placeholder="RGD">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="rgn">RGN</label>
                                        <input type="text" class="form-control form-control-border rgn" id="rgn"
                                            placeholder="RGN">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="dias_vida">Dias de Vida <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border dias_vida" id="dias_vida"
                                            placeholder="Dias">
                                    </div>

                                </div>

                                {{-- Observação / Foto --}}
                                <div class="row">

                                    <div class="form-group col-sm-4">

                                        <div class="attachment-block clearfix">

                                            <div class="form-group col-sm-12" id="data_nascimento">
                                                <label for="data_nascimento">Data de Nascimento <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control data_nascimento">
                                            </div>

                                            <div class="form-group col-sm-12" id="data_entrada">
                                                <label for="data_entrada">Data de Chegada <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control data_entrada">
                                            </div>

                                            {{-- <h3 class="profile-username text-center">Escolha o Avatar</h3>

                                        <form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload"
                                            action="javascript:void(0)">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input foto" id="foto">
                                                    <label class="custom-file-label" for="foto">Foto...</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text gravar" id="gravar">Gravar</span>
                                                </div>
                                            </div>
                                        </form> --}}

                                        </div>
                                    </div>

                                    <div class="form-group col-sm-8">
                                        <label for="observacao">Observação</label>
                                        <textarea class="form-control form-control-border observacao" rows="5"
                                            placeholder="Digite ..."></textarea>
                                    </div>

                                </div>

                            </div>
                            <!-- /end.card-body -->

                            <!-- /.card-footer -->
                            <div class="card-footer">

                                <div class="row d-flex flex-row-reverse bd-highlight">

                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-block btn-sm salvar">
                                            <i class="fas fa-cloud-upload-alt"></i> Salvar
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- /end.card-footer -->

                        </div>
                        <!-- /.card -->
                    </form>
                </div>
            </div>

        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css\bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="css\iframe.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js\bootstrap-datepicker.min.js"></script>
    <script src="js\bootstrap-datepicker.pt-BR.min.js"></script>

    {{-- Datepickers --}}
    <script>
        $('#data_entrada input').datepicker({
            format: 'dd/mm/yyyy',
            language: "pt-BR",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_nascimento input').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });
    </script>

    {{-- Info: Carrgamento da página --}}
    <script>
        $(document).ready(function() {

            //-- Inserir um novo animal
            $(document).on('click', '.salvar', function(e) {
                e.preventDefault();

                var data = {
                    'nome': $('.nome').val(),
                    'genero': $('.genero').val(),
                    'dias_vida': $('.dias_vida').val(),
                    'data_nascimento': $('.data_nascimento').val(),
                    'data_nescimento_estimado': '1',
                    'data_entrada': $('.data_entrada').val(),
                    'peso_entrada': $('.peso_entrada').val(),
                    'numero_brinco': $('.numero_brinco').val(),
                    'apelido': $('.apelido').val(),
                    'rgn': $('.rgn').val(),
                    'rgd': $('.rgd').val(),
                    'numero_sisbov': $('.numero_sisbov').val(),
                    'foto': $('.foto').val(),
                    'observacao': $('.observacao').val(),

                    // Foreign keys
                    'raca_idraca': $('.raca_idraca').val(),
                    'grau_sangue_idgrau_sangue': $('.grau_sangue_idgrau_sangue').val(),
                    'origem_idorigem': $('.origem_idorigem').val(),

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/animal",
                    data: data,
                    dataType: "json",
                    success: function(response) {

                        //-- Reprovado na validação
                        if (response.status == 400) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'center-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            });
                            Toast.fire({
                                icon: 'error',
                                text: 'Preencha os campos obrigatórios!'
                            });

                        }

                        //-- Animal já cadastrado
                        if (response.status == 100) {
                            Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: response.message,
                                //showConfirmButton: false,
                                text: 'Esse número de brinco pertence a outro animal.',
                                //timer: 2000
                            });
                        }

                        //-- Salvo com sucesso
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Salvo com sucesso!',
                                showConfirmButton: false,
                                text: response.message,
                                timer: 2000
                            });
                            $("#cform")[0].reset();
                        }

                    }
                });

            });

        });
    </script>

@stop

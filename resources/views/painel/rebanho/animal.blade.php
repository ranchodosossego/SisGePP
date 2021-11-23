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
                        <h5>Foto do Animal</h5>

                        <small>Essa foto será usada como avatar para o animal. Tamanho do arquivo não deve ultrapassar:
                            160px L/A.
                            Formato: jpg.
                        </small>
                    </div>

                </div>

                <!-- Coluna 2: Dados -->
                <div class="col-md-8">

                    <!-- Card: Dados do Animal -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Dados do Animal</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            {{-- Brinco / Nome / Apelido / Genero / Peso --}}
                            <div class="row">

                                <div class="form-group col-sm-2">
                                    <label for="numero_brinco">Brinco</label>
                                    <input type="text" class="form-control form-control-border numero_brinco"
                                        id="numero_brinco" placeholder="Brinco">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control form-control-border nome" id="nome"
                                        placeholder="Nome">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control form-control-border apelido" id="apelido"
                                        placeholder="apelido">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="genero">Genero</label>
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
                                    <label for="lstraca">Raça</label>
                                    <select name="lstraca" id="lstraca" class="custom-select form-control-border lstraca">
                                        <option value="0">----</option>
                                        @foreach ($lstraca as $raca)
                                            <option value="{{ $raca->idraca }}">{{ $raca->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="lstgrausangue">Grau de Sangue</label>
                                    <select name="lstgrausangue" id="lstraca"
                                        class="custom-select form-control-border lstgrausangue">
                                        <option value="0">----</option>
                                        @foreach ($lstgrausangue as $grausangue)
                                            <option value="{{ $grausangue->idgrausangue }}">{{ $grausangue->grau }} -
                                                {{ $grausangue->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="lstorigem">Origem</label>
                                    <select name="lstorigem" id="lstorigem"
                                        class="custom-select form-control-border lstorigem">
                                        <option value="0">----</option>
                                        @foreach ($lstorigem as $origem)
                                            <option value="{{ $origem->idorigem }}">{{ $origem->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="peso_entrada">Peso (Kg)</label>
                                    <input type="text" class="form-control form-control-border peso_entrada"
                                        id="peso_entrada" placeholder="Peso">
                                </div>

                            </div>

                            {{-- Sisbov / RGD / RGN / Dias de Vida / Data de Chegada --}}
                            <div class="row">

                                <div class="form-group col-sm-2">
                                    <label for="numero_sisbov">Sisbov</label>
                                    <input type="text" class="form-control form-control-border numero_sisbov"
                                        id="numero_sisbov" placeholder="Sisbov">
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="rgd">RGD</label>
                                    <input type="text" class="form-control form-control-border rgd" id="rgd"
                                        placeholder="RGD">
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="rgn">RGN</label>
                                    <input type="text" class="form-control form-control-border rgn" id="rgn"
                                        placeholder="RGN">
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="dias_vida">Dias de Vida</label>
                                    <input type="text" class="form-control form-control-border rgn" id="dias_vida"
                                        placeholder="Dias">
                                </div>

                                <div class="form-group col-sm-4" id="data_entrada">
                                    <label for="data_entrada">Data de Chegada</label>
                                    <input type="text" class="form-control data_entrada">
                                </div>

                            </div>

                            {{-- Observação / Foto --}}
                            <div class="row">

                                <div class="form-group col-sm-6">

                                    <div class="attachment-block clearfix">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="/storage/assets/img/girolando-128x128-2.jpg"
                                                alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">Escolha o Avatar</h3>

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Foto...</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Gravar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="observacao">Observação</label>
                                    <textarea class="form-control form-control-border observacao" rows="6"
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
    <script src="js\bootstrap-datepicker.min.js"></script>
    <script src="js\bootstrap-datepicker.pt-BR.min.js"></script>
    <script>
        $('#data_entrada input').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });
    </script>

    <script>
        $(document).ready(function() {

            //listraca();


            //-- Inserir um novo animal
            $(document).on('click', '.salvar', function(e) {
                e.preventDefault();

                // $(this).text('Sending..');

                var data = {

                    'numero_brinco': $('.numero_brinco').val(),
                    'rgn': $('.rgn').val(),
                    'rgd': $('.rgd').val(),
                    'peso_entrada': $('.peso_entrada').val(),
                    'origem': $('.origem').val(),
                    'observacao': $('.observacao').val(),
                    'numero_sisbov': $('.numero_sisbov').val(),
                    'apelido': $('.apelido').val(),
                    'idade': $('.idade').val(),
                    'foto': $('.foto').val(),

                    'grau_sangue_idgrau_sangue': $('.grau_sangue_idgrau_sangue').val(),
                    'genero': $('.genero').val(),
                    'raca_idraca': $('.raca_idraca').val(),
                    'propriedade_idpropriedade': $('.propriedade_idpropriedade').val(),
                    'data_entrada': $('.data_entrada').val(),
                    'nome': $('.nome').val(),

                }

                console.log(data);

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
                        console.log(response);
                        // if (response.status == 400) {
                        //     $('#save_msgList').html("");
                        //     $('#save_msgList').addClass('alert alert-danger');
                        //     $.each(response.errors, function(key, err_value) {
                        //         $('#save_msgList').append('<li>' + err_value + '</li>');
                        //     });
                        //     $('.add_student').text('Save');
                        // } else {
                        //     $('#save_msgList').html("");
                        //     $('#success_message').addClass('alert alert-success');
                        //     $('#success_message').text(response.message);
                        //     $('#AddStudentModal').find('input').val('');
                        //     $('.add_student').text('Save');
                        //     $('#AddStudentModal').modal('hide');
                        //     fetchstudent();
                        // }
                    }
                });

            });

            //-- Lista Origem
            function listraca() {
                //e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "/list-raca",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // $('tbody').html("");
                        // $.each(response.students, function(key, item) {
                        //     $('tbody').append('<tr>\
                        //                     <td>' + item.id + '</td>\
                        //                     <td>' + item.name + '</td>\
                        //                     <td>' + item.course + '</td>\
                        //                     <td>' + item.email + '</td>\
                        //                     <td>' + item.phone + '</td>\
                        //                     <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                        //                     <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        //                 \</tr>');
                        // });
                    }
                });
            }



        });
    </script>

@stop

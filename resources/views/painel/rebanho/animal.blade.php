@extends('adminlte::page')

@section('content')

    <section class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Novos Animais</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                <!-- left column: Dados do Indivíduo / Dados Técnicos -->
                <div class="col-md-6">

                    <!-- Card: Dados do Indivíduo -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Dados do Indivíduo</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            {{-- Nome / Apelido / Genero --}}
                            <div class="row">

                                <div class="form-group col-sm-5">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control form-control-border nome" id="nome"
                                        placeholder="Nome">
                                </div>

                                <div class="form-group col-sm-4">
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

                            {{-- Raça / Origem / Data de Chegada --}}
                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label for="lstraca">Raça</label>
                                    <select name="lstraca" id="lstraca" class="custom-select form-control-border lstraca">
                                        <option value="0">----</option>
                                        @foreach($lstraca as $raca)
                                            <option value="{{ $raca->idraca }}">{{ $raca->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="lstorigem">Origem</label>
                                    <select name="lstorigem" id="lstorigem" class="custom-select form-control-border lstorigem">
                                        <option value="0">----</option>
                                        @foreach($lstorigem as $origem)
                                            <option value="{{ $origem->idorigem }}">{{ $origem->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-4" id="data_entrada">
                                    <label for="data_entrada">Data de Chegada</label>
                                    <input type="text" class="form-control data_entrada">
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->

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
                        <!-- /.card-footer -->

                    </div>
                    <!-- /.card -->

                    <!-- Card: Dados Técnicos -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Dados Técnicos</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-sm-3">
                                    <label for="numero_brinco">Brinco</label>
                                    <input type="text" class="form-control form-control-border numero_brinco"
                                        id="numero_brinco" placeholder="Número">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control form-control-border ww" id="www"
                                        placeholder="apelido">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- right column -->
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="/storage/assets/img/girolando-128x128-2.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <div class="form-group">
                                <label for="exampleInputFile">Foto do Animal</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Escolha uma foto</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Gravar</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

            </div>

        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css\bootstrap-datepicker3.min.css">
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

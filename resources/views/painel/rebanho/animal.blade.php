@extends('adminlte::page')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Novos Animais</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">

                    <!-- general form elements -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Dados do Animal</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row">

                                <div class="form-group col-sm-3">
                                    <label for="brinco">Brinco</label>
                                    <input id="brinco" type="text" class="form-control form-control-border"
                                        placeholder="Número">
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control form-control-border" id="nome"
                                        placeholder="Nome">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="nome">Apelido</label>
                                    <input type="text" class="form-control form-control-border" id="apelido"
                                        placeholder="apelido">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-3">
                                    <label for="raca">Genero</label>
                                    <select class="custom-select form-control-border" id="genero">
                                        <option>Fêmea</option>
                                        <option>Macho</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="raca">Raça</label>
                                    <select class="custom-select form-control-border" id="raca">
                                        <option>Girolando</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-4" id="raca-container">
                                    <label for="raca">Data de Entrada</label>
                                    <input type="text" class="form-control">
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/storage/assets/img/girolando-128x128-2.jpg"
                                    alt="User profile picture">
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
        $('#raca-container input').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });
    </script>

@stop

@extends('adminlte::page')

@section('content')
    <div class="content-wrapper">

        <h1></h1>

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 mt-2">


                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dados do Animal</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row">

                                <div class="form-group col-md-2">
                                    <label for="brinco">Brinco</label>
                                    <input id="brinco" type="text" class="form-control form-control-border"
                                        placeholder="Número do Brinco">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control form-control-border" id="nome"
                                        placeholder="Nome">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="raca">Raça</label>
                                    <select class="custom-select form-control-border" id="raca">
                                        <option>Girolando</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="raca">Genero</label>
                                    <select class="custom-select form-control-border" id="genero">
                                        <option>Fêmea</option>
                                        <option>Macho</option>
                                    </select>
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
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

@stop

@section('js')

@stop

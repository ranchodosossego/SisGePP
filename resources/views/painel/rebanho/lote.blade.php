@extends('adminlte::page')

@section('content')
    <!-- Header com o Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formação de Lotes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/rebanho">Home</a></li>
                        <li class="breadcrumb-item active">Lote</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo -->
    <section class="content-wrapper">
        <div class="container-fluid">

            {{-- Menu --}}
            <div class="card lotes" id='mymenu'>
                <form action="" id="cform">
                    <div class="card-body text-center">

                        <a class="btn btn-app ml-0 vazia">
                            <span class="badge bg-success">
                                {{ $lstanimal->where('idtipo_lote', '=', '1')->count() }}
                            </span>
                            <i class="fab fa-creative-commons-zero"></i><small> Vazia</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-orange">
                                {{ $lstanimal->where('idtipo_lote', '=', '2')->count() }}
                            </span>
                            <i class="fas fa-circle-notch"></i><small> Vacas Secas</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-light">
                                {{ $lstanimal->where('idtipo_lote', '=', '3')->count() }}
                            </span>
                            <i class="fas fa-ambulance"></i><small> Pré-Parto</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-maroon">
                                {{ $lstanimal->where('idtipo_lote', '=', '4')->count() }}
                            </span>
                            <i class="fas fa-briefcase-medical"></i><small> Pós-Parto</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-primary">
                                {{ $lstanimal->where('idtipo_lote', '=', '5')->count() }}
                            </span>
                            <i class="fab fa-product-hunt"></i><small> Primíparas</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-danger">
                                {{ $lstanimal->where('idtipo_lote', '=', '6')->count() }}
                            </span>
                            <i class="fas fa-hand-holding"></i><small> Baixa Produção</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-blue">
                                {{ $lstanimal->where('idtipo_lote', '=', '7')->count() }}
                            </span>
                            <i class="fas fa-hand-holding-usd"></i><small> Alta Produção</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-green">
                                {{ $lstanimal->where('idtipo_lote', '=', '8')->count() }}
                            </span>
                            <i class="fas fa-baby-carriage"></i><small> Bezerreiro</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-warning">
                                {{ $lstanimal->where('idtipo_lote', '=', '9')->count() }}
                            </span>
                            <i class="fas fa-clinic-medical"></i><small> Enfermaria</small>
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-indigo">
                                {{ $lstanimal->where('idtipo_lote', '=', '10')->count() }}
                            </span>
                            <i class="fas fa-laptop-house"></i><small> Triagem</small>
                        </a>

                    </div>
                    <!-- /.card-body -->
                </form>
            </div>

            {{-- Grid --}}
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title">Lote de Animais </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-light">
                    <table class="ui celled table" id="lstanimallote" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>Brinco</th>
                                <th>Nome</th>
                                <th>Dias de Vida</th>
                                <th>Apelido</th>
                                <th>Genero</th>
                                <th>Tipo</th>

                            </tr>
                        </thead>
                        <tbody class="">

                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->

            </div>

        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

    <script>

        $(document).ready(function() {
            listar();
        });

        //--> Inserir um novo animal
        $(document).on('click', '.vazia', function(e) {
            e.preventDefault();
            $('#lstanimallote').DataTable().ajax.reload(null,false);
        });
        //-- end

        //--> Carrega a Grid de Animais
        var listar = function() {
            var table = $('#lstanimallote').DataTable({
                processing: true,
                info: true,
                ajax: "{{ route('get.animal.list') }}",
                pageLength: 5,
                aLengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'Todos']
                ],
                "language": {
                    "url": "js/pt-br.json"
                },
                columns: [
                    { data: 'numero_brinco', name: 'numero_brinco' },
                    { data: 'nome', name: 'nome' },
                    { data: 'dias_vida', name: 'dias_vida' },
                    { data: 'apelido', name: 'apelido' },
                    { data: 'genero', name: 'genero' },
                    { data: 'tnome', name: 'tnome' },
                ]
            });
        };
        //-- end


    </script>
@stop

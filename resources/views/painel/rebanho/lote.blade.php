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
            <div class="card lotes" id='mycard'>

                <div class="card-body text-center">

                    <a class="btn btn-app ml-0">
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
            </div>

            {{-- Grid --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Brinco</th>
                                <th>Nome</th>
                                <th>Lote</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animals as $animal)
                                <tr>
                                    <td>{{ $animal->numero_brinco }}</td>
                                    <td>{{ $animal->nome }}</td>
                                    <td>{{ $animal->lote_idlote }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{-- <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>

                    </ul> --}}

                    {{ $animals->onEachSide(1)->links() }}

                </div>

            </div>

        </div>
    </section>
@stop

@section('css')

@stop

@section('js')
    <script>

        $(document).ready(function() {
            console.log('click iframeLoaded');

        });
    </script>
@stop

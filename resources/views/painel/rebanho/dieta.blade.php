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
                    <div class="card  card-success card-outline">
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
                    <div class="card  card-success card-outline">
                        <div class="card-body pb-0">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@stop


@section('css')
@stop

@section('js')

    <script>
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
                        $('#tipolote').val(response.data[0].idtipo_lote + ' - ' + response.data[0].nome);
                        $('#observacao').val(response.data[0].observacao);
                    }
                }
            });

        });
    </script>
@stop

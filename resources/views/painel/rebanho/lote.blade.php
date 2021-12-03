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
            <div class="card card-success card-outline">
                <div class="card-header">
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
    {{-- <link rel="stylesheet" href="css/app.css" /> --}}


@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //--> Carregamento Principal
        $(document).ready(function() {
            listar();
        });

        //--> Inserir um novo animal
        $(document).on('click', '.vazia', function(e) {
            e.preventDefault();
            $('#lstanimallote').DataTable().ajax.reload(null, false);
        });
        //-- end

        //--> Carregamento Inicial do Grid de Animais
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
                columns: [{
                        data: 'numero_brinco',
                        name: 'numero_brinco'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'dias_vida',
                        name: 'dias_vida'
                    },
                    {
                        data: 'apelido',
                        name: 'apelido'
                    },
                    {
                        data: 'tnome',
                        name: 'tnome'
                    },

                ]
            });
        };
        //-- end

        //--> Função incorporada ao botão dentro do grid.
        var msgs = function(idanimal) {

            //--> Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {
                idanimal: idanimal,
            };
            //-- .end
            // $.ajax({
            //     type: "GET",
            //     url: "/getAnimal",
            //     data: data,
            //     dataType: "json",
            //     success: function(response) {
            //         console.log('Foi ' + response.data[0].nome);
            //     }
            // });

            var animal = function() {
                var tmp = null;
                $.ajax({
                    type: "GET",
                    url: "/getAnimal",
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function(response) {
                        tmp = response.data[0];
                    }
                });
                return tmp;
            }();

            $.ajax({
                type: "POST",
                url: "/getTipoLote",
                data: data,
                dataType: "json",
                success: function(response) {

                    //--> Parametrização
                    var options = {};
                    $.map(response.data,
                        function(o) {
                            options[o.idtipo_lote] = o.nome;
                        });

                    var html =
                        '<div class="card bg-light d-flex flex-fill" style="overflow: hidden;">' +
                        '<div class="row g-0">' +

                        '<div class="col-md-7">' +
                        '<div class="card-body " style="text-align: start !important;">' +
                        '<h2 class="lead"><b>' + animal.nome + '</b></h2>' +
                        // '<p class="text-muted text-sm"><b>Brinco: </b> ' + animal.numero_brinco + '</p>' +
                        // '<p class="text-muted text-sm"><b>Dias de Vida: </b> ' + animal.dias_vida + '</p>' +
                        // '<p class="text-muted text-sm"><b>Brinco: </b> ' + animal.numero_brinco + '</p>' +

                        '<ul class="list-group">' +

                        '<li class="list-group-item bg-light"><b>Brinco: </b> ' + animal.numero_brinco + '</li>' +
                        '<li class="list-group-item bg-light">A third item</li>' +
                        '<li class="list-group-item bg-light">A fourth item</li>' +
                        '<li class="list-group-item bg-light">And a fifth one</li>' +
                        '</ul>' +


                        '</div>' +
                        '</div>' +

                        '<div class="col-4 mt-3">' +
                        '<img src="assets/img/animal/vacaseca.jpg" alt="user-avatar" class="profile-user-img img-fluid img-circle">' +
                        '</div>' +

                        '</div>' +

                        '</div>'
                    //--> .end parametrização

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    });

                    swalWithBootstrapButtons.fire({
                        html: html,
                        input: 'select',
                        inputPlaceholder: '<i class="fas fa-angle-right"></i> Selecione',
                        inputOptions: options,
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Vaca Seca',
                        showCancelButton: true,
                        confirmButtonText: 'Associar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('result.isConfirmed');

                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            /* Read more about handling dismissals below */
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your imaginary file is safe :)',
                                'error'
                            )
                        }
                    });
                    //-- end


                }
            });



        };
    </script>
@stop

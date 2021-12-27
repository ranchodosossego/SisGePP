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
                                {{-- {{ $lstanimal->where('idtipo_lote', '=', '1')->count() }} --}}
                                <span id="vazia"></span>
                            </span>
                            <i class="fab fa-creative-commons-zero"></i><small> Vazia</small>
                        </a>
                        <a class="btn btn-app vacaseca">
                            <span class="badge bg-orange">
                                <span id="vacaseca"></span>
                            </span>
                            <i class="fas fa-circle-notch"></i><small> Vacas Secas</small>
                        </a>
                        <a class="btn btn-app pre-parto">
                            <span class="badge bg-light">
                                <span id="pre-parto"></span>
                            </span>
                            <i class="fas fa-ambulance"></i><small> Pré-Parto</small>
                        </a>
                        <a class="btn btn-app pos-parto">
                            <span class="badge bg-maroon">
                                <span id="pos-parto"></span>
                            </span>
                            <i class="fas fa-briefcase-medical"></i><small> Pós-Parto</small>
                        </a>
                        <a class="btn btn-app primiparas">
                            <span class="badge bg-primary">
                                <span id="primiparas"></span>
                            </span>
                            <i class="fab fa-product-hunt"></i><small> Primíparas</small>
                        </a>
                        <a class="btn btn-app baixaproducao">
                            <span class="badge bg-danger">
                                <span id="baixaproducao"></span>
                            </span>
                            <i class="fas fa-hand-holding"></i><small> Baixa Produção</small>
                        </a>
                        <a class="btn btn-app altaproducao">
                            <span class="badge bg-blue">
                                <span id="altaproducao"></span>
                            </span>
                            <i class="fas fa-hand-holding-usd"></i><small> Alta Produção</small>
                        </a>
                        <a class="btn btn-app bezerreiro">
                            <span class="badge bg-green">
                                <span id="bezerreiro"></span>
                            </span>
                            <i class="fas fa-baby-carriage"></i><small> Bezerreiro</small>
                        </a>
                        <a class="btn btn-app enfermaria">
                            <span class="badge bg-warning">
                                <span id="enfermaria"></span>
                            </span>
                            <i class="fas fa-clinic-medical"></i><small> Enfermaria</small>
                        </a>
                        <a class="btn btn-app triagem">
                            <span class="badge bg-indigo">
                                <span id="triagem"></span>
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
    <style>
        .button-action {
            margin-end: 10px;
        }

    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //--> Inclusão do Token CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //--> Carregamento Principal
        $(document).ready(function() {
            listar();
            lstLotes();
        });

        //--> Inserir um novo animal
        $(document).on('click', '.vazia', function(e) {
            e.preventDefault();
            $('#lstanimallote').DataTable().ajax.reload(null, false);
        });
        //-- end

        //--> Atualiza as quantidades para cada lote
        var lstLotes = function() {

            var data = {
                idanimal: 1,
            };
            $.ajax({
                type: "POST",
                url: "/getLotesAnimal",
                data: data,
                dataType: "json",
                success: function(response) {
                    //--
                    if (response.status == 200) {
                        $("#vazia").html(response.objeto.filter(x => x.idtipo_lote === 1).length);
                        $("#vacaseca").html(response.objeto.filter(x => x.idtipo_lote === 2).length);
                        $("#pre-parto").html(response.objeto.filter(x => x.idtipo_lote === 3).length);
                        $("#pos-parto").html(response.objeto.filter(x => x.idtipo_lote === 4).length);
                        $("#primiparas").html(response.objeto.filter(x => x.idtipo_lote === 5).length);
                        $("#baixaproducao").html(response.objeto.filter(x => x.idtipo_lote === 6).length);
                        $("#altaproducao").html(response.objeto.filter(x => x.idtipo_lote === 7).length);
                        $("#bezerreiro").html(response.objeto.filter(x => x.idtipo_lote === 8).length);
                        $("#enfermaria").html(response.objeto.filter(x => x.idtipo_lote === 9).length);
                        $("#triagem").html(response.objeto.filter(x => x.idtipo_lote === 10).length);
                    }
                }
            });
        };
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
                    [5, 10, 25, 50, 'All']
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

            var data = {
                idanimal: idanimal,
            };
            //-- .end

            //--> Obtem o animal pelo ID
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

            //-- .end

            //--> Carrega a modal de associação - HTML
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

                    //--> Corpo da modal de associação
                    var html =
                        '<div class="card bg-light d-flex flex-fill" style="overflow: hidden;">' +
                        '<div class="row g-0">' +

                        '<div class="col-md-6 bg-warning bg-gradient">' +
                        '<div class="card-body" style="text-align: start !important;">' +
                        '<h2 class="lead"><i class="far fa-bookmark"></i> <b> Ficha Técnica</b></h2>' +

                        '<dl>' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Nome</dt>' +
                        '<dd class="mb-2" style="font-size: 0.65em;">' + (animal.nome ?? '-') + '</dd>' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Lote Atual</dt>' +
                        '<dd class="mb-3" style="font-size: 0.65em;">' + animal.tnome + '</dd>' + '</dd>' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Brinco</dt>' +
                        '<dd class="mb-2" style="font-size: 0.65em;">' + ("000000" + animal.numero_brinco).slice(-6) + '</dd>' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Dias de Vida</dt>' +
                        '<dd class="mb-2" style="font-size: 0.65em;">' + animal.dias_vida + '</dd>' +

                        '</dl>' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 mt-3">' +
                        //'<img src="assets/img/animal/vacaseca.jpg" alt="user-avatar" class="profile-user-img img-fluid img-circle">' +
                        '<img src=\"' + (animal.foto ?? 'assets/img/no-foto.jpg') +
                        '\" alt="user-avatar" class="img-thumbnail img-responsive">' +


                        '<dl class="mt-3" style="text-align: start !important;">' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Peso de Entrada</dt>' +
                        '<dd class="mb-3" style="font-size: 0.65em;">' + animal.peso_entrada + '</dd>' +
                        '<dt class="mb-1" style="font-size: 0.8em;"><i class="fas fa-thumbtack fa-xs"></i> Observação</dt>' +
                        '<dd class="mb-2" style="font-size: 0.65em;">' + (animal.observacao ?? '-') +
                        '</dl>' +
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
                        //position: 'top',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Vaca Seca',
                        showCancelButton: true,
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Associar!',
                        cancelButtonText: '<i class="fas fa-ban"></i> Cancelar',
                        reverseButtons: true,
                        customClass: {
                            confirmButton: 'btn btn-success m-2 btn-sm',
                            cancelButton: 'btn btn-danger btn-sm',
                        }
                    }).then((result) => {

                        if (result.isConfirmed && result.value != '') {

                            var dataupdate = {
                                idanimal: animal.idanimal,
                                idtipo_lote: result.value,
                            }

                            //--> Atualiza o lote do animal
                            $.ajax({
                                type: "POST",
                                url: "/updateLoteAnimal",
                                data: dataupdate,
                                dataType: "json",
                                success: function(response) {

                                    //-- Salvo com sucesso
                                    if (response.status == 200) {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            //title: 'Salvo com sucesso!',
                                            showConfirmButton: false,
                                            text: response.message,
                                            timer: 1800
                                        });
                                    }
                                    tmp = response;
                                }
                            });

                            //--> Atualiza as quantidades para cada lote
                            lstLotes();

                            //--> Atualiza o grid
                            $('#lstanimallote').DataTable().ajax.reload(null, false);

                        } else if (result.isConfirmed && result.value == '') {
                            swalWithBootstrapButtons.fire(
                                'Atenção',
                                'Selecione um lote!)',
                                'warning'
                            )
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            /* Read more about handling dismissals below */
                            // swalWithBootstrapButtons.fire(
                            //     'Cancelled',
                            //     'Your imaginary file is safe :)',
                            //     'error'
                            // )
                        }
                    });
                    //-- end

                }
            });
            //--> .end

        };
        //--> .end msgs
    </script>
@stop

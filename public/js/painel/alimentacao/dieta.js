    /*
    |--------------------------------------------------------------------------
    | Alimentação -> Dieta
    |--------------------------------------------------------------------------
    |
    | Script da tela de dieta.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */
$(function () {
    //--
    $(document).on("click", ".montar", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var listar = function (items) {
            //console.log(items);
            var alimento_ids = [];
            $(items).each(function () {
                if ($(this).val() != "") {
                    alimento_ids.push($(this).val());
                }
            });
            return alimento_ids;
        };

        var volumoso_ids = listar($("#volumoso option:selected"));

        var prodleitedia = $("#prodleitedia option:selected").val();
        var concentrado_energetico_ids = [];
        var concentrado_proteico_ids = [];

        if (prodleitedia > 0) {
            concentrado_energetico_ids = listar(
                $("#concentrado_energetico option:selected")
            );
            concentrado_proteico_ids = listar(
                $("#concentrado_proteico option:selected")
            );
        }

        var value = $(".nucleo").val();
        var nucleo =
            value === "" || value === null || value === undefined
                ? 0
                : $(".nucleo").val();

        var data = {
            volumoso_ids: volumoso_ids,
            concentrado_energetico_ids: concentrado_energetico_ids,
            concentrado_proteico_ids: concentrado_proteico_ids,
            peso_vivo: $(".peso_vivo").val(),
            nucleo: nucleo,
            prodleitedia: prodleitedia,
            perc_gordura: $(".perc_gordura").val(),
        };

        // Monta a Dieta
        $.ajax({
            type: "GET",
            url: "/getDieta",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status != 200) {
                    const msg = [];
                    msg.push("<ol class='list-group'>");
                    for (var i = 0; i < response.validacao.length; i++) {
                        var m = response.validacao[i].message;
                        $.each(m, function (idx, elem) {
                            msg.push(
                                "<li class='d-flex justify-content-between align-items-start bg-transparent mt-3'>" +
                                    elem +
                                    "</li>"
                            );
                        });
                    }
                    msg.push("</ol>");

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-right",
                        iconColor: "#f27474",
                        customClass: {
                            popup: "colored-toast",
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        //width: 600,
                        html: msg.join(" "),
                        didOpen: (toast) => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                    });
                    Toast.fire({
                        icon: "error",
                        //footer: '<a href>Why do I have this issue?</a>',
                        //text: msg,
                    });

                    $("#itens div").remove();
                    $("#ingredientes tbody tr").remove();
                    return;
                }

                $("#itens div").remove();
                var dados_gerais = $(".dados_gerais");
                const bg_colors = new Array(
                    "bg-success",
                    "bg-warning",
                    "bg-danger",
                    "bg-primary",
                    "bg-dark",
                    "bg-info"
                );
                const icons = new Array(
                    "fas fa-caret-up",
                    "fas fa-caret-left",
                    "fas fa-caret-down",
                    "fas fa-plus fa-xs"
                );
                const texts = new Array(
                    "text-teal",
                    "text-warning",
                    "text-orange",
                    "text-info"
                );

                // COLOCAR A DURAÇÃO DO NÚCLEO EM MESES

                $.each(response.dados_gerais, function (idx, elem) {
                    if (idx < 4) {
                        //let t = (elem.perc == 0) ? texts[2] : (elem.perc < 50) ? texts[1] : (elem.perc >= 50) ? texts[0] : texts[3];
                        let i =
                            elem.perc == 0
                                ? icons[2]
                                : elem.perc == 100
                                ? icons[3]
                                : elem.perc < 50
                                ? icons[1]
                                : elem.perc >= 50
                                ? icons[0]
                                : icons[0];

                        dados_gerais.append(
                            "<div class='col-sm-3 col-6' id='itens'>" +
                                "<div class='description-block border-right'>" +
                                "<span class='description-percentage " +
                                texts[idx] +
                                "' id='perc'>" +
                                "<i class='" +
                                i +
                                "'></i><strong> " +
                                elem.perc +
                                " % </strong></span>" +
                                "<h5 class='description-header' id='kg'>" +
                                elem.kg +
                                " Kg</h5>" +
                                "<span class='description-text' id='nome'>" +
                                elem.nome +
                                "</span>" +
                                "</div>" +
                                "</div>"
                        );
                    }
                });

                //-- Preenche Tabela de Ingredientes
                $("#ingredientes tbody tr").remove();
                var table = $("#ingredientes tbody");
                var i = 0;
                const bg_color = new Array("bg-dark", "", "", "", "", "");
                const bar_color = new Array(
                    "bg-success",
                    "bg-info",
                    "bg-warning",
                    "bg-danger",
                    "bg-primary",
                    "bg-info"
                );

                $.each(response.dados_grid, function (idx, elem) {
                    table.append(
                        "<tr class='" +
                            bg_color[i] +
                            "'>" +
                            "<th scope='row'>" +
                            (i + 1) +
                            ".</th>" +
                            "<td>" +
                            elem.nome +
                            "</td>" +
                            "<td>" +
                            elem.categoria +
                            "</td>" +
                            "<td>" +
                            "<div id='progressbar' class='progress mt-1'>" +
                            "<div id='progress' class='progress-bar progress-bar-striped progress-bar-animated " +
                            bar_color[i] +
                            "'" +
                            "aria-valuemin='0' aria-valuemax='100' role='progressbar'" +
                            "style=' border-radius: 4px; width:" +
                            (elem.perc + 15) +
                            "%'>" +
                            "<span class='pe-2 ps-2'><strong>" +
                            elem.perc +
                            "%</strong></span>" +
                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "<td><span style='font-size: 1.1em; width: 70%;' class='p-1 badge " +
                            bar_color[i] +
                            "'>" +
                            elem.kg +
                            " Kg</span>" +
                            "</td>" +
                            "</tr>"
                    );
                    i++;
                });
            },
            //-- end_success
        });
    });

    //-- Enable/Disabls dos itens de tela
    $("#prodleitedia").on(
        "changed.bs.select",
        function (e, clickedIndex, isSelected, previousValue) {
            var prodleitedia = $("#prodleitedia option:selected").val();

            if (prodleitedia == 0) {
                $(".concentrado_energetico").prop("disabled", true);
                $(".concentrado_energetico").selectpicker("deselectAll");
                $(".concentrado_energetico").selectpicker("refresh");

                $(".concentrado_proteico").prop("disabled", true);
                $(".concentrado_proteico").selectpicker("deselectAll");
                $(".concentrado_proteico").selectpicker("refresh");

                $(".perc_gordura").prop("disabled", true);
                $(".perc_gordura").val("");

                $(".concentrado_energetico").addClass("not-allowed text-muted");
                $(".concentrado_proteico").addClass("not-allowed text-muted");
                $(".perc_gordura").addClass("not-allowed text-muted");
                $(".label_perc_gordura").addClass("not-allowed text-muted");
            }

            if (prodleitedia != 0) {
                $(".concentrado_energetico").prop("disabled", false);
                $(".concentrado_energetico").selectpicker("refresh");

                $(".concentrado_proteico").prop("disabled", false);
                $(".concentrado_proteico").selectpicker("refresh");
                $(".perc_gordura").prop("disabled", false);

                $(".concentrado_energetico").removeClass(
                    "not-allowed text-muted"
                );
                $(".concentrado_proteico").removeClass(
                    "not-allowed text-muted"
                );
                $(".perc_gordura").removeClass("not-allowed text-muted");
                $(".label_perc_gordura").removeClass("not-allowed text-muted");
            }
        }
    );
});

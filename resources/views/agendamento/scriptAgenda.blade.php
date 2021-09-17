<script type="text/javascript">
    $(function() {


        // Função Botão pesquisa Horario
        $("#btnagenda").on("click", function() {
            let dayIn = moment().format('YYYY-MM-DD');
            $('#datadata').val(dayIn);
            
            var data = new Date();
            dayName = new Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado");
            monName = new Array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto",
                "outubro", "novembro", "dezembro");
            var amanha = new Date();
            amanha.setDate(amanha.getDate() + 1);
            Today1 = data.toLocaleDateString();
            Today2 = amanha.toLocaleDateString();

            var dataTracinho = Today2.replace(new RegExp("/", "g"), "-");


            $("#hoje").text(dayName[data.getDay()] + ',' + Today1);
            $("#amanha").text(dayName[data.getDay() + 1] + ',' + Today2);
            // $("#hoje").text(dayName[data.getDay()]);
            // $("#amanha").text(dayName[data.getDay() + 1]);            
            $(".modalagendamento").modal('show');
        });


        //função que trás data e horario pra o formulário de agendamento
        $("#tableagenda").change(function(e) {

            //PEGANDO O DATA-ATTRIBUTE
            today3 = $("#datadata").val();
            console.log(today3);
            $("input", this).each(function(p) {
                $(this).attr("data-day", today3);
            })
            let hora = $("input[name='check']:checked").attr('data-hora');
            let data = $("input[name='check']:checked").attr('data-day');
            //pega o valor do check
            //  let g = $("input[name='check']:checked").val();
            //$("td01").text();
            ;



            p = true
            if (p === true) {
                $("#horaAgendamento").val(hora);
                $("#dataAgendamento").val(data);
                $('.modalagendamento').modal('toggle');

            }

        });


        //Função Tabela Agenda Carrega os Horarios e deixa disponivel
        $("table#tableagenda tr").each(function(i) {
            arr = [{
                        id: '01',
                        nome: 'pablo',
                        horario: '13:00 ',
                    },
                    {
                        id: '02',
                        nome: 'Pablito',
                        horario: '09:00 ',
                    },
                    {
                        id: '02',
                        nome: 'Pablito',
                        horario: '08:00 ',
                    },
                    {
                        id: '03',
                        nome: 'Cristiano',
                        horario: '14:00 '
                    },
                    {
                        id: '03',
                        nome: 'Cristiano',
                        horario: '15:00 '
                    },
                    {
                        id: '03',
                        nome: 'Cristiano',
                        horario: '16:30 '
                    },
                    {
                        id: '03',
                        nome: 'Cristiano',
                        horario: '17:00 '
                    },
                    {
                        id: '03',
                        nome: 'Cristiano',
                        horario: '19:00 '
                    }
                ],
                data = new Date();
            Today1 = data.toLocaleDateString();

            $("td", this).each(function(j) {
                // console.log("".concat("row: ", i, ", col: ", j, ", value: ", $(this).text()));
                j = $(this).text()
                for (let e = 0; e < arr.length; e++) {

                    if (arr[e].horario === j) {
                        $(this).addClass('table-danger');
                        $("input", this).each(function(p) {
                            $(this).prop("disabled", true);

                        });
                    }
                }

            });

        });




    });
</script>

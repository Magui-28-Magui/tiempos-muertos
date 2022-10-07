</main>
<!-- Footer -->
<footer class="footer mt-auto py-3 shadow border-top" style="background-color: #00468A;">
    <div class="container">
        <span class="text-white fw-bold fs-5 d-flex justify-content-center">© 2022 MARTECH MEDICAL PRODUCTS.</span>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->
<script src="<?php echo  base_url() ?>assets/datatables/DataTables-1.12.0/js/jquery.dataTables.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?php echo  base_url() ?>assets/js/axios.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="<?php echo  base_url() ?>assets/js/charts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function getPlants() {
        fetch('<?= base_url() . 'index.php/plants' ?>')
            .then(response => response.json())
            .then(result => {
                var select = document.getElementById("get_plants");

                result.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.name;
                    select.appendChild(option);
                })
            })
            .catch(error => {
                console.log('Error ->', error)
            })
    }

    function getPlantsChart() {
        fetch('<?= base_url() . 'index.php/plants' ?>')
            .then(response => response.json())
            .then(result => {

                var select = document.getElementById("chart_plant");

                result.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.name;
                    select.appendChild(option);
                })
            }).catch(error => {
                console.log(error)
            })
    }

    function getData(plant) {
        if (plant === 'planta 1' || plant === 'planta 2' || plant === 'planta 3') {
            getSupervisor(plant);
            getPlannerCode(plant);
        }
    }

    function getPlannerCode(get_plant) {
        fetch('<?= base_url() . 'index.php/lines' ?>')
            .then(response => response.json())
            .then(result => {
                var select = document.getElementById("get_planner_code");

                var area_filter = [];

                if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                    area_filter = result.filter(response => response.lines_plant === get_plant);
                }

                select.innerHTML = "";
                area_filter.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.planner + '  -  ' + value.line_name;
                    option.value = value.lines_id;
                    select.appendChild(option);
                })
            }).catch(error => {
                console.log(error)
            })
    }

    function getSupervisorChart() {
        fetch('<?= base_url() . 'index.php/supervisor' ?>')
            .then(response => response.json())
            .then(result => {

                var select = document.getElementById("get_supervisor_chart");
                result.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.name;
                    select.appendChild(option);
                })
            }).catch(error => {
                console.log(error)
            })
    }

    function getSupervisor(get_plant) {
        fetch('<?= base_url() . 'index.php/supervisor' ?>')
            .then(response => response.json())
            .then(result => {

                var select = document.getElementById("get_supervisor");

                var area_filter = [];

                if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                    area_filter = result.filter(response => response.supervisor_plant === get_plant);
                }

                select.innerHTML = "";
                area_filter.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.name;
                    select.appendChild(option);
                })
            }).catch(error => {
                console.log(error)
            })
    }

    function getCausesCode() {
        fetch('<?= base_url() . 'index.php/causes_code' ?>')
            .then(response => response.json())
            .then(result => {

                var select = document.getElementById("cause_code");

                result.forEach(value => {
                    var option = document.createElement('option');

                    option.innerHTML = value.code + ' ' + '-' + ' ' + value.cause;
                    select.appendChild(option);
                })
            }).catch(error => {
                console.log(error)
            })
    }

    function clearfieldTable() {
        document.getElementById('table_start_date').value = "";
        document.getElementById('table_end_date').value = "";

        loadTableData();
        managementTableAdmin();
    }

    function filterTable() {
        var get_start_date = document.getElementById("table_start_date");
        var get_end_date = document.getElementById("table_end_date");

        start_date = get_start_date.value;
        end_date = get_end_date.value;

        loadTableData(start_date, end_date);
    }

    function filterTableAdmin() {
        var get_start_date = document.getElementById("table_start_date");
        var get_end_date = document.getElementById("table_end_date");

        start_date = get_start_date.value;
        end_date = get_end_date.value;

        managementTableAdmin(start_date, end_date);
    }

    function filterManagement() {
        var get_start_date = document.getElementById("table_start_date");
        var get_end_date = document.getElementById("table_end_date");

        start_date = get_start_date.value;
        end_date = get_end_date.value;

        managementTableAdmin(start_date, end_date);
    }

    function loadTableData(start_date, end_date) {

        if (start_date === undefined && end_date === undefined) {
            start_date = "";
            end_date = "";
        }

        var URL = '<?= base_url() . "index.php/get_data" ?>' + '?';
        URL += 'start_date=' + encodeURIComponent(start_date);
        URL += '&end_date=' + encodeURIComponent(end_date);

        fetch(URL)
            .then(response => response.json())
            .then(result => {

                var arr = [];

                result.map((response) => {
                    arr.push(Object.values(response));
                })

                $('#table_id').DataTable({
                    dom: 'Bfrtip',
                    stateSave: true,
                    destroy: true,
                    data: arr,
                    order: [
                        [0, 'desc']
                    ],
                    buttons: [
                        'copy', 'csv', 'excel', 'print'
                    ],
                    responsive: true,
                    columns: [{
                            title: 'ID',
                            data: 0
                        },
                        {
                            title: 'Planta',
                            data: 1
                        },
                        {
                            title: 'Supervisor',
                            data: 2
                        },
                        {
                            title: 'Planner code',
                            data: 13
                        },
                        {
                            title: 'Fecha',
                            data: 4
                        },
                        {
                            title: 'Info. adicional',
                            data: 5
                        },
                        {
                            title: 'Código de causa',
                            data: 19
                        },
                        {
                            title: 'Máquina',
                            data: 7
                        },
                        {
                            title: 'No. Parte',
                            data: 8
                        },
                        {
                            title: 'Tiempo (Min)',
                            data: 9
                        },
                        {
                            title: 'Tiempo (Hrs)',
                            data: 10
                        },
                        {
                            title: 'Categoria',
                            data: 21
                        },
                        {
                            title: 'Causa',
                            data: 22
                        },
                        {
                            title: 'Semana',
                            data: 23
                        },
                    ],
                });
            });
    }

    function managementTable(start_date, end_date) {

        if (start_date === undefined && end_date === undefined) {
            start_date = "";
            end_date = "";
        }

        var URL = '<?= base_url() . "index.php/get_data" ?>' + '?';
        URL += 'start_date=' + encodeURIComponent(start_date);
        URL += '&end_date=' + encodeURIComponent(end_date);

        fetch(URL)
            .then(response => response.json())
            .then(result => {

                var arr = [];

                result.map((response) => {
                    arr.push(Object.values(response));
                })

                $(document).ready(function() {
                    $('#management_table').DataTable({
                        data: arr,
                        destroy: true,
                        order: [
                            [0, 'desc']
                        ],
                        responsive: true,
                        columns: [{
                                title: 'ID',
                                data: 0
                            },
                            {
                                title: 'Planta',
                                data: 1
                            },
                            {
                                title: 'Supervisor',
                                data: 2
                            },
                            {
                                title: 'Planner code',
                                data: 13
                            },
                            {
                                title: 'Fecha',
                                data: 4
                            },
                            {
                                title: 'Info. adicional',
                                data: 5
                            },
                            {
                                title: 'Código de causa',
                                data: 19
                            },
                            {
                                title: 'Máquina',
                                data: 7
                            },
                            {
                                title: 'No. Parte',
                                data: 8
                            },
                            {
                                title: 'Tiempo (Min)',
                                data: 9
                            },
                            {
                                title: 'Tiempo (Hrs)',
                                data: 10
                            },
                            {
                                title: 'Acciones',
                                className: "dt-center editor-delete",
                                render: function(data, type, row) {
                                    //return '<div class="d-flex"><a type="button" onclick="editInefficiency(this);" href="<?= base_url() . 'index.php/inefficiency/edit/' ?>' + row[0] + '" class="btn btn-warning text-white mx-1" id="' + row[0] + '"><span class="fa fa-edit" /></a> <button type="button" onclick="deleteInefficiency(this);" class="btn btn-danger delete" id="' + row[0] + '"><span class="fa fa-trash" /></button></div>';
                                    return '<div class="d-flex"><a type="button" onclick="editInefficiency(this);" href="<?= base_url() . 'index.php/inefficiency/edit/' ?>' + row[0] + '" class="btn btn-warning text-white mx-1" id="' + row[0] + '"><span class="fa fa-edit" /></a>';
                                },
                                orderable: false
                            }
                        ],
                    });
                });
            });
    }

    function managementTableAdmin(start_date, end_date) {
        if (start_date === undefined && end_date === undefined) {
            start_date = "";
            end_date = "";
        }

        var URL = '<?= base_url() . "index.php/get_data" ?>' + '?';
        URL += 'start_date=' + encodeURIComponent(start_date);
        URL += '&end_date=' + encodeURIComponent(end_date);

        fetch(URL)
            .then(response => response.json())
            .then(result => {
                var arr = [];

                result.map((response) => {
                    arr.push(Object.values(response));
                })

                $(document).ready(function() {
                    $('#management_table_admin').DataTable({
                        data: arr,
                        destroy: true,
                        order: [
                            [0, 'desc']
                        ],
                        responsive: true,
                        columns: [{
                                title: 'ID',
                                data: 0
                            },
                            {
                                title: 'Planta',
                                data: 1
                            },
                            {
                                title: 'Supervisor',
                                data: 2
                            },
                            {
                                title: 'Planner code',
                                data: 13
                            },
                            {
                                title: 'Fecha',
                                data: 4
                            },
                            {
                                title: 'Info. adicional',
                                data: 5
                            },
                            {
                                title: 'Código de causa',
                                data: 19
                            },
                            {
                                title: 'Máquina',
                                data: 7
                            },
                            {
                                title: 'No. Parte',
                                data: 8
                            },
                            {
                                title: 'Tiempo (Min)',
                                data: 9
                            },
                            {
                                title: 'Tiempo (Hrs)',
                                data: 10
                            },
                            {
                                title: 'Acciones',
                                className: "dt-center editor-delete",
                                render: function(data, type, row) {
                                    return '<div class="d-flex"><a type="button" onclick="editInefficiency(this);" href="<?= base_url() . 'index.php/inefficiency/edit/' ?>' + row[0] + '" class="btn btn-warning text-white mx-1" id="' + row[0] + '"><span class="fa fa-edit" /></a> <button type="button" onclick="deleteInefficiency(this);" class="btn btn-danger delete" id="' + row[0] + '"><span class="fa fa-trash" /></button></div>';
                                },
                                orderable: false
                            }
                        ],
                    });
                });
            });
    }

    function managementTableCause() {
        fetch('<?= base_url() . 'index.php/causes_code' ?>')
            .then(response => response.json())
            .then(result => {

                var arr = [];

                result.map((response) => {
                    arr.push(Object.values(response));
                })

                $(document).ready(function() {
                    $('#cause_table').DataTable({
                        data: arr,
                        responsive: true,
                        order: [
                            [0, 'desc']
                        ],
                        columns: [{
                                title: 'ID'
                            },
                            {
                                title: 'Código'
                            },
                            {
                                title: 'Departamento'
                            },
                            {
                                title: 'Categoría'
                            },
                            {
                                title: 'Causa'
                            },
                            {
                                className: "dt-center editor-delete",
                                render: function(data, type, row) {
                                    return '<button type="button" onclick="deleteCause(this);" class="btn btn-danger delete" id="' + row[0] + '"><span class="fa fa-trash" /></button>';
                                },
                                orderable: false
                            }
                        ],
                    });
                });
            });
    }

    var id_lines = [];

    function managementTableArea() {
        fetch('<?= base_url() . 'index.php/lines' ?>')
            .then(response => response.json())
            .then(result => {

                const get_id_line = document.getElementById('btn-trash');
                var arr = [];

                result.map((response, index) => {
                    id_lines.push(response.id);
                    arr.push(Object.values(response));
                })

                $(document).ready(function(index) {
                    $('#area_table').DataTable({
                        data: arr,
                        responsive: true,
                        order: [
                            [0, 'desc']
                        ],
                        columns: [{
                                title: 'ID'
                            },
                            {
                                title: 'Areas'
                            },
                            {
                                title: 'Planner Code'
                            },
                            {
                                title: 'Planta'
                            },
                            {
                                className: "dt-center editor-delete",
                                render: function(data, type, row) {
                                    return '<button type="button" onclick="deleteLine(this);" class="btn btn-danger delete" id="' + row[0] + '"><span class="fa fa-trash" /></button>';
                                },
                                orderable: false
                            }
                        ],
                    });
                });
            });
    }

    function deleteLine(element) {
        Swal.fire({
            title: 'Estás seguro de eliminar el area?',
            text: "No podrás revertir este cambio",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('<?= base_url() . 'index.php/lines/delete/' ?>' + element.id + '')
                    .then(result => {
                        Swal.fire(
                            'Eliminado!',
                            'El area se ha eliminado correctamente',
                            'success'

                        ).then((result) => {
                            window.location.reload(true);
                        })
                    });
            }
        }).catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal!',
            })
        });
    }

    function deleteCause(element) {
        Swal.fire({
            title: 'Estás seguro de eliminar la causa?',
            text: "No podrás revertir este cambio",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('<?= base_url() . 'index.php/causes_code/delete/' ?>' + element.id + '').then(result => {
                    Swal.fire(
                        'Eliminado!',
                        'La causa se ha eliminado correctamente',
                        'success'

                    ).then((result) => {
                        window.location.reload(true);
                    })
                });
            }
        }).catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal!',
            })
        });
    }

    function deleteInefficiency(element) {
        Swal.fire({
            title: 'Estás seguro de eliminar esta ineficiencia',
            text: "No podrás revertir este cambio",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('<?= base_url() . 'index.php/inefficiency/delete/' ?>' + element.id + '').then(result => {
                    Swal.fire(
                        'Eliminado!',
                        'La ineficiencia se ha eliminado correctamente',
                        'success'

                    ).then((result) => {
                        window.location.reload(true);
                    })
                });
            }
        }).catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal!',
            })
        });
    }

    $("#get_planner_code").change(function() {
        var selectedOptions = [];
        $('#get_planner_code').each(function() {
            var value = $(this).val();

            if ($.trim(value)) {
                selectedOptions.push(value);
            }
        });
        var str;
        str = selectedOptions.join(',');
        $('#planner_codes').val(str);
    });

    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    var month_and_year = year + "-" + month;

    // get weekday
    startDate = new Date(date.getFullYear(), 0, 1);
    var days = Math.floor((date - startDate) /
        (24 * 60 * 60 * 1000));

    var weekNumber = Math.ceil(days / 7);

    $(document).ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
        document.getElementById("date_register").value = today;

        //document.getElementById("date_month").value = month_and_year;

        //var get_text_week = document.getElementById("get_week_text");
        //var text = document.createTextNode("Semana número: " + weekNumber);
        //get_text_week.appendChild(text);
    });

    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });
    });

    function clearfield() {
        document.getElementById('chart_plant').value = "";
        document.getElementById('date_week').value = "";
        document.getElementById('date_month').value = "";
        document.getElementById('planner_chart').value = "";
        document.getElementById('get_supervisor_chart').value = "";

        getChartData();
    }

    function buttonChartFilter() {
        var get_plant = document.getElementById('chart_plant');
        var get_week_date = document.getElementById('date_week');
        var get_month_date = document.getElementById('date_month');
        var get_supervisor = document.getElementById('get_supervisor_chart');
        var get_planner_code = document.getElementById('planner_chart');

        var plant = get_plant.value;
        var week = get_week_date.value;
        var month = get_month_date.value;
        var supervisor = get_supervisor.value;
        var planner_code = get_planner_code.value;
        var new_value_week = week.replace('-W', '');

        getChartData(plant, supervisor, month, new_value_week, planner_code);
    }

    function getChartData(plant, supervisor, month, new_value_week, planner_code) {

        if (plant === undefined && supervisor === undefined && month === undefined && new_value_week === undefined) {
            supervisor = "";
            plant = "";
            month = "";
            planner_code = "";
            new_value_week = "";
        }

        var URL = '<?= base_url() . "index.php/get_data_week" ?>' + '?';
        URL += 'plant=' + encodeURIComponent(plant);
        URL += '&week=' + encodeURIComponent(new_value_week);
        URL += '&month=' + encodeURIComponent(month);
        URL += '&planner_code=' + encodeURIComponent(planner_code);
        URL += '&supervisor=' + encodeURIComponent(supervisor);

        fetch(URL)
            .then(response => response.json())
            .then(result => {
                //variables
                var myChart;
                var arr_qty = [];
                var arr_cause = [];
                var arr_accum = [];
                var arr_plant = [];
                var total_frecuencia = 0;
                var frecuencia_acumulada = 0;
                var frecuencia_individual = 0;
                var arr_frecuencia_individual = [];

                //Crear arreglos con data
                result.map((response) => {
                    arr_cause.push(response.cause);
                    arr_qty.push(response.time_hour);
                });

                //sumar total de time_hour
                for (var i = 0; i < arr_qty.length; i++) {
                    total_frecuencia += Number(arr_qty[i]);
                }

                //operaciones para grafica
                for (var i = 0; i < arr_qty.length; i++) {
                    frecuencia_individual = arr_qty[i] * 100 / total_frecuencia;
                    arr_frecuencia_individual.push(frecuencia_individual);
                    frecuencia_acumulada += frecuencia_individual;
                    arr_accum.push(frecuencia_acumulada);
                }

                //grafica
                var ctx = document.getElementById('myChart').getContext('2d');
                let chartStatus = Chart.getChart("myChart");
                if (chartStatus != undefined) {
                    chartStatus.destroy();
                }

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: arr_cause,
                        datasets: [{
                            label: "ACCUM",
                            type: "line",
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            bordcerWidth: 2,
                            fill: false,
                            data: arr_accum,
                            yAxisID: 'y1',
                        }, {
                            label: "QTY",
                            type: "bar",
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: true,
                            data: arr_qty,
                            yAxisID: 'y',
                        }],
                    },
                    options: {
                        responsive: true,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        stacked: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Semana: ' + weekNumber + ' Acumulado :' + total_frecuencia.toFixed(2),
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                ticks: {
                                    beginAtZero: true,
                                    color: 'rgba(54, 162, 235, 1)'
                                },
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                ticks: {
                                    beginAtZero: true,
                                    color: 'rgba(255, 99, 132, 1)'
                                },
                                grid: {
                                    drawOnChartArea: false,
                                },
                            },
                        },
                    },
                })
            })
    }

    managementTableAdmin();
    managementTableCause();
    managementTableArea();
    getSupervisorChart();
    managementTable();
    getPlantsChart();
    loadTableData();
    getChartData();
    getPlants();
</script>
</body>

</html>
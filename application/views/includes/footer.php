</main>
<!-- Footer -->
<footer class="footer mt-auto py-3 shadow border-top" style="background-color: #00468A;">
    <div class="container">
        <span class="text-white fw-bold fs-5 d-flex justify-content-center">© 2022 MARTECH MEDICAL PRODUCTS.</span>
    </div>
</footer>

<!-- Scripts -->
<script src="<?php echo  base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/DataTables-1.12.0/js/jquery.dataTables.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
<script src="<?php echo  base_url() ?>assets/datatables/Buttons-2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    function getPlants() {
        axios.get('<?= base_url() . 'index.php/plants' ?>').then(result => {

            var select = document.getElementById("get_plants");

            result.data.forEach(value => {
                var option = document.createElement('option');

                option.innerHTML = value.name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getData(plant) {
        if (plant === 'planta 1' || plant === 'planta 2' || plant === 'planta 3') {
            getLines(plant);
            getSupervisor(plant);
            getPlannerCode(plant);
        }
    }

    function getLines(get_plant) {
        axios.get('<?= base_url() . 'index.php/lines' ?>').then(result => {
            var select = document.getElementById("get_lines");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                var option = document.createElement('option');

                option.innerHTML = value.line_name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getPlannerCode(get_plant) {
        axios.get('<?= base_url() . 'index.php/lines' ?>').then(result => {

            var select = document.getElementById("get_planner_code");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                var option = document.createElement('option');

                option.innerHTML = value.planner;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getSupervisor(get_plant) {
        axios.get('<?= base_url() . 'index.php/supervisor' ?>').then(result => {

            var select = document.getElementById("get_supervisor");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                var option = document.createElement('option');

                option.innerHTML = value.name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getCausesCode() {
        axios.get('<?= base_url() . 'index.php/causes_code' ?>').then(result => {

            var select = document.getElementById("cause_code");

            result.data.forEach(value => {
                var option = document.createElement('option');

                option.style = "font-size: 1rem";
                option.innerHTML = value.code + ' ' + '-' + ' ' + value.cause;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function loadTableData() {
        axios.get('<?= base_url() . 'index.php/get_data' ?>').then(result => {

            var arr = [];

            result.data.map((response) => {
                arr.push(Object.values(response));
            })

            $(document).ready(function() {
                $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                    $(".alert").slideUp(500);
                });

                $('#table_id').DataTable({
                    data: arr,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'print'
                    ],
                    responsive: true,
                    columns: [{
                            title: 'ID'
                        },
                        {
                            title: 'Planta'
                        },
                        {
                            title: 'Area'
                        },
                        {
                            title: 'Supervisor'
                        },
                        {
                            title: 'Planner code'
                        },
                        {
                            title: 'Fecha'
                        },
                        {
                            title: 'Info. adicional'
                        },
                        {
                            title: 'Código de causa'
                        },
                        {
                            title: 'Máquina'
                        },
                        {
                            title: 'No. Parte'
                        },
                        {
                            title: 'Tiempo (Min)'
                        },
                        {
                            title: 'Tiempo (Hrs)'
                        },
                    ],
                });
            });
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

    loadTableData();
    getCausesCode();
    getPlants();
</script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>

</html>
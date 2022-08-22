</main>
<!-- Footer -->
<footer class="footer mt-auto py-3 bg-white shadow border-top">
    <div class="container">
        <span class="text-muted">© 2022 MARTECH MEDICAL PRODUCTS.</span>
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
<script>
    function getPlants() {
        axios.get(<?= base_url().'index.php/plants'?>).then(result => {

            const select = document.getElementById("get_plants");

            result.data.forEach(value => {
                const option = document.createElement('option');

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
        axios.get(<?base_url().'index.php/lines'?>).then(result => {
            const select = document.getElementById("get_lines");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                const option = document.createElement('option');

                option.innerHTML = value.line_name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getPlannerCode(get_plant) {
        axios.get(<?= base_url().'index.php/lines'?>).then(result => {

            const select = document.getElementById("get_planner_code");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                const option = document.createElement('option');

                option.innerHTML = value.planner;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getSupervisor(get_plant) {
        axios.get(<?= base_url().'index.php/supervisor'?>).then(result => {

            const select = document.getElementById("get_supervisor");

            var area_filter = [];

            if (get_plant === 'planta 1' || get_plant === 'planta 2' || get_plant === 'planta 3') {
                area_filter = result.data.filter(response => response.plant === get_plant);
            }

            select.innerHTML = "";
            area_filter.forEach(value => {
                const option = document.createElement('option');

                option.innerHTML = value.name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function getCausesCode() {
        axios.get(<?= base_url().'index.php/causes_code'?>).then(result => {

            const select = document.getElementById("cause_code");

            result.data.forEach(value => {
                const option = document.createElement('option');

                option.style = "font-size: 1rem";
                option.innerHTML = value.code + ' ' + '-' + ' ' + value.cause;
                select.appendChild(option);
            })
        }).catch(error => {
            console.error(error)
        })
    }

    function loadTableData() {
        axios.get(<?= base_url().'index.php/get_data'?>).then(result => {

            var arr = [];

            result.data.map((response) => {
                arr.push(Object.values(response));
            })

            $(document).ready(function() {
                $('#table_id').DataTable({
                    data: arr,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
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
                            title: 'Descripción'
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

    $(document).ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    });

    $("#get_planner_code").change(function() {
        var selectedOptions = [];
        $('#get_planner_code').each(function() {
            var value = $(this).val();

            console.log(value);
            if ($.trim(value)) {
                selectedOptions.push(value);
            }
        });
        const str = selectedOptions.join(',');
        $('#planner_codes').val(str);
    });



    loadTableData();
    getCausesCode();
    getPlants();
</script>

</body>

</html>
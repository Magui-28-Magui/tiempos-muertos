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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="<?php echo  base_url() ?>assets/js/charts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            console.log(error)
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
            console.log(error)
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

                option.innerHTML = value.planner + '  -  ' + value.line_name;
                select.appendChild(option);
            })
        }).catch(error => {
            console.log(error)
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
            console.log(error)
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
            console.log(error)
        })
    }

    function loadTableData() {
        axios.get('<?= base_url() . 'index.php/get_data' ?>').then(result => {

            var arr = [];

            result.data.map((response) => {
                arr.push(Object.values(response));
            })

            $(document).ready(function() {
                $('#table_id').DataTable({
                    data: arr,
                    order: [
                        [0, 'desc']
                    ],
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

    function managementTable() {
        axios.get('<?= base_url() . 'index.php/get_data' ?>').then(result => {

            var arr = [];

            result.data.map((response) => {
                arr.push(Object.values(response));
            })

            $(document).ready(function() {
                $('#management_table').DataTable({
                    data: arr,
                    order: [
                        [0, 'desc']
                    ],
                    responsive: true,
                    columns: [{
                            title: 'ID'
                        },
                        {
                            title: 'Planta'
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
                        {
                            title: 'Acciones',
                            className: "dt-center editor-delete",
                            render: function(data, type, row) {
                                return '<div class="d-flex"><a type="button" onclick="editInefficiency(this);" href="<?=base_url().'index.php/inefficiency/edit/'?>' + row[0] + '" class="btn btn-warning text-white mx-1" id="' + row[0] + '"><span class="fa fa-edit" /></a> <button type="button" onclick="deleteInefficiency(this);" class="btn btn-danger delete" id="' + row[0] + '"><span class="fa fa-trash" /></button></div>';
                            },
                            orderable: false
                        }
                    ],
                });
            });
        });
    }
    function editInefficiency(element){
        axios.get('<?= base_url() . 'index.php/inefficiency/edit/' ?>' + element.id + '')(result => {
            console.log(result);
        });
    }

    function managementTableCause() {
        axios.get('<?= base_url() . 'index.php/causes_code' ?>').then(result => {

            var arr = [];

            result.data.map((response) => {
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
        axios.get('<?= base_url() . 'index.php/lines' ?>').then(result => {

            const get_id_line = document.getElementById('btn-trash');
            var arr = [];

            result.data.map((response, index) => {
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
                axios.delete('<?= base_url() . 'index.php/lines/delete/' ?>' + element.id + '').then(result => {
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
                axios.delete('<?= base_url() . 'index.php/causes_code/delete/' ?>' + element.id + '').then(result => {
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
                axios.delete('<?= base_url() . 'index.php/inefficiency/delete/' ?>' + element.id + '').then(result => {
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
    $(document).ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });

        //document.getElementById("date_register").value = today;
    })

    managementTableCause();
    managementTableArea();
    managementTable();
    loadTableData();
    getCausesCode();
    getPlants();
</script>
</body>

</html>
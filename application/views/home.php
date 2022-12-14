<div class="container my-5">
    <?php if ($this->session->flashdata('success_message') !== NULL) : ?>
        <div class="alert alert-success" id="alert_success" role="alert">
            <div class="fw-bold"><?php echo $this->session->flashdata('success_message'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error_message') !== NULL) : ?>
        <div class="alert alert-danger" id="alert_error" role="alert">
            <div class="fw-bold"><?php echo $this->session->flashdata('error_message'); ?></div>
        </div>
    <?php endif; ?>
    <div class="bg-white shadow p-4">
        <div class="row">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Registro de ineficiencias</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-table-tab" data-bs-toggle="pill" data-bs-target="#pills-table" type="button" role="tab" aria-controls="pills-table" aria-selected="false">Tabla</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-chart-tab" data-bs-toggle="pill" data-bs-target="#pills-chart" type="button" role="tab" aria-controls="pills-chart" aria-selected="false">Gráfica</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php echo form_open('formcontroller/submit'); ?>
                    <?php require_once('register.php') ?>
                    <?php echo form_close() ?>
                </div>
                <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                    <div class="row my-4">
                        <div class="col-md-6">
                            <label for="table_start_date">Fecha inicio</label>
                            <input type="date" id="table_start_date" name="table_start_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="table_end_date">Fecha fin</label>
                            <input type="date" id="table_end_date" name="table_end_date" class="form-control">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
                            <button id="button_clear" class="btn btn-secondary me-md-2" type="button" onclick="clearfieldTable()"><i class="fa-solid fa-eraser mx-1"></i>Borrar Filtrado</button>
                            <button class="btn btn-success" type="button" onclick="filterTable()"><i class="fa-solid fa-filter mx-1"></i>Filtrar</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table display text-center p-0" id="table_id" style="width: 100%;">
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-chart" role="tabpanel" aria-labelledby="pills-chart-tab">
                    <?php require_once('chart.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-dark fw-bold" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="true">
                        <img width="25" src="<?php echo base_url(); ?>assets/img/plus.gif" alt="">
                        Registro</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark fw-bold" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab" aria-controls="table" aria-selected="false">
                        <img width="25" src="<?php echo base_url(); ?>assets/img/list.gif" alt="">
                        Tabla
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark fw-bold" id="chart-tab" data-bs-toggle="tab" data-bs-target="#chart" type="button" role="tab" aria-controls="chart" aria-selected="false">
                        <img width="25" src="<?php echo base_url(); ?>assets/img/chart.gif" alt="">
                        Gráficas
                    </button>
                </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <?php echo form_open('formcontroller/submit'); ?>
                    <?php require_once('register.php') ?>
                    <?php echo form_close() ?>
                </div>
                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <div class="fw-bold text-danger">
                            Para eliminar un registro favor de ponerse en contacto con el departamento de Mejora Continua
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table display text-center p-0" id="table_id" style="width: 100%;">
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                    <?php require_once('chart.php') ?>
                </div>
            </div>
        </div>
    </div>
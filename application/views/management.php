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
                    <a class="nav-link active" href="#listado" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Listado de ineficiencias</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#area" id="pills-area-tab" data-bs-toggle="pill" data-bs-target="#pills-area" type="button" role="tab" aria-controls="pills-area" aria-selected="false">Agregar area</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#causas" id="pills-cause-interruption-tab" data-bs-toggle="pill" data-bs-target="#pills-cause-interruption" type="button" role="tab" aria-controls="pills-cause-interruption" aria-selected="false">Agregar causa de interrupción</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php require_once('home_management.php'); ?>
                </div>
                <div class="tab-pane fade" id="pills-area" role="tabpanel" aria-labelledby="pills-area-tab">
                    <?php echo form_open('managementcontroller/addline'); ?>
                    <?php require_once('lines.php'); ?>
                    <?php echo form_close() ?>
                    <div class="table-responsive">
                        <table class="table display text-center p-0" id="area_table" style="width: 100%;">
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-cause-interruption" role="tabpanel" aria-labelledby="pills-cause-interruption-tab">
                    <?php echo form_open('managementcontroller/addcause'); ?>
                    <?php require_once('cause_interruption.php'); ?>
                    <?php echo form_close() ?>
                    <div class="table-responsive">
                        <table class="table display text-center p-0" id="cause_table" style="width: 100%;">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
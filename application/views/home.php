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
                    <button class="nav-link active text-dark fw-bold" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <img width="20" src="<?php echo base_url(); ?>assets/img/clock.gif" alt="">
                        Registro</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark fw-bold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <img width="20" src="<?php echo base_url(); ?>assets/img/list.gif" alt="">
                        Tabla
                    </button>
                </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <?php echo form_open('formcontroller/submit'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 my-2">
                                <label class="form-label">Planta</label><span class="text-danger"> (*)</span>
                                <select class="form-control" id="get_plants" name="plant" required onchange="getData(this.value, '')">
                                    <option value="">Selecciona una planta</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supervisor</label><span class="text-danger"> (*)</span>
                                <select class="form-control" id="get_supervisor" name="supervisor" required>
                                    <option value="">Selecciona un supervisor</option>
                                </select>
                            </div>
                            <div class="divider"></div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha</label><span class="text-danger"> (*)</span>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Información adicional</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="machine" class="form-label">Máquina</label>
                                <input type="text" class="form-control" id="machine" name="machine">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 my-2">
                                <label class="form-label">Area</label><span class="text-danger"> (*)</span>
                                <select class="form-control" id="get_lines" name="area" required>
                                    <option value="">Selecciona un area</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="planner_code" class="form-label">Planner code</label><span class="text-danger"> (*)</span>
                                <input type="hidden" name="planner_codes" id="planner_codes" />
                                <select class="form-control selectpicker" name="planner_code" multiple id="get_planner_code" onchange="console.log(this.value)">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cause_code" class="form-label">Código de causas</label><span class="text-danger"> (*)</span>
                                <select class="form-control" id="cause_code" name="cause_code" required>
                                    <option value="">Selecciona un código de causa</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Tiempo (Minutos)</label><span class="text-danger"> (*)</span>
                                <input type="number" class="form-control" id="time" name="time" required>
                            </div>
                            <div class="mb-3">
                                <label for="part_number" class="form-label">Número de parte</label>
                                <input type="text" class="form-control" id="part_number" name="part_number">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mt-5">
                                <button class="btn rounded-pill px-4 text-white fw-bold" name="save_form" style="background: #00468A" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table display text-center p-0" id="table_id" style="width: 100%;">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
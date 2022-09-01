<div class="container my-5">
    <div class="bg-white shadow p-4">
        <div class="h1 text-center text-uppercase mt-5 text-warning fw-bold">
            En construcción
        </div>
        <div class="d-flex justify-content-center">
            <img class="my-3" src="<?php echo base_url(); ?>assets/img/road-closure.gif" alt="construct">
        </div>
        <!-- <h3>Editar Ineficiencia</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 my-2">
                        <label class="form-label">Planta</label><span class="text-danger"> (*)</span>
                        <select class="form-control" id="get_plants" name="plant" required>
                            <option value="">Selecciona una planta</option>
                            <?php foreach ($plants as $plant) : ?>
                                <option <?php if ($result['plant'] === $plant['name']) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        } ?> value="<?php echo $plant["id"] ?>"><?php echo $plant["name"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supervisor</label><span class="text-danger"> (*)</span>
                        <select class="form-control" id="get_supervisor" name="supervisor" required>
                            <option value="">Selecciona un supervisor</option>
                            <?php foreach ($supervisor as $response) : ?>
                                <option <?php if ($result['supervisor'] === $response['name']) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        } ?> value="<?php echo $response["id"] ?>"><?php echo $response["name"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="divider"></div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label><span class="text-danger"> (*)</span>
                        <input type="date" class="form-control" id="date_register" name="date" required value="<?php echo $result["date"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Información adicional</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="machine" class="form-label">Máquina</label>
                        <input type="text" class="form-control" id="machine" name="machine" value="<?php echo $result["machine"] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="planner_code" class="form-label">Planner code</label><span class="text-danger"> (*)</span>
                        <input type="hidden" name="planner_codes" id="planner_codes" />
                        <select class="form-control selectpicker" name="planner_code" size="8" multiple id="get_planner_code">
                        <?php foreach ($lines as $response) : ?>
                                <option <?php if ($result['planner_code'] === $response['planner']) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        } ?> value="<?php echo $response["id"] ?>"><?php echo $response["planner"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cause_code" class="form-label">Código de causas</label><span class="text-danger"> (*)</span>
                        <select class="form-control" id="cause_code" name="cause_code" required>
                            <option value="">Selecciona un código de causa</option>
                            <?php foreach ($causes_code as $response) : ?>
                                <option <?php if ($result['cause_code'] === $response['cause']) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        } ?> value="<?php echo $response["id"] ?>"><?php echo $response["cause"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Tiempo (Minutos)</label><span class="text-danger"> (*)</span>
                        <input type="number" class="form-control" id="time" name="time" min="1" pattern="^[0-9]+" required value="<?php echo $result["time"] ?>"> 
                        <div class="mb-3">
                            <label for="part_number" class="form-label">Número de parte</label>
                            <input type="text" class="form-control" id="part_number" name="part_number" value="<?php echo $result["part_number"] ?>">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mt-5">
                            <a class="btn rounded-pill px-4 text-white fw-bold bg-secondary" href="<?= base_url('management') ?>" name="save_form">Cancelar</a>
                            <button class="btn rounded-pill px-4 text-white fw-bold" name="save_form" style="background: #00468A" type="submit">Guardar cambios</button>
                        </div>
                    </div>
                </div>
                                    -->
    </div>
</div>
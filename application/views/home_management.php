<div class="row w-100">
    <h3 class="mb-4">Administrar listado de ineficiencias</h3>
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
            <?php if ($department_id == 1) : ?>
                <button class="btn btn-success" type="button" onclick="filterTableAdmin()"><i class="fa-solid fa-filter mx-1"></i>Filtrar</button>
            <?php else : ?>
                <button class="btn btn-success" type="button" onclick="filterManagement()"><i class="fa-solid fa-filter mx-1"></i>Filtrar</button>
            <?php endif ?>
        </div>
    </div>
    <div class="table-responsive">
        <?php if ($department_id == 1) : ?>
            <table class="table display text-center p-0" id="management_table_admin" style="width: 100%;">
            </table>
        <?php else : ?>
            <table class="table display text-center p-0" id="management_table" style="width: 100%;">
            </table>
        <?php endif ?>
    </div>
</div>
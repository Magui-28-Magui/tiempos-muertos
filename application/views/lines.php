<div class="row w-100">
    <h3 class="mb-4">Areas</h3>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="line_name" class="form-label">Nombre de la celda</label><span class="text-danger"> (*)</span>
            <input type="text" class="form-control" id="line_name" name="line_name" required>
        </div>
        <div class="mb-3">
            <label for="planner" class="form-label">Planner code</label><span class="text-danger"> (*)</span>
            <input type="text" class="form-control" id="planner" name="planner" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Planta</label><span class="text-danger"> (*)</span>
            <select class="form-control" id="get_plants" name="plant" required onchange="getData(this.value, '')">
                <option value="">Selecciona una planta</option>
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex mt-5 justify-content-md-end">
            <button class="btn btn-success" type="submit" name="save_form">Agregar nueva area</button>
        </div>
    </div>
    <hr class="my-4">
</div>
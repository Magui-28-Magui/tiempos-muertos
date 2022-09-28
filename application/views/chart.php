<div class="row">
    <div class="col-md-12">
        <h3 id="get_week_text" class="d-flex justify-content-end fw-bold"></h3>
        <div class="row">
            <div class="col-md-6 mt-3">
                <label class="form-label">Semana</label>
                <input type="week" class="form-control" id="date_week">
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Mes</label>
                <input type="month" class="form-control" id="date_month">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <label class="form-label">Planta</label>
                <select class="form-control" id="chart_plant" name="plant_select">
                    <option value="">Selecciona una planta</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Supervisor</label>
                <select class="form-control" id="get_supervisor_chart" name="supervisor">
                    <option value="">Selecciona un supervisor</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
                    <button class="btn btn-secondary me-md-2" type="button" onclick="clearfield()"><i class="fa-solid fa-eraser mx-1"></i>Borrar Filtrado</button>
                    <button class="btn btn-success" type="button" onclick="buttonChartFilter()"><i class="fa-solid fa-filter mx-1"></i>Filtrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <canvas id="myChart" width="400" height="200"></canvas>
</div>
<!--<div class="h1 text-center text-uppercase mt-5 text-warning fw-bold">
    En construcción
</div>
<div class="d-flex justify-content-center">
    <img class="my-3" src="<?php echo base_url(); ?>assets/img/road-closure.gif" alt="construct">
</div>-->
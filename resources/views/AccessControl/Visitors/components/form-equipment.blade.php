<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-heading mt-2 mb-2">Información Ingreso de Elementos</div>
                <div class="row">
                    <!-- tipo de equipo -->
                    <div class="col-4 mb-3">
                        <label for="equipment_type fw-bold" class="form-label">
                            {{ __('Tipo de equipo:') }} 
                        </label>
                        <select name="equipment_type" id="equipment_type" class="form-select" required>
                            <option value="" selected> {{ __('Seleccione...') }} </option>
                        </select>
                    </div>

                    <!-- marca -->
                    <div class="col-4 mb-3">
                        <label for="mark fw-bold" class="form-label">
                            {{ __('Marca:') }} 
                        </label>
                        <input type="text" name="mark" id="mark" class="form-control" required>
                    </div>

                    <!-- marca -->
                    <div class="col-4 mb-3">
                        <label for="serial fw-bold" class="form-label">
                            {{ __('Serial:') }} 
                        </label>
                        <input type="text" name="serial" id="serial" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="description fw-bold" class="form-label">
                            {{ __('Descripcion:') }} 
                        </label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
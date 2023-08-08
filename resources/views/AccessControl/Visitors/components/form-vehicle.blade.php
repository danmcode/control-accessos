<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-heading mt-2 mb-2">Información Ingreso de Vehiculo</div>
                <div class="row">
                    <!-- tipo de vehiculo -->
                    <div class="col-6 mb-3">
                        <label for="vehicle_type fw-bold" class="form-label">
                            {{ __('Tipo de vehiculo:') }} 
                        </label>
                        <select name="vehicle_type" id="vehicle_type" class="form-select" required>
                            <option value="" selected> {{ __('Seleccione...') }} </option>
                            @foreach( $vehiclestypes as $key => $vehiclestype )
                            <option value="{{ $vehiclestype->id }}"> {{ $vehiclestype->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- marca carro -->
                    <div class="col-6 mb-3">
                        <label for="mark_car fw-bold" class="form-label">
                            {{ __('Marca:') }} 
                        </label>
                        <input type="text" name="mark_car" id="mark_car" class="form-control" required>
                    </div>

                    <!-- marca -->
                    <div class="col-6 mb-3">
                        <label for="Placa fw-bold" class="form-label">
                            {{ __('Placa:') }} 
                        </label>
                        <input type="text" name="Placa" id="Placa" class="form-control" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="color fw-bold" class="form-label">
                            {{ __('Color:') }} 
                        </label>
                        <input type="text" name="color" id="color" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <!-- show when the image is taken -->
                <div id="capturedImageContainer"></div>

                <!-- Show default or when is canceled -->
                <div id="defaultImage">
                    <img src="{{asset('images/default.png')}}">
                </div>

                <!-- Show streaming video to take a photo -->
                <div class="cameraFeed" id="cameraFeed"></div>

                <h2>
                    <label id="labelName_Visitor">
                        Nombre
                    </label>
                    <label id="labelLastName_Visitor">
                        Visitante
                    </label>
                </h2>

                <div class="mt-2">

                    <!-- Show first time, open camera -->
                    <a id="openCameraBtn" class="btn btn-primary">
                        <i class="bi bi-camera"></i>
                        {{ __('Capturar desde cámara') }}
                    </a>

                    <!-- Upload a photo  -->
                    <a id="uploadPhotoBtn" class="btn btn-secondary">
                        <i class="bi bi-upload"></i>
                        {{ __('Subir fotografía') }}
                    </a>

                    <!-- Take a photo only show when the open Camera was pressed -->
                    <a id="captureBtn" class="btn btn-primary captureBtn">
                        <i class="bi bi-camera"></i>
                        {{ __('Tomar fotografia') }}
                    </a>



                    <!-- Cancel a Photo -->
                    <a id="cancelBtn" class="btn btn-danger">
                        <i class="bi bi-x-circle"></i>
                        {{ __('Cancelar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">

                <div class="form-heading mt-2 mb-2">Información básica</div>

                <div class="row">
                    <!-- Identification type -->
                    <div class="col-6 mb-3">
                        <label for="identification_type fw-bold" class="form-label">
                            {{ __('Tipo de identificación:') }} <small> * </small>
                        </label>
                        <select name="identification_type" id="identification_type" class="form-select" required>
                            <option value="" selected> {{ __('Seleccione...') }} </option>
                            @foreach( $identificationTypes as $key => $identificationType )
                            <option value="{{ $identificationType->id }}"> {{ $identificationType->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El tipo de identificación es requerido') }}</strong>
                        </span>
                    </div>

                    <!-- identification -->
                    <div class="col-6 mb-3">
                        <label for="identification fw-bold" class="form-label">
                            {{ __('Identificación:') }} <small> * </small>
                        </label>
                        <input type="text" name="identification" id="identification" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('La identificación es requerida') }}</strong>
                        </span>
                    </div>


                    <!-- name -->
                    <div class="col-4 mb-3">
                        <label for="name_Visitor fw-bold" class="form-label">
                            {{ __('Nombres:') }} <small> * </small>
                        </label>
                        <input type="text" name="name_Visitor" id="name_Visitor" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('Los nombres son requeridos') }}</strong>
                        </span>
                    </div>

                    <!-- last name -->
                    <div class="col-4 mb-3">
                        <label for="lastname_Visitor fw-bold" class="form-label">
                            {{ __('Apellidos:') }} <small> * </small>
                        </label>
                        <input type="text" name="lastname_Visitor" id="lastname_Visitor" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('Los apellidos son requeridos') }}</strong>
                        </span>
                    </div>

                    <!-- type visitors -->
                    <div class="col-4 mb-3">
                        <label for="typeVisitor fw-bold" class="form-label">
                            {{ __('Tipo de visitante:') }} <small> * </small>
                        </label>
                        <select name="typeVisitor" id="typeVisitor" class="form-select" required>
                            <option value="" selected> {{ __('Seleccione...') }} </option>
                            @foreach( $visitorTypes as $key => $visitorType )
                            <option value="{{ $visitorType->id}}"> {{ $visitorType->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('Los apellidos son requeridos') }}</strong>
                        </span>
                    </div>

                    <!-- photo info -->
                    <div class="col-4 mb-3">
                        <input type="hidden" name="photoDataInput" id="photoDataInput" class="form-control">
                    </div>

                    <!-- photo info -->
                    <div class="col-4 mb-3">
                        <input type="hidden" value={{$id}} name="id-creator" id="id-creator" class="form-control">
                    </div>

                    <hr>
                    <div class="form-heading mt-2 mb-2">Información Laboral</div>

                    <!-- Company -->
                    <div class="col-12 mb-3">
                        <label for="company_id fw-bold" class="form-label">
                            {{ __('Empresa:') }} <small> * </small>
                        </label>
                        <input type="text" name="company" id="company" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('Los empresa es requerida') }}</strong>
                        </span>
                    </div>

                    <!-- Area -->
                    <div class="col-6 mb-3" id="block_arl">
                        <label for="area_id fw-bold" class="form-label">
                            {{ __('ARL:') }} <small> * </small>
                        </label>
                        <select name="arl" id="arl" class="form-select" required>
                            <option value="" selected> {{ __('Seleccione...') }} </option>
                            @foreach( $arls as $key => $arls )
                            <option value="{{ $arls->id }}"> {{ $arls->name }} </option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El área es requerida') }}</strong>
                        </span>
                    </div>

                    <div class="col-6 mb-3" id="block_date_arl">
                        <label for="date_arl fw-bold" class="form-label">
                            {{ __('Fecha de vencimiento del ARL:') }} <small> * </small>
                        </label>
                        <input type="date" name="date_arl" id="date_arl" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('La fecha es requerida') }}</strong>
                        </span>
                    </div>

                    <div class="col-12 mb-3" id="block_remission">
                        <label for="remission fw-bold" class="form-label">
                            {{ __('Remision:') }} 
                        </label>
                        <textarea name="remission" id="remission" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
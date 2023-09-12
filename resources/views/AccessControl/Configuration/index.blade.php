@extends('layouts.app')
@section('title', 'Configuración')
@section('content')
<div class="pagetitle">
    <h1>Configuración</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Configuración</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">

    <div class="configuration-title">
        <span> Hora de ingreso y Salida </span>
        <hr>
    </div>

    <div class="card">

        <div class="card-body pt-3">
            <form class="row gy-2 gx-3 align-items-center">
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInput">Name</label>
                    <input type="text" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                    <select class="form-select" id="autoSizingSelect">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="configuration-title">
        <span> Configuración de Correo Eléctronico </span>
        <hr>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2"
                        placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <div class="configuration-title">
        <span> Listas Desplegables </span>
        <hr>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" id="myTabs">

                <li class="nav-item">
                    <a class="nav-link" id="configuration-company-tab" data-bs-toggle="tab"
                        href="#configuration-company" role="tab" aria-controls="configuration-company"
                        aria-selected="true">Empresas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-area-tab" data-bs-toggle="tab" href="#configuration-area"
                        role="tab" aria-controls="configuration-area" aria-selected="false">Áreas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-cargos-tab" data-bs-toggle="tab" href="#configuration-cargos"
                        role="tab" aria-controls="configuration-cargos" aria-selected="false">Cargos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-locations-tab" data-bs-toggle="tab"
                        href="#configuration-locations" role="tab" aria-controls="configuration-locations"
                        aria-selected="false">Ubicaciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-identifications-type-tab" data-bs-toggle="tab"
                        href="#configuration-identifications-type" role="tab"
                        aria-controls="configuration-identifications-type" aria-selected="false">Tipos de
                        identificación</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-visitors-types-tab" data-bs-toggle="tab"
                        href="#configuration-visitors-types" role="tab" aria-controls="configuration-visitors-types"
                        aria-selected="false">Tipos de visitante</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-equipment-types-tab" data-bs-toggle="tab"
                        href="#configuration-equipment-types" role="tab" aria-controls="configuration-equipment-types"
                        aria-selected="false">Tipos de equipo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-vehicle-types-tab" data-bs-toggle="tab"
                        href="#configuration-vehicle-types" role="tab" aria-controls="configuration-vehicle-types"
                        aria-selected="false">Tipos de Vehiculo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-arl-tab" data-bs-toggle="tab" href="#configuration-arl"
                        role="tab" aria-controls="configuration-arl" aria-selected="false">ARL</a>
                </li>


            </ul>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="tab-content" id="myTabContent">
                <!-- Companies -->
                <div class="tab-pane fade p-3" id="configuration-company" role="tabpanel"
                    aria-labelledby="configuration-company-tab">
                    @include('AccessControl.Configuration.components.create-show-companies')
                </div>

                <!-- Areas -->
                <div class="tab-pane fade p-3" id="configuration-area" role="tabpanel"
                    aria-labelledby="configuration-area-tab">
                    <!-- Contenido de la Tab 2 -->
                    @include('AccessControl.Configuration.components.create-show-areas-companies')
                </div>

                <!-- in charge -->
                <div class="tab-pane fade p-3" id="configuration-cargos" role="tabpanel"
                    aria-labelledby="configuration-cargos-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-job-titles')
                </div>

                <!-- Locations -->
                <div class="tab-pane fade p-3" id="configuration-locations" role="tabpanel"
                    aria-labelledby="configuration-locations-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-locations')
                </div>

                <!-- identifications type -->
                <div class="tab-pane fade p-3" id="configuration-identifications-type" role="tabpanel"
                    aria-labelledby="configuration-identifications-type-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-identification-type')
                </div>

                <!-- visitors types -->
                <div class="tab-pane fade p-3" id="configuration-visitors-types" role="tabpanel"
                    aria-labelledby="configuration-visitors-types-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-visitors-type')
                </div>

                <!-- equipament types -->
                <div class="tab-pane fade p-3" id="configuration-equipment-types" role="tabpanel"
                    aria-labelledby="configuration-equipment-types-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-equipments-type')
                </div>

                <!-- vehicle types -->
                <div class="tab-pane fade p-3" id="configuration-vehicle-types" role="tabpanel"
                    aria-labelledby="configuration-vehicle-types-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-vehicles-type')
                </div>

                <!-- arl -->
                <div class="tab-pane fade p-3" id="configuration-arl" role="tabpanel"
                    aria-labelledby="configuration-arl-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-arl')
                </div>


            </div>
            <!-- End Bordered Tabs -->
        </div>
    </div>
</section>
<!-- Modals -->
<!-- Modal update company -->
<div class="modal fade" id="modalUpdateCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-company-modal')
</div>

<!-- Modal update Area -->
<div class="modal fade" id="modalUpdateArea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-area-modal')
</div>

<!-- Modal update Job Title -->
<div class="modal fade" id="modalUpdateJobTitle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-job-title-modal')
</div>



@endsection

@section('scripts')
<script>
/**
 * Manage the tabs
 */
document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('#myTabs .nav-link');

    tabs.forEach(function(tab, index) {
        tab.addEventListener('click', function() {
            localStorage.setItem('lastTab', index.toString());
        });

        var lastTab = localStorage.getItem('lastTab');
        if (lastTab !== null && parseInt(lastTab) === index) {
            tab.classList.add('active');
            document.querySelector(tab.getAttribute('href')).classList.add('show', 'active');
        }
    });
});
</script>

<script src="js/modals/updateCompanyModal.js"></script>
<script src="js/modals/updateAreaModal.js"></script>
<script src="js/modals/updateJobTitleModal.js"></script>
<script src="js/modals/updateLocationModal.js"></script>
<script src="js/modals/updateIdentificationTypeModal.js"></script>
<script src="js/modals/updateArlModal.js"></script>
<script src="js/modals/updateTypeVisitorModal.js"></script>
<script src="js/modals/updateVehiclesTypesModal.js"></script>
<script src="js/modals/updateEquipmentsTypesModal.js"></script>
@endsection
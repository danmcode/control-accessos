@extends('layouts.app')
@section('title', 'Visitantes')
@section('content')

<div class="pagetitle">
    <h1> Registro de visitantes </h1>
    </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Registro de Visitantes</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">

    <div class="row">
        <div class="col-xl-3">
            <div class="card">

                <div class="card-body profile-card pt-4 card-regular-visitors">

                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="POST" action="#">
                            <input type="text" name="query" placeholder="Buscar" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <!-- End Search Bar -->

                    <div class="form-heading mt-2 mb-2">Visitantes frecuentes</div>

                    <!-- visitors-card -->
                    <div class="frequent-visitors-card">
                        <div class="row ">

                            <div class="col-4 frequent-visitors-card-image">
                                <img src="{{ asset('/images/messages-3.jpg') }}">
                            </div>

                            <div class="col-8">
                                <div class="card-visitor-title">
                                    DAVID EDUARDO NELSON MULDON
                                </div>

                                <div>
                                    <i class="bi bi-person-vcard-fill"></i> <span> 1141237956 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- end visitors-card -->

                    <!-- visitors-card -->
                    <div class="frequent-visitors-card">
                        <div class="row ">

                            <div class="col-4 frequent-visitors-card-image">
                                <img src="{{ asset('/images/pisa.png') }}">
                            </div>

                            <div class="col-8">
                                <div class="card-visitor-title">
                                    ROBERTO CARLOS HUDSON NELSON
                                </div>

                                <div>
                                    <i class="bi bi-person-vcard-fill"></i> <span> 1141877956 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- end visitors-card -->

                    <!-- visitors-card -->
                    <div class="frequent-visitors-card">
                        <div class="row ">

                            <div class="col-4 frequent-visitors-card-image">
                                <img src="{{ asset('/images/messages-2.jpg') }}">
                            </div>

                            <div class="col-8">
                                <div class="card-visitor-title">
                                    LOREM MARIA HUDSON NELSON
                                </div>

                                <div>
                                    <i class="bi bi-person-vcard-fill"></i> <span> 1141877956 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- end visitors-card -->

                    <!-- visitors-card -->
                    <div class="frequent-visitors-card">
                        <div class="row ">

                            <div class="col-4 frequent-visitors-card-image">
                                <img src="{{ asset('/images/messages-1.jpg') }}">
                            </div>

                            <div class="col-8">
                                <div class="card-visitor-title">
                                    ROBERTO CARLOS HUDSON NELSON
                                </div>

                                <div>
                                    <i class="bi bi-person-vcard-fill"></i> <span> 1141877956 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- end visitors-card -->
                </div>
            </div>
        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('crear-visitante.store') }}" method="POST" class="needs-validation"
                        novalidate>
                        @csrf
                        <h5>
                            <i class="bi bi-person card-title"></i>
                            @foreach ($collaborator as $collaborato)
                            <span class="card-title">{{$collaborato->users->name.'
                                '.$collaborato->users->last_name}}</span>
                            
                            <i class="bi bi-geo-alt"></i>
                            {{$collaborato->location->name }}
                            @endforeach
                        </h5>
                        <hr>

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" id="tabs-visitors">

                            <li class="nav-item">
                                <a class="nav-link" id="visitor-tab" data-bs-toggle="tab" href="#visitor" role="tab"
                                    aria-controls="visitor" aria-selected="true">
                                    <i class="bi bi-people"></i> ¿Quien ingresa?
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="equipment-tab" data-bs-toggle="tab" href="#equipment" role="tab"
                                    aria-controls="equipment" aria-selected="false">
                                    <i class="bi bi-laptop"></i> ¿Ingresa Equipo?
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="vehicle-tab" data-bs-toggle="tab" href="#vehicle" role="tab"
                                    aria-controls="vehicle" aria-selected="false">
                                    <i class="bi bi-car-front"></i> ¿Ingresa Vehículo?
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="observations-tab" data-bs-toggle="tab" href="#observations"
                                    role="tab" aria-controls="observations" aria-selected="false">
                                    <i class="bi bi-exclamation-circle"></i> Observaciones
                                </a>
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
                            <!-- visitor -->
                            <div class="tab-pane fade p-3" id="visitor" role="tabpanel" aria-labelledby="visitor-tab">
                                @include('AccessControl.Visitors.components.form-visitor')
                            </div>

                            <!-- equipment -->
                            <div class="tab-pane fade p-3" id="equipment" role="tabpanel"
                                aria-labelledby="equipment-tab">
                                <!-- Contenido de la Tab 2 -->
                                @include('AccessControl.Visitors.components.form-equipment')
                            </div>

                            <!-- Vechiles -->
                            <div class="tab-pane fade p-3" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                                <!-- Contenido de la Tab 3 -->
                                @include('AccessControl.Visitors.components.form-vehicle')
                            </div>

                            <!-- Observations -->
                            <div class="tab-pane fade p-3" id="observations" role="tabpanel"
                                aria-labelledby="observations-tab">
                                <!-- Contenido de la Tab 3 -->
                                @include('AccessControl.Visitors.components.form-observations')
                            </div>

                        </div>
                        <!-- End Bordered Tabs -->
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar visitante') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@if( $errors->any() )
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error de validación de campos',
            text:`             
            @foreach ($errors->all() as $error)
                - {{ $error}}
            @endforeach`,
            showConfirmButton: true,
            confirmButtonColor: '#0d489a',
            confirmButtonText: 'Aceptar'     
        });
    });
</script>
@endif


<script>
    /**
 * Manage the tabs
 */
document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('#tabs-visitors .nav-link');

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
<script src="{{ asset('js/components/camera.js') }}"></script>
<script src="{{ asset('js/visitors/inputsVisitors.js') }}"></script>
@endsection
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AccessControl\IdentificationType;
use App\Models\User;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use App\Models\AccessControl\VisitorTypes;
use App\Models\AccessControl\EquipmentTypes;
use App\Models\AccessControl\VehicleTypes;
use App\Models\AccessControl\Arl;
use App\Models\AccessControl\Rol;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->generateIdentificationTypes();
        $this->generateAdminUser();
        $this->generateCompanies();
        $this->generateAreas();
        $this->generateJobTitles();
        $this->generateLocations();
        $this->generateVisitorsTypes();
        $this->generateEquipmentTypes();
        $this->generateVehicleTypes();
        $this->generateArls();
    }

    private function generateIdentificationTypes(): void
    {
        $identificationsTypes = [
            [
                'initials' => 'CC',
                'name'  => 'Cedula de ciudadanía'
            ],
            [
                'initials' => 'TI',
                'name'  => 'Tarjeta de identidad'
            ],
            [
                'initials' => 'CE',
                'name'  => 'Cédula de Extranjería'
            ],
            [
                'initials' => 'PA',
                'name'  => 'Pasaporte'
            ]
        ];

        foreach ($identificationsTypes as $identificationType) {
            IdentificationType::create([
                'initials' => $identificationType['initials'],
                'name' => $identificationType['name']
            ]);
        }
    }

    private function generateAdminUser(): void
    {
        User::create([
            'username' => 'admin',
            'identification' => '12313113',
            'identification_type' => 1,
            'name' => 'Administrador',
            'last_name' => '',
            'email' => 'administrador@protecnicaing.com',
            'role_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => Hash::make('password'),
        ]);
    }

    private function generateCompanies(): void
    {

        $companies = [
            [
                'name' => 'Protecnica Ingeniería',
                'nit'  => '111111111'
            ],
            [
                'name' => 'Quimica Lider',
                'nit'  => '111111112'
            ],
            [
                'name' => 'Nutresol',
                'nit'  => '111111113'
            ],
        ];

        foreach ($companies as $company) {
            Company::create([
                'name' => $company['name'],
                'nit' => $company['nit'],
                'created_by' => 1,
            ]);
        }
    }

    private function generateAreas(): void
    {
        $areas = [
            ['name' => "Gestión Humana"],
            ['name' => 'Tecnología'],
            ['name' => 'Producción'],
        ];

        foreach ($areas as $area) {
            Area::create([
                'name' => $area['name'],
                'company_id' => 1,
                'created_by' => 1,
            ]);
        }
    }

    private function generateJobTitles(): void
    {

        $jobTitles = [
            [
                'name' => 'Coordinador de GH',
                'area_id' => 1,
            ],
            [
                'name' => 'Coordinador de Tecnología',
                'area_id' => 2,
            ],
            [
                'name' => 'Jefe producción',
                'area_id' => 3,
            ],
            [
                'name' => 'Operario producción',
                'area_id' => 3,
            ],
        ];

        foreach ($jobTitles as $jobTitle) {
            JobTitle::create([
                'name' => $jobTitle["name"],
                'area_id' => $jobTitle["area_id"],
                'company_id' => 1,
                'created_by' => 1
            ]);
        }
    }

    private function generateLocations(): void
    {
        $locations = [
            ['name' => 'Edificio Viejo'],
            ['name' => 'Edificio Nuevo'],
            ['name' => 'Bodega 1'],
            ['name' => 'Portería'],
            ['name' => 'Mesanine'],
        ];

        foreach ($locations as $location) {
            Location::create([
                'name' => $location["name"],
                'company_id' => 1,
                'created_by' => 1
            ]);
        }
    }

    private function generateVisitorsTypes(): void
    {
        $visitorsTypes = [
            ['name' => 'Visitante'],
            ['name' => 'Entrevista'],
            ['name' => 'Conductor'],
            ['name' => 'Contratista'],
        ];

        foreach ($visitorsTypes as $visitorType) {
            VisitorTypes::create([
                'name' => $visitorType['name'],
                'created_by' => 1,
            ]);
        }
    }

    private function generateEquipmentTypes(): void
    {
        $equipmentsTypes = [
            ['name' => 'Computador'],
            ['name' => 'Tablet'],
            ['name' => 'Herramienta General'],
        ];

        foreach ($equipmentsTypes as $equipmentType) {
            EquipmentTypes::create([
                'name' => $equipmentType['name'],
                'created_by' => 1,
            ]);
        }
    }

    private function generateVehicleTypes(): void
    {
        $vehiclesTypes = [
            ['name' => 'Automóvil'],
            ['name' => 'Camioneta'],
            ['name' => 'Motocicleta'],
            ['name' => 'Tractocamión'],
        ];

        foreach ($vehiclesTypes as $vehicleType) {
            VehicleTypes::create([
                'name' => $vehicleType['name'],
                'created_by' => 1,
            ]);
        }
    }

    private function generateArls(): void
    {
        $arls = [
            ['name' => 'AXA COLPATRIA S.A.'],
            ['name' => 'COLMENA SEGUROS	'],
            ['name' => 'POSITIVA'],
            ['name' => 'SEGUROS BOLÍVAR S.A.'],
        ];

        foreach ($arls as $arl) {
            Arl::create([
                'name' => $arl['name'],
                'created_by' => 1,
            ]);
        }
    }

    private function generateRols(): void
    {
        $rols = [
            [
                'name' => 'Administrador',
                'created_by'  => 1
            ],
            [
                'name' => 'Guarda de seguridad',
                'created_by'  => 1
            ],
            [
                'name' => 'Jefe de seguridad / Cordinador de seguridad',
                'created_by'  => 1
            ],
            [
                'name' => 'Directores / Jefes de area',
                'created_by'  => 1
            ],
            [
                'name' => 'Colaborador',
                'created_by'  => 1
            ],
        ];

        foreach ($rols as $rol) {
            Rol::create([
                'name' => $rol['name'],
                'created_by' => $rol['created_by']
            ]);
        }
    }
}

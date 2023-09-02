<?php

use App\Models\AccessControl\Area;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;

function testHelper(): string {
    return "Helper Test";
}

function getDropdownsList(): array {
    
    $dropDownsList = [
        "identificationTypes" => IdentificationType::where('is_active', true)->get(),
        "companies" => Company::where('is_active', true)->get(),
        "areas" => Area::where('is_active', true)->get(),
        "jobTitles" => JobTitle::where('is_active', true)->get(),
        "locations" => Location::where('is_active', true)->get(),
    ];

    return $dropDownsList;
}
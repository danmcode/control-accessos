<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\Arl;
use App\Models\AccessControl\Visitor;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\Company;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('AccessControl.Visitors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                //Get all identifications types
                $identificationTypes = IdentificationType::where('is_active', '=', true)
                ->get();
        
                //Get all companies
                $companies = Company::where('is_active', '=', true)
                ->get();

                $arls = Arl::where('is_active','=',true)
                ->get();
        
        
                return view('AccessControl.Visitors.create',[
                    'companies' => $companies,
                    'identificationTypes' => $identificationTypes,
                    'arls'=>$arls
                ]); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        //
    }

    /**
     * See the view to add a visitor to a specific collaborator
     * TODO: Especificar el pk del usuario
     */
    public function createVisitorToColabollator()
    {


        return view('AccessControl.Visitors.create');
    }
}

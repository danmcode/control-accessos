<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\EmailConfig;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailConfig $emailConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailConfig $emailConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailConfig $emailConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailConfig $emailConfig)
    {
        //
    }
}

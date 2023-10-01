<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\EmailConfig;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;

        $isValidEmailConfig = EmailConfig::validateEmailConfig($data);
        
        if($isValidEmailConfig->fails()){
            return redirect()->route('configuration.index')
            ->withErrors($isValidEmailConfig);
        }

        $EmailConfigCreated = EmailConfig::create($data);

        if ($EmailConfigCreated) {
            return redirect()->route('configuration.index')
            ->with('success', 'Se ha configurado el correo electrónico');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $emailConfig)
    {
        $emailConfig = EmailConfig::find($emailConfig);
        $data = $request->all();
        $data['updated_by'] = auth()->user()->id;

        $isValidEmailConfig = EmailConfig::validateEmailConfig($data);

        if($isValidEmailConfig->fails()){
            return redirect()->route('configuration.index')
            ->withErrors($isValidEmailConfig);
        }

        $emailConfig->email = $data['email'];
        $emailConfig->password = $data['password'];
        $emailConfig->protocol = $data['protocol'];
        $emailConfig->encryption = $data['encryption'];
        $emailConfig->port = $data['port'];
        $emailConfig->host = $data['host'];
        $emailConfig->username = $data['username'];

        if($workingHours->update()){
            return redirect()->route('configuration.index')
            ->with('success', 'Se han actualizado la configuración de correo');
        }else{
            return redirect()->route('configuration.index')
            ->with('error', 'No se ha podido realizar la actualización');
        }
    }
}

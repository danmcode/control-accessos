<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\Visitors;

class ValidateVisitorController extends Controller
{
    function validatevisitor(Request $request, $id)
    {
        $validar = Visitors::where('identification', '=', $request->validate_identification)->get();
        if ($validar->isEmpty()) {
            return redirect()->route('crear-visitante', $id)->with('information', 'Registra el visitante');
        } else {
            return redirect()->route('home')->with('success', 'El visitante esta registrado');
        }
    }
}

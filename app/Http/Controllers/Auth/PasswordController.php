<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change_password');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $patron = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%]).+/";
        $reglas = [
            'password' => 'required|min:8|regex:' . $patron,
        ];

        $mensajes = [
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Ambos campos deben Coincidir.',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, un número y uno de los siguiente caracteres [@,#,$,%].',
        ];

        $validador = Validator::make($data, $reglas, $mensajes);

        if ($validador->fails()) {
            $errorsString = $validador->errors()->all();
            return redirect()->back()->withErrors($errorsString)->withInput();
        }

        // Encuentra el registro existente por su ID
        $usuario = User::find(Auth()->user()->id);

        $usuario->password = Hash::make($data['password']);

        $usuario->update();

        // Establece un mensaje de éxito en la sesión
        session()->flash('success', 'Contraseña Actualizada con Exito.');


        return redirect()->back();
    }
}

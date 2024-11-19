<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{



    public function showLoginForm(){

        return view('Auth.login');
    }

     // Procesar la solicitud de inicio de sesión
     public function login(Request $request)
     {
         // Validar los datos del formulario
         $request->validate([
             'name' => 'required|string',
             'password' => 'required|string',
         ]);
 
         // Intentar autenticar al usuario
         if (Auth::attempt([
             'name' => $request->name,
             'password' => $request->password
         ], $request->remember)) {
             // Redirigir al usuario a la página principal (o a otra ruta)
             return redirect()->route('backend');
         }
 
         // Si la autenticación falla, redirigir con un error
         return back()->withErrors([
             'name' => 'Credenciales incorrectas.',
         ]);
     }
}
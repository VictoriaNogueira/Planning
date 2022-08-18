<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Session;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function index()
    {
        return view('user.login');
    }

    public function validateLogin(Request $request)
    {
        $messages =[
            'email.required' => 'O campo Email é obrigatório!',
            'email.email' => 'Email inválido!',
            'password.required' => 'O campo Senha é obrigatório!',
            'password.min' => 'A senha deve conter ao menos 6 caracteres!',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], $messages);

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            $notify[] = ['error', 'Credenciais inválidas!'];
            return back()->withNotify($notify);
        }
        $notify[] = ['success', 'Usuario logado!'];
        return redirect()->intended('planning')->withNotify($notify);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}




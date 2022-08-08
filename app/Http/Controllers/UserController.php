<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Amount;
use App\Models\User;
use App\Models\Category;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.create');
    }

    //create and save user
    public function store(Request $request)
    {
        $messages =[
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'O campo Senha é obrigatório!',
            'password.min' => 'A senha deve conter ao menos 6 caracteres!',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória!',
            'password_confirmation.same' => 'As senhas devem ser iguais.'
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'goal' => 'required'
        ], $messages);

        // begin transaction
        DB::BeginTransaction();
        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,
            'goal' => $request->goal
        ]);

        if(!$user = $request->validate(['name, email, password, password_confirmation, goal'])){
            DB::Rollback();
            $notify[] = ['error', 'Erro ao criar usuário!'];
            return back()->withNotify($notify);
        } else{
            DB::Commit();
            $notify[] = ['success', 'Usuario criado!'];
            return redirect()->intended('login')->withNotify($notify);
        }
    }
}


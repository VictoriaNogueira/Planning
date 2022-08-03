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
    //create and save user
    public function store(UserRequest $request)
    {
        // begin transaction
        DB::BeginTransaction();

            try{
                $user = User::create([
                    'name' => $request->name,
                    'cpf' => $request->cpf,
                    'sex' => $request->sex,
                    'email'=>$request->email,
                    'password' => Hash::make($request->password)
                ]);
                DB::Commit();
                $notify[] = ['message', 'Usuário cadastrado com sucesso!','error' => false];
            }catch(Exception $e){
                DB::Rollback();
                $notify[] = ['message', $e->getMessage(),'error' => true];
            }
            return $notify;
    }
}


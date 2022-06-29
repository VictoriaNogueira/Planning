<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //create user
    public function store(UserRequest $userRequest)
    {
        // begin transaction
        DB::BeginTransaction();

            try{
                $user = User::create([
                    'name' => $userRequest->name,
                    'cpf' => $userRequest->cpf,
                    'sex' => $userRequest->sex,
                    'email'=>$userRequest->email,
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

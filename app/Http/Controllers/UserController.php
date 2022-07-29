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

    //update user
    // public function update(UserUpdateRequest $request)
    // {
    //     //begin transaction
    //     DB::BeginTransaction();

    //         try{
    //             $user = User::find($request->id);
    //             $user->update($request)
    //         }
    // }
}

        // try{
        //     $user = User::find($request->id);
        //     $user->update($request->except(['name', 'id']));
        //     $info = $user->infoUser()->update($request->only('name'));
        //     DB::commit();
        //     $notify[] = ['message'=>'Assistido alterado com sucesso!', 'error'=> false];
        // }catch(Exception $e){
        //     DB::rollBack();
        //     $notify[] = ['message'=>'Não foi possível alterar os dados!', 'error'=> true];
        // }
        // return json_encode($notify);


<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmountRequest;
use App\Models\Amount;
use App\Models\User;
use App\Models\Category;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AmountController extends Controller
{
    public function index (Request $request)
    {
        $amount = Amount::query()
            ->get();

        return view('planning.index');
    }

    //create amount
    public function store(AmountRequest $request)
    {
        //begin transaction
        DB::BeginTransaction();

        try{
            $amount = Amount::create([
                'value' => $request->value,
            ]);
            DB::Commit();
            $notify[] = ['message', 'Valor cadastrado!', 'error' => false];
        }catch(Exception $e){
            DB::Rollback();
            $notify[] = ['message', $e->getMessage(), 'error' => true];
        }
        return $notify;
    }
}

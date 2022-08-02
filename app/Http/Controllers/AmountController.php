<?php

namespace App\Http\Controllers;

//use App\Http\Middleware\TrustProxies;
use App\Http\Requests\AmountRequest;
use App\Models\Amount;
use App\Models\User;
use App\Models\Category;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmountController extends Controller
{
    //lista os valores
    public function index ()
    {
        //$amounts = Amount::all();
        //$amounts = Amount::with('category')->get();
        $amounts = Amount::query()->get();
        $categories = Category::query()->get();

        // $count = 0;
        // $arrayAmount = [];
        // foreach($amounts as $amount)
        // {
        //     $arrayAmount[$count]['description'] = $amount->description;
        //     $arrayAmount[$count]['value'] = $amount->value;
        //     $arrayAmount[$count]['category'] = $amount->category->name;
        //     $count++;
        // }
        //dd($array);
        return view('planning.index', compact ('categories','amounts'));
    }


    //salva o novo valor no banco
    public function store(AmountRequest $request)
    {
        DB::BeginTransaction();
        try{
            Amount::create([
                'description' => $request->description,
                'value' => $request->value,
                'category_id' => $request->category,
            ]);
            DB::Commit();
            $notify[] = ['message', 'Valor cadastrado!', 'error' => false];
        }catch(Exception $e){
            DB::Rollback();
            $notify[] = ['message', $e->getMessage(), 'error' => true];
        }
        return $this->index();
    }

    public function destroy($id)
    {
        $amount = Amount::find($id);
        $amount->delete();
        return $this->index();

        //dd($amount);
    }

}

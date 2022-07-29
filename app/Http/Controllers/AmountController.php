<?php

namespace App\Http\Controllers;

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
        $amounts = Amount::query()->get();
        $count = 0;
        $array = [];

        foreach($amounts as $amount)
        {
            $array[$count]['description'] = $amount->description;
            $array[$count]['value'] = $amount->value;
            $array[$count]['category'] = $amount->category_id;

            $count++;
        }
        //json_encode($array);
        //dd($array);
        return view('planning.index', compact ('array','amounts'));
        // $products = Product::all();
        // return view('products',compact('products','product_lines'));
    }


    //salva o novo valor no banco
    public function store(AmountRequest $request)
    {
        DB::BeginTransaction();

        try{
            $amount = Amount::create([
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

        return view('planning.index');
    }

}

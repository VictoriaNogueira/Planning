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
        $amounts = Amount::join('categories','amounts.category_id', '=', 'categories.id')
            ->select('amounts.*','categories.name')
            ->paginate(3);
        $categories = Category::all();
        //$amounts = Amount::with('category');
        //dd($amount->category->name);

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
        return redirect()->back();
    }


    public function destroy($id)
    {
        $amount = Amount::find($id);
        $amount->delete();
        //return $this->index();
        return redirect()->back();
    }

}

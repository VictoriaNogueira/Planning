<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Amount;
use App\Models\User;
use App\Models\Category;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AmountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //lista os valores
    public function index ()
    {
        $categories = Category::all();
        $amounts = Amount::join('categories','amounts.category_id', '=', 'categories.id')
            ->select('amounts.*','categories.name')
            ->where('amounts.user_id', auth::user()->id)
            ->paginate(3);

            return view('planning.index', compact ('categories','amounts'));
    }


    //salva o novo valor no banco
    public function store(Request $request)
    {
        $messages =[
            'description.required' => 'Campo obrigatório!',
            'value.required' => 'Campo obrigatório!',
            'category.required' => 'Campo obrigatório!',
        ];

        $request->validate([
            'description' => 'required',
            'value' => 'required',
            'category' => 'required',
        ]);

        DB::BeginTransaction();
        try{
            Amount::create([
                'description' => $request->description,
                'value' => $request->value,
                'category_id' => $request->category,
                'user_id' => auth::user()->id
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

    public function somaValor($category){
		return Amount::select()
            ->where('amounts.user_id', auth::user()->id)
            ->where('category_id', '=', $category)
            ->sum('value');
	}

    public function dashboard()
    {
        $entradas = $this -> somaValor(1);
            echo($entradas) . PHP_EOL;

        $saidas = $this -> somaValor(2);
            echo($saidas) . PHP_EOL;

        $investimentos = $this -> somaValor(3);
            echo($investimentos);

        return view('planning.dashboard');
    }
        // $entradas = Amount::where('amounts.user_id', auth::user()->id)
        //     ->where('category_id', '=', 1)
        //     ->sum('value');
        // echo($entradas) . PHP_EOL;

        // $saidas = Amount::select()
        //     ->where('amounts.user_id', auth::user()->id)
        //     ->where('category_id', '=', 2)
        //     ->sum('value');
        //     echo($saidas) . PHP_EOL;
}

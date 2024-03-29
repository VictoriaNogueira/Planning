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
            ->orderby('amounts.id', 'desc')
            ->paginate(5);

            return view('planning.index', compact ('categories','amounts'));
    }


    //salva o novo valor no banco
    public function store(Request $request)
    {
        $messages =[
            'description.required' => 'O campo descrição é obrigatório!',
            'value.required' => 'O campo valor é obrigatório!',
            'category.required' => 'O campo categoria é obrigatório!',
        ];

        $request->validate([
            'description' => 'required',
            'value' => 'required',
            'category' => 'required',
        ], $messages);

        DB::BeginTransaction();
        $amount = Amount::create([
            'description' => $request->description,
            'value' => $request->value,
            'category_id' => $request->category,
            'user_id' => auth::user()->id,
            'created_at' => $request->created_at
        ]);

        if(!$request->validate(['description, value, category_id'])){
            DB::Commit();
            $notify[] = ['success', 'Valor cadastrado!'];
        }else{
            DB::Rollback();
            $notify[] = ['error', 'Erro ao cadastrar valor!'];
        }

        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $amount = Amount::find($id);
        $amount->delete();
        return redirect()->back();
    }

    public function sumValues($category){
		return Amount::select()
            ->where('amounts.user_id', auth::user()->id)
            ->where('category_id', '=', $category)
            ->sum('value');
	}

    public function cards()
    {
        $entradas = $this -> sumValues(1);

        $saidas = $this -> sumValues(2);

        $investimentos = $this -> sumValues(3);

        $total = $entradas - $saidas - $investimentos;

        $findGoal = User::where('users.id', auth::user()->id)
            ->select('users.goal')->firstOrFail();
            $goal = $findGoal->goal;

        // $findMonth = Amount::where('users.id', auth::user()->id)
        //     ->select('users.created_at')->Month();
        //     $month = $findMonth->month();

            // var month = today.getMonth();


        return view('planning.dashboard', compact ('goal', 'entradas','saidas', 'investimentos', 'total'));
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

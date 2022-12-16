<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function create(Request $request){

        try {
            $validator = $request->validate([
                "value"=> 'required|integer',
                "addressee" => 'required|string|max:255',
                "user_id" => 'required|integer',
            ]);

            $transaction = Transaction::create([
                "value" =>$request->value,
                "addressee"=>$request->addressee,
                "user_id"=>$request->user_id
            ]);
        } catch (\exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }

        $balance = Wallet::find($request->user_id)->balance;
        $value = $request->value;
        if($balance>=$value){
            
        }else{

            return  'saldo insuficiente, su saldo actual es: '.$balance;

        }
        
        

        
    }
}

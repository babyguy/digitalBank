<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //crear transactrion
    public function create(Request $request){
        $user_id = auth()->user()->id;
        try {
            $validator = $request->validate([
                "value"=> 'required|integer',
                "addressee" => 'required|string|max:255',
                "user_id"=>'string'
            ]);

            $transaction = Transaction::create([
                "value" =>$request->value,
                "addressee"=>$request->addressee,
                "user_id"=>$user_id,
            ]);
        } catch (\exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
       
        //guarda el balance de Wallet del usuarui que envia 
        $balance = Wallet::find($user_id)->balance;
        // guarda el valor a enviar
        $value = $request->value;
        // compara el valor de $balance con $value
        if($balance>=$value){
            // si el $balance es mayor o igual a $value procede a restar el $value a  $balance y a sumar al usuario que se le envia 
            $addressee = Wallet::find($request->addressee);
            return $addressee;
        }else{

            return  'saldo insuficiente, su saldo actual es: '.$balance;

        }
        
        

        
    }
}

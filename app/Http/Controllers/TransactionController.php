<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //crear transactrion
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

        //guarda el balance de Wallet del usuarui que envia 
        $balance = Wallet::find($request->user_id)->balance;
        // guarda el valor a enviar
        $value = $request->value;
        // compara el valor de $balance con el de Wallet->balance
        if($balance>=$value){
            // si el $balance es mayor o igual a $value procede a restar el $value a  $balance y a sumar al usuario que se le envia 
        }else{

            return  'saldo insuficiente, su saldo actual es: '.$balance;

        }
        
        

        
    }
}

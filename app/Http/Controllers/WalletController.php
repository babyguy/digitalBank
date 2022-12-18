<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showWallet(){
        // captura el usuario que envia conel token
        $user = auth()->user()->id;
        // muestra solo el wallet del usuario logueado
        return Wallet::find($user);
    }
}

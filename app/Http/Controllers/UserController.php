<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(Request $request)
    {


        try {
            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'cc' => 'required|integer',
                'username' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|max:255',
            ]);

            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'cc' => $request->cc,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        } catch (\exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }

        return $user;
    }

    public function index()
    {
        return User::get();
    }

    public function update($id, Request $request)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'cc' => $request->cc,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'usuario actualizado exitosamente';
    }
}

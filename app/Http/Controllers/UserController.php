<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'ic' => $request->ic,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'interest' => $request->interest,
            'class' => $request->class,
        ]);

        return redirect()->route('/')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Thank you for register, you may now proceed to login'
        ]);
    }
}

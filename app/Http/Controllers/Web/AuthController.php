<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(Request  $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ])->validate();

        // if ($validated->fails()) {
        //     // return back()->withErrors($validated);
        //     return back();
        // }
    }
}

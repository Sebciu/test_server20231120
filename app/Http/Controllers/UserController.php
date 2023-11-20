<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('user.create')->with('success', 'Użytkownik dodany pomyślnie!');
    }
}
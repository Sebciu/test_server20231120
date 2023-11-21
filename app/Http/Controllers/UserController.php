<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }
    public function show()
    {

    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('users.create')->with('success', 'Użytkownik dodany pomyślnie!');
    }
}

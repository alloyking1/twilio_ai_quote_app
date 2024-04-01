<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        return view('subscribe');
    }

    public function save(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required | string | max:255',
            'phone_number' => 'required | string | max:255',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone_number,
        ]);
    }
}

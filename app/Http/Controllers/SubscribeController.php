<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
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
            'phone' => ['required', 'string', 'max:255', 'unique:' . Subscribe::class],
        ]);

        Subscribe::create([
            'name' => $request->name,
            'phone' => $request->phone_number,
        ]);

        return redirect()->route('list')->with('success', 'Phone number added to list!');
    }
}

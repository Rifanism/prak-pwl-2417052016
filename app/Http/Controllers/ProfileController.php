<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $data = [
            'name' => $request->input('name', ''),
            'npm' => $request->input('npm', ''),
            'class' => $request->input('class', ''),
        ];
        return view('profile', compact('data'));
    }
}

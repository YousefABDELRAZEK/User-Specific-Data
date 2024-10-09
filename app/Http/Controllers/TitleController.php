<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{
    // Show titles for the authenticated user
    public function index()
    {
        $titles = Auth::user()->titles; // Get titles for the logged-in user
        return view('titles', compact('titles')); // Adjust view name accordingly
    }


    public function create(Request $request)
    {
        $request->validate(['title' => 'required']);

        // Create a new title and associate it with the authenticated user
        Title::create([
            'title' => $request->input('title'),
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('titles.index')->with('success', 'Title created successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;



class AlertController extends Controller
{
    
    public function index()
    {
        $alerts = Alert::latest()->paginate(10);
        return view('admin.alert.index', compact('alerts'));
    }

    public function create()
    {
        return view('admin.alert.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Alert::create([
            'message' => $request->message,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.alert.index')->with('success', 'Alert created successfully.');
    }
}


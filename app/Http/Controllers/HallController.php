<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Cinema;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::with('cinema')->get();
        return view('admin.halls.index', compact('halls'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        return view('admin.halls.create', compact('cinemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cinema_id' => 'required|exists:cinemas,id',
            'name' => 'required|string|max:255',
            'seat_capacity' => 'required|integer',
        ]);

        Hall::create($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall created successfully.');
    }

    public function edit(Hall $hall)
    {
        $cinemas = Cinema::all();
        return view('admin.halls.edit', compact('hall', 'cinemas'));
    }

    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'cinema_id' => 'required|exists:cinemas,id',
            'name' => 'required|string|max:255',
            'seat_capacity' => 'required|integer',
        ]);

        $hall->update($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }
}

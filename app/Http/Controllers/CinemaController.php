<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::all();
        return view('admin.cinemas.index', compact('cinemas'));
    }

    public function create()
    {
        return view('admin.cinemas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        Cinema::create($request->all());

        return redirect()->route('cinemas.index')
            ->with('success', 'Cinema created successfully.');
    }

    public function show(Cinema $cinema)
    {
        return view('admin.cinemas.show', compact('cinema'));
    }

    public function edit(Cinema $cinema)
    {
        return view('admin.cinemas.edit', compact('cinema'));
    }

    public function update(Request $request, Cinema $cinema)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $cinema->update($request->all());

        return redirect()->route('cinemas.index')
            ->with('success', 'Cinema updated successfully.');
    }

    public function destroy(Cinema $cinema)
    {
        $cinema->delete();

        return redirect()->route('cinemas.index')
            ->with('success', 'Cinema deleted successfully.');
    }
}

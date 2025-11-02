<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use Illuminate\Http\Request;

class JocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jocs = Joc::orderBy('id', 'desc')->paginate(10);
        return view('jocs.index', compact('jocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jocs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'estudi' => 'required|string|max:255',
            'data_publicacio' => 'required|date',
            'genere' => 'required|string|max:100',
            'puntuacio' => 'required|numeric|min:0|max:10',
            'fotografia' => 'required|url',
        ]);

        Joc::create($data);

        return redirect()->route('jocs.index')->with('success', 'Joc creat correctament.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Joc $joc)
    {
        return view('jocs.show', compact('joc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joc $joc)
    {
        return view('jocs.edit', compact('joc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joc $joc)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'estudi' => 'required|string|max:255',
            'data_publicacio' => 'required|date',
            'genere' => 'required|string|max:100',
            'puntuacio' => 'required|numeric|min:0|max:10',
            'fotografia' => 'required|url',
        ]);

        $joc->update($data);

        return redirect()->route('jocs.show', $joc)->with('success', 'Joc actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joc $joc)
    {
        $joc->delete();
        return redirect()->route('jocs.index')->with('success', 'Joc esborrat correctament.');
    }
}

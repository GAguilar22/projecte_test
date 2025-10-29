<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Joc::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'estudi' => 'required|string|max:255',
            'data_publicacio' => 'required|date',
            'genere' => 'required|string|max:100',
            'puntuacio' => 'required|numeric|min:0|max:10',
            'fotografia' => 'required|url',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return [
                'created' => false,
                'errors' => $validator->errors()
            ];
        }

        Joc::create($request->all());
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Joc::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $joc = Joc::findOrFail($id);
        $joc->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Joc::destroy($id);
        return ['deleted' => true];
    }
}

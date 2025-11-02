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
            // accept string and normalize to valid URL (we'll sanitize below)
            'fotografia' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return [
                'created' => false,
                'errors' => $validator->errors()
            ];
        }

        $data = $request->all();
        $data['fotografia'] = $this->normalizeFotografia($data['fotografia'] ?? null);

        Joc::create($data);
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
        $data = $request->all();
        if(array_key_exists('fotografia', $data)){
            $data['fotografia'] = $this->normalizeFotografia($data['fotografia']);
        }

        $joc->update($data);
        return ['updated' => true];
    }

    /**
     * Normalize a fotografia value into a valid URL. If empty or invalid, return a picsum placeholder.
     */
    private function normalizeFotografia(?string $url): string
    {
        $placeholder = 'https://picsum.photos/640/360?random=' . uniqid();
        if(empty($url)){
            return $placeholder;
        }

        // If it doesn't start with http/https, prepend https://
        if(!preg_match('#^https?://#i', $url)){
            $url = 'https://' . ltrim($url, '/');
        }

        return filter_var($url, FILTER_VALIDATE_URL) ? $url : $placeholder;
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

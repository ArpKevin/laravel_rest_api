<?php

namespace App\Http\Controllers;

use App\Models\Csoki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CsokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Csoki::all(), 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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
        $validator = Validator::make(request()->all(), [
            "nev" => "required",
            "ara" => "required",
            "raktaron" => "required"
        ]);

        if ($validator->fails()){
            return json_encode([
                "error" => "hiányzó adat"
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        return response()->json(Csoki::create($validator->validated()), 201, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     */
    public function show(Csoki $csoki)
    {
        return response()->json($csoki, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Csoki $csoki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Csoki $csoki)
    {
        $validator = Validator::make(request()->all(), [
            "nev" => "required",
            "ara" => "required",
            "raktaron" => "required"
        ]);

        if ($validator->fails()){
            return json_encode([
                "error" => "hiányzó adat"
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        $csoki->update($validator->validated());

        return response()->json(($csoki), 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Csoki $csoki)
    {
        return response()->json($csoki->delete(), 204, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}

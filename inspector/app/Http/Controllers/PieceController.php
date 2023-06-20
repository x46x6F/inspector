<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $pieces = Piece::with(['user', 'materials', 'campaigns'])->get();
        return Inertia::render('Piece/Index', ['pieces' => $pieces]); 
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Piece $pieces): \Inertia\Response
    {
        return Inertia::render('Piece/Show', ['pieces' => $pieces]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

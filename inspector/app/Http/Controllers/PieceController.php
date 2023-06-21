<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $pieces = Piece::with(['materials', 'campaigns'])->get();
        return Inertia::render('Pieces', [
            'pieces' => Piece::query()
                ->when(Request()->input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->with(['materials', 'campaigns'])->get(),
            'role_id' => Auth::user()->role_id
        ]);
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
    public function show(Piece $piece): \Inertia\Response
    {
        return Inertia::render('PieceDetails', ['piece' => $piece]);
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
    public function destroy(Piece $piece)
    {
        $piece->delete();
    }
}

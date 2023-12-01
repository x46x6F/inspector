<?php

namespace App\Http\Controllers;

use App\Models\campaigns_materials;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Campaigns_MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $campaigns_materials = campaigns_materials::with(['materials', 'compaigns'])->get();
        return Inertia::render('Material/Index', ['campaigns_materials' => $campaigns_materials]);
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
    public function show(campaigns_materials $campaigns_materials): \Inertia\Response
    {
        return Inertia::render('Material/Show', ['campaigns_materials' => $campaigns_materials]);
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

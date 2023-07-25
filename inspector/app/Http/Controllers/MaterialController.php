<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $materials = Material::with(['sites', 'models', 'pieces'])->get();
        return Inertia::render('Material/Index', ['materials' => $materials]); 
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
    public function show(Material $materials): \Inertia\Response
    {
        return Inertia::render('Material/Show', ['materials' => $materials]);
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

    public function test(){
        DB::table('materials')->insert([
            'name' => "Test",
            'creation_year' => 2002,
            'status' => 0,
            'model_id' => "A530",
            'site_id' => 52
        ]);
    }
}

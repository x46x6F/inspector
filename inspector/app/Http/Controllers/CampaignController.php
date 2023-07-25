<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : \Inertia\Response
    {
        $campaigns = Campaign::with(['creator', 'auditor', 'site', 'pieces'])->get();
        return Inertia::render('Campaign/Index', ['campaigns' => $campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Campaign/Create', ['sites' => Site::with('materials')->get()]);
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
    public function show(Campaign $campaigns) : \Inertia\Response
    {
        return Inertia::render('Campaign/Show', ['campaigns' => $campaigns]);
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

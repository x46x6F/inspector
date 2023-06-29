<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $sites = Site::with(['materials', 'campaigns'])->get();
        return Inertia::render('Site/Index', ['sites' => $sites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Site/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'address' => 'required',
            'address_comp' => 'nullable',
            'zip_code' => 'required',
            'city' => 'required',
        ]);

        $site = new Site();

        $site->name = $validated['name'];
        $site->number = $validated['number'];
        $site->address = $validated['address'];
        $site->address_comp = $validated['address_comp'];
        $site->zip_code = $validated['zip_code'];
        $site->city = $validated['city'];

        $site->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site): \Inertia\Response
    {
        return Inertia::render('Site/Show', ['site' => $site]);
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

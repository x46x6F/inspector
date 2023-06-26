<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $campaign = Campaign::with(['user', 'sites', 'pieces', 'materials', 'audits'])->get();
        return Inertia::render('Campaign', ['campaign' => $campaign]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        $user = User::get();
        return Inertia::render('campaign/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required | max:255',
            'status'=> 'required | max:255',
            'start_date' => 'required | date',
            'end_date' => 'required | date',

        ]);

        $campaign = new Campaign();
        $campaign->name = $validated['name'];
        $campaign->status = $validated['status'];
        $campaign->start_date = $validated['start_date'];
        $campaign->end_date = $validated['end_date'];
        $campaign->creator_id = Auth::user()->id;
        
        $campaign->save();

        return to_route('campaign.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign): \Inertia\Response
    {
        return Inertia::render('Campaign/Show', ['campaign' => $campaign]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign): \Inertia\Response
    {
        return Inertia::render('Campaign/Edit', ['campaign' => $campaign]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required | max:255',
            'status'=> 'required | max:255',
            'start_date' => 'required | date',
            'end_date' => 'required | date',

        ]);

        $campaign->name = $validated['name'];
        $campaign->status = $validated['status'];
        $campaign->start_date = $validated['start_date'];
        $campaign->end_date = $validated['end_date'];
        $campaign->creator_id = Auth::user()->id;
        
        $campaign->save();

        return to_route('campaign.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return $this->index();
    }
}

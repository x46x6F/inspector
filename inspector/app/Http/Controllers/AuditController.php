<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $audits = Audit::with(['piece', 'campaigns'])->get();
        return Inertia::render('Audit/Index', ['audits' => $audits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Audit/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'campaign_id' => 'required',
            'piece_id' => 'required',
            'audit' => 'required | boolean',
            'presence' => 'required | boolean',
            'functional' => 'required | boolean',
            'month' => 'required | max:2',
            'usury' => 'required | boolean',
            'change' => 'required | boolean',
            'complement' => 'required | boolean',
            'recommended' => 'required | boolean'
        ]);

        $audit = new Audit();

        $audit->campaign_id = $validated['campaign_id'];
        $audit->piece_id = $validated['piece_id'];
        $audit->audit = $validated['audit'];
        $audit->presence = $validated['presence'];
        $audit->functional = $validated['functional'];
        $audit->month = $validated['month'];
        $audit->usury = $validated['usury'];
        $audit->change = $validated['change'];
        $audit->complement = $validated['complement'];
        $audit->recommended = $validated['recommended'];

        $audit->save();

        return to_route('audit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        return Inertia::render('Audit/Show', ['audit' => $audit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audit $audit)
    {
        return Inertia::render('Audit/Edit', ['audit' => $audit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audit $audit): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'campaign_id' => 'required',
            'piece_id' => 'required',
            'audit' => 'required | boolean',
            'presence' => 'required | boolean',
            'functional' => 'required | boolean',
            'month' => 'required | max:2',
            'usury' => 'required | boolean',
            'change' => 'required | boolean',
            'complement' => 'required | boolean',
            'recommended' => 'required | boolean'
        ]);

        $audit->campaign_id = $validated['campaign_id'];
        $audit->piece_id = $validated['piece_id'];
        $audit->word = $validated['audit'];
        $audit->presence = $validated['presence'];
        $audit->functional = $validated['functional'];
        $audit->month = $validated['month'];
        $audit->usury = $validated['usury'];
        $audit->change = $validated['change'];
        $audit->complement = $validated['complement'];
        $audit->recommended = $validated['recommended'];
        
        $audit->save();

        return to_route('audit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit): \Inertia\Response
    {
        $audit->delete();
        return $this->index();
    }
}

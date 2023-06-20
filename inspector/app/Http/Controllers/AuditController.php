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
        $audits = Audit::with(['user', 'campaigns'])->get();
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
            'audit' => 'required | array',
            'presence'=> 'required | array',
            'functional' => 'required | array',
            'month' => 'required | max:2',
            'usury' => 'required | array',
            'change' => 'required | array',
            'complement' => 'required | array',
            'recommended'=> 'required | array'
        ]);

        $audit = new Audit();
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Audit $audit): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'audit' => 'required | array',
            'presence'=> 'required | array',
            'functional' => 'required | array',
            'month' => 'required | max:2',
            'usury' => 'required | array',
            'change' => 'required | array',
            'complement' => 'required | array',
            'recommended'=> 'required | array'
        ]);

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
    public function destroy(string $id)
    {
        //
    }
}

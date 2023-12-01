<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Campaign;
use App\Models\Piece;
use Illuminate\Http\Request;

class AuditAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Audit::with(['piece', 'campaign'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Unused if Observer->OK
    }

    /**
     * Display the specified resource.
     * 
     * @param Campaign $campaign
     * @param Piece $piece
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function show(Campaign $campaign, Piece $piece = null): \Illuminate\Database\Eloquent\Collection
    {
        if ($piece != null) {
            return Audit::with(['piece', 'campaign'])->where('campaign_id', $campaign->id)->where('piece_id', $piece->id)->get();
        } else {
            return Audit::with(['piece', 'campaign'])->where('campaign_id', $campaign->id)->get();
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param Campaign $campaign
     * @param Piece $piece
     * 
     * @return mixed
     */
    public function update(Request $request, Campaign $campaign, Piece $piece): mixed
    {
        $validated = $request->validate([
            'audit' => 'required | boolean',
            'presence' => 'required | boolean',
            'functional' => 'required | boolean',
            'month' => 'required | integer',
            'usury' => 'required | boolean',
            'change' => 'required | boolean',
            'complement' => 'required | boolean',
            'recommended' => 'required | boolean',
        ]);

        $audit = Audit::where('campaign_id', '=', $campaign->id)->where('piece_id', $piece->id)->first();
        $audit->audit = $validated['audit'];
        $audit->presence = $validated['presence'];
        $audit->functional = $validated['functional'];
        $audit->month = $validated['month'];
        $audit->usury = $validated['usury'];
        $audit->change = $validated['change'];
        $audit->complement = $validated['complement'];
        $audit->recommended = $validated['recommended'];
        $audit->update();
        return $audit;
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param Campaign $campaign
     * @param Piece $piece
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function destroy(Campaign $campaign, Piece $piece): \Illuminate\Database\Eloquent\Collection
    {
        // ! Pas fonctionnel => Pas prioritaire mais à faire si possible 
        // $audit = Audit::where('campaign_id', $campaign->id)->where('piece_id', $piece->id)->first();
        // $audit->delete();
        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Pieces', [
            'pieces' => Piece::query()
                ->when(Request()->input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->with(['material', 'campaigns', 'model'])->get(),
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
        /**
         * 0 constructor_id
         * 1 model_id
         * 2 model_name
         * 3 type_id
         * 4 creation_year
         * 5 has_electro
         * 6 status
         */

        if ($request->hasFile('file')) {
            $path = '/files';
            $file = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path($path), $file);

            $csvFile = fopen(base_path("public/files/" . $file), "r");
            $firstline = true;

            // ! Pas plus de 6 tours de boucles maximum
            while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {
                if (!$firstline) {
                    DB::insert(
                        'INSERT INTO csv_pieces(constructor_id, model_id, model_name, type_id, creation_year, has_electro, status) VALUES (:constructor_id, :model_id, :model_name, :type_id, :creation_year, :has_electro, :status)',
                        [
                            'constructor_id' => $data[0],
                            'model_id' => $data[1],
                            'model_name' => $data[2],
                            'type_id' => $data[3],
                            'creation_year' => $data[4],
                            'has_electro' => $data[5],
                            'status' => $data[6] == 'active' ? 1 : 0
                        ]
                    );
                    if (Piece::where('name', '=', )) {
                        # code...
                    }
                }

                $firstline = false;
            }
        }
        if (File::exists(public_path('files/' . $file))) {
            File::delete(public_path('files/' . $file));
        }


        return $this->index();
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

<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            if ($type === "pieces") {
                return Inertia::render('Model/Piece/Index', [
                    'pieces' => Model::query()
                        ->when(Request()->input('search'), function ($query, $search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })->whereNotNull('compose_id')->with(['constructor', 'type', 'materials', 'pieces', 'compatibles'])->get(),
                ]);
            } else if ($type === 'materials') {
                return Inertia::render('Model/Material/Index', [
                    'materials' => Model::query()
                        ->when(Request()->input('search'), function ($query, $search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })->whereNull('compose_id')->with(['constructor', 'type', 'materials', 'pieces', 'compatibles'])->get(),
                ]);
            }
        } else {
            abort(404);
        }
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

            DB::table('csv_pieces')->truncate();
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
                }

                $firstline = false;
            }
        }
        if (File::exists(public_path('files/' . $file))) {
            File::delete(public_path('files/' . $file));
        }

        $modelIds = DB::table('csv_pieces')->pluck('model_id')->toArray();
        $existingPieces = Model::whereIn('id', $modelIds)->count();

        if ($existingPieces > 0) {
            // return Inertia::location('/models?type=pieces');
            return Inertia::render('Pieces', [
                'pieces' => Model::query()
                    ->when(Request()->input('search'), function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })->whereNotNull('compose_id')->with(['constructor', 'type', 'materials', 'pieces', 'compatibles'])->get(),
                'existingPieces' => $existingPieces
            ]);
        } else {
            DB::insert('INSERT INTO models(id, name, creation_year, has_electro, status, constructor_id, type_id) (SELECT model_id as id, model_name as name, creation_year, has_electro, status, constructor_id, type_id FROM csv_pieces WHERE model_id NOT IN (SELECT id FROM models))');

            // DB::table('pieces')
            //     ->join('csv_pieces', 'pieces.model_id', '=', 'csv_pieces.model_id')
            //     ->update([
            //         'pieces.creation_year' => DB::raw('csv_pieces.creation_year'),
            //         'pieces.has_electro' => DB::raw('csv_pieces.has_electro'),
            //         'pieces.status' => DB::raw('csv_pieces.status'),
            //     ]);
        }
        return redirect('/models?type=pieces');
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $model)
    {
        // return Inertia::render('Model/Show', ['model' => $model]);
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

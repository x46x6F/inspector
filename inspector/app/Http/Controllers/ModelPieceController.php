<?php

namespace App\Http\Controllers;

use App\Models\Model;
use App\Policies\ModelPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class ModelPieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($existingPieces = null)
    {
        return Inertia::render('Model/Piece/Index', [
            'pieces' => Model::query()
                ->when(Request()->input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->whereNotNull('compose_id')->with(['constructor', 'type', 'materials', 'pieces', 'compatibles'])->get(),
            'existingPieces' => $existingPieces
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
        $this->authorize('create', Model::class);
        /**
         * 0 constructor_id
         * 1 model_id
         * 2 model_name
         * 3 type_id
         * 4 creation_year
         * 5 has_electro
         * 6 status
         */

        // On vérifie que l'on a bien un fichier
        if ($request->hasFile('file')) {
            // On déplace le fichier dans le dossier public
            $path = '/files';
            $file = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path($path), $file);

            // On ouvre le fichier en "Lecture seule"
            $csvFile = fopen(base_path("public/files/" . $file), "r");
            // Boolean qui servira a éviter de lire la première ligne (en-tête du fichier csv)
            $firstline = true;

            // On supprime tout les éléments de la table csv_pieces
            DB::table('csv_pieces')->truncate();
            
            // On parcourt le fichier ligne par ligne jusqu'à la fin
            while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {

                // On évite la première ligne
                if (!$firstline) {
                    // On insère les éléments dans la table
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
        // On vérifie que le fichier existe dans le dossier public
        if (File::exists(public_path('files/' . $file))) {
            // On supprime le fichier
            File::delete(public_path('files/' . $file));
        }

        // On récupère tout les models de pieces déjà existants
        $modelIds = DB::table('csv_pieces')->pluck('model_id')->toArray();
        // On compare les models de pièces envoyés avec ceux déjà existant pour voir si il y en a identiques
        $existingPieces = Model::whereIn('id', $modelIds)->count();

        if ($existingPieces > 0) {
            // Si il y en a identiques, on le renvoie pour le signaler et demander le choix de l'utilisateur
            return $this->index($existingPieces);
        } else {
            // Sinon on renvoie un message de succès
            return to_route('models.pieces.index')->with('success', 'Le fichier a été importé avec succés ! Importez le fichier CSV pour les matériels associés pour afficher les pièces.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model $model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Model $model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $model)
    {
        //
    }

    public function forceUpdate()
    {
        // ! À revoir
        DB::table('models')
            ->join('csv_pieces', 'models.id', '=', 'csv_pieces.model_id')
            ->update([
                'models.name' => DB::raw('csv_pieces.model_name'),
                'models.status' => DB::raw('csv_pieces.status'),
                'models.has_electro' => DB::raw('csv_pieces.has_electro'),
                'models.creation_year' => DB::raw('csv_pieces.creation_year'),
                'models.constructor_id' => DB::raw('csv_pieces.constructor_id'),
                'models.type_id' => DB::raw('csv_pieces.type_id'),
            ]);
        DB::table('csv_pieces')->truncate();
        return to_route('models.pieces.index')->with('success', 'Le fichier a été importé avec succés');
    }
}

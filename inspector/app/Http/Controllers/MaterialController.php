<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
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
        /**
         * 0 constructor_id
         * 1 model_id
         * 2 model_name
         * 3 type_id
         * 4 creation_year
         * 5 has_electro
         * 6 status
         * 7 site_id
         * 8 piece_id
         */

         $validated = $request->validate([
            'file' => 'required | file | mimes : csv'
        ]);

        $csvFile = fopen(base_path($validated['file']), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {
            if (!$firstline) {
               
                // $materials = Material::firstOrCreate([
                //     'constructor_id' => $data[0],
                //     'model_id' => $data[1],
                //     'model_name' => $data[2],
                //     'type_id'=> $data[3],
                //     'creation_year'=> $data[4],
                //     'has_electro'=>$data[5],
                //     'status'=>$data[6],
                //     'site_id'=>$data[7],
                //     'piece_id'=>$data[8]
                // ]);

                return $this->index();
            }

            $firstline = false;
        }
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
}

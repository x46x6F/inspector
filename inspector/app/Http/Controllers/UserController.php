<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
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
         * 0 login
         * 1 password
         * 2 role
         * 3 email
         */

        $validated = $request->validate([
            'file' => 'required | file | mimes : csv'
        ]);

        $csvFile = fopen(base_path($validated['file']), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {
            if (!$firstline) {
               
                $user =  User::firstOrCreate([
                    'login' => $data[0],
                    'password' => $data[1],
                    'role' => $data[2],
                    'email'=> $data[3]
                ]);

                return $this->index();
            }

            $firstline = false;
        }
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

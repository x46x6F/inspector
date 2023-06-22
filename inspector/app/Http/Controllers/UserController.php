<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('can:manageUser');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        //TODO : Proteger l'accès à cette méthode pour que seul un Super admin puisse y accéder : policy ou gate ??? 

        $users = User::with('role')->whereRelation('role', 'role', '<>', 'Super admin')->get();
        
        return Inertia::render('Admin/Index', ['users' => $users,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Unused
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
            'file' => 'required | file | mimes: csv'
        ]);

        $csvFile = fopen(base_path($validated['file']), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {
            if (!$firstline) {
                $user =  User::firstOrCreate([
                    'login' => $data[0],
                    'password' => $data[1],
                    'role' => $data[2],
                    'email' => $data[3]
                ]);
                return $this->index();
            }

            $firstline = false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Unused
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Unused
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Unused
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return $this->index();
    }
}

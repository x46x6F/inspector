<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {


        $user = null;
        $sharedData = [
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                ];
            },
        ];
        if ($request->user()) {
            $user = $request->user()->toArray();

            $user['canViewDashboard'] =  $request->user()->canViewDashboard();
            $user['isSuperAdmin'] =  $request->user()->isSuperAdmin();
            $user['canImportData'] = $request->user()->canImportData();
            $sharedData["auth"] = [
                "user" => $user
            ];
        }



        return array_merge(parent::share($request), $sharedData);
    }
}

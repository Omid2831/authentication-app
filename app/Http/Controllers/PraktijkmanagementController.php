<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PraktijkmanagementController extends Controller
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Show Praktijkmanagement dashboard page.
     */
    public function dashboard()
    {
        return Inertia::render('features/Praktijkmanagement/PraktijkmanagementDashboard', ['title' => 'Praktijkmanagement']);
    }
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
        //
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

    /**
     *  manage praktijkmanagement roles.
     */
    public function manageRoles()
    {
        $users  =  $this->userModel->getAllUsersWithPraktijkmanagementRole(Auth::id());

        return Inertia::render('features/Praktijkmanagement/PraktijkmanagementDashboard', [
            'title' => 'Manage Praktijkmanagement Roles',
            'users' => $users,
        ]);
    }
}

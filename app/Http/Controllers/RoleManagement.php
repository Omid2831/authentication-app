<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class RoleManagement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return Inertia::render('features/Roles/RoleManagementDashboard', ['title' => 'Role Management']);
    }

    /**
     * Display the list of users.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role')
        ->where('role' , '!=', 'praktijkmanagement')
        ->get();

        // Return 404 if no users found
        if (!$users) {
            return abort(404, 'Users not found');
        }

        return Inertia::render('features/Roles/RoleManagementDashboard', [
            'users' => $users
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
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'role' => 'required|string|max:20'
        ]); // validate the update the data


        $user = User::findOrfail($id); // Check weather if it fails or not

        $user->role = $validated['role']; // Update the role

        $user->save();  // then dave the user record


        return redirect()->back();  // return us to the overview page


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // check weather the user fails
        $user = User::findOrfail($id);

        // delete the user after finding the id
        $user->delete();

        return redirect()->back();
    }
}

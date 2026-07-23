<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        // Logic to retrieve and display the list of users
        $users = User::all(); // Assuming you have a User model
      
        $data = [
            'users' => $users,
            'active_page' => 'users_list', // Set the active page for highlighting in the sidebar
        ];

        return view('admin.users.index', $data);
    }

    public function edit($id)
    {
        // Logic to retrieve and display the user for editing
        $user = User::findOrFail($id); // Assuming you have a User model

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update the user
        $user = User::findOrFail($id); // Assuming you have a User model

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
           // 'email' => 'required|email|unique:users,email,' ,
            'role' => 'required|string|in:admin,manager,supervisor,customer', // Assuming you have roles like 'admin' and 'user'
           
        ]);

        $user->name = $request->name;
       // $user->email = $request->email;
        $user->role = $request->role;   
        $user->save();
        // Update the user with validated data
        //$user->update($validatedData);

        return redirect()->route('users.list')->with('success', 'User updated successfully.');
    }
}

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
        
        if($request->password != '') {

            $user->password = bcrypt($request->password); // Hash the password before storing
        
        }
        
        
        $user->role = $request->role;   
        $user->save();
        // Update the user with validated data
        //$user->update($validatedData);

        return redirect()->route('users.list')->with('success', 'User updated successfully.');
    }

    public function create()
    {
        // Logic to display the user creation form
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new user
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|in:admin,manager,supervisor,customer', // Assuming you have roles like 'admin' and 'user'
            'password' => 'required|string|min:8', // Assuming you want to set a password for the user
        ]);

        // Create a new user with validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => bcrypt($validatedData['password']), // Hash the password before storing
        ]);

        return redirect()->route('users.list')->with('success', 'User created successfully.');
    }

    public function login()
    {
        // Logic to display the login form
        return view('admin.users.login');
    }

    public function authenticate(Request $request)
    {
        // Logic to authenticate the user
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('admin/dashboard'); // Redirect to the intended page after login
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    } 



}

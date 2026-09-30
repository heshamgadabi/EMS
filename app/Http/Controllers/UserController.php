<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StorefrontUserRequest;


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
        if (auth()->check()) {
            return redirect()->route('admin.dashboard'); // Redirect to the dashboard if already logged in
        }
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


    public function frontSignup()
    {
        // Logic to display the signup form
        if (auth()->check()) {
            return redirect()->route('home'); // Redirect to the Home if already logged in
        }
        return view('front.signup');
    }

    public function frontSignupStore(StorefrontUserRequest $request)
    {
        // Logic to store a new user from the front-end signup form
        // Validate the request data
        /*
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', // Assuming you want to set a password for the user
        ]);
        */




        // Create a new user with validated data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'customer', // Default role for front-end signup users
            'password' => bcrypt($request->password), // Hash the password before storing
        ]);

        // Log in the newly created user
        auth()->login($user);


        return redirect()->route('home')->with('success', 'Account created successfully.');
    }


    public function frontSignin()
    {
        
        // Logic to display the signin form
        
        if (auth()->check()) {
            return redirect()->route('home'); // Redirect to the Home if already logged in
        }

        if (!session()->has('url.intended') && !in_array(url()->previous(), [route('user.signin')])) {
        session(['url.intended' => url()->previous()]);
         }

        return view('front.signin');
        

    }

    public function frontSigninStore(Request $request)
    {
        // Logic to authenticate the user from the front-end signin form
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('home'); // Redirect to the intended page after login
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'])->withInput();
        }
    }
        
    public function frontSignout(Request $request)
    {
        // Logic to log out the user from the front-end
        auth()->logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'تم تسجيل الخروج بنجاح.');
    }


    public function frontProfile()
    {
        // Logic to display the user's profile
        $user = auth()->user(); // Get the currently authenticated user

        
        return view('front.profile', [
            'user' => $user,
        ]);
    }

}

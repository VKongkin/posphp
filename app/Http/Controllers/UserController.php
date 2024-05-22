<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response(
                User::all()
            );
        }
        $users = User::latest()->paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
        ]);
    
        $destinationPath = '';
    
        if ($request->hasFile('profile_image')) {
            // Store the image and get the path
            $destinationPath = $request->file('profile_image')->store('profile_images', 'public');
        }
    
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'profile_image' => $destinationPath,
        ]);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the user.');
        }
    
        // Redirect to index
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Update user data
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        // Delete old avatar if a new one is uploaded
        if ($request->hasFile('profile_image')) {
            // Delete old avatar
            if ($user->profile_image) {
                $destinationPath = public_path('storage/' . $user->profile_image);
                if (File::exists($destinationPath)) {
                    File::delete($destinationPath);
                }
            }

            // Store new avatar
            $destinationPath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $destinationPath;
        }

        if (!$user->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the user.');
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');    
        // $input = $request->all();
        // if ($image = $request->file('profile_image')) {
        //     $destinationPath = 'profile_image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['profile_image'] = "$profileImage";
        // }else{
        //     unset($input['profile_image']);
            
        // }
          
        // $user->update($input);
    
        // return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Check if the authenticated user is trying to delete their own account
        if (Auth::user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        // Delete the user account
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    
    // public function updateProfileImage(Request $request)
    // {
    //     $user = Auth::user();

    //     if ($request->hasFile('profile_image')) {
    //         $image = $request->file('profile_image');
    //         $fileName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('profile_images', $fileName, 'public');

    //         $user->profile_image = $fileName;
    //         $user->save();
    //     }

    //     return redirect()->back()->with('success', 'Profile image uploaded successfully.');
    // }
}

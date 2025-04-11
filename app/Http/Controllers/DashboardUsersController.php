<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    //public function index()
    //{
        //
        
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    //public function create()
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    //public function store(Request $request)
    //{
        //
    //}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'title' => 'User Profile',
            'active' => 'users',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit Profile',
            'active' => 'users',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'phone' => 'required|numeric|digits_between:10,13',
            'gender' => 'required',
            ];
        
        $validatedData = $request->validate($rules);

        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete('public/' . $request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('profile-photos', 'public');
        }

        if($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/users/' . $user->username)->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if (!$user) {
            abort(404, 'User not found');
        }

        // Remove the user's profile photo if it exists
        if($user->photo) {
            Storage::delete('public/' . $user->photo);
        }

        // Disassociate the user from their posts without deleting the posts
        //$user->posts()->update(['user_id' => null]);

        // Delete the user account
        User::destroy($user->id);

        return redirect('/')->with('success', 'User has been deleted!');
    }

    public function userAdmin() {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return view('dashboard.admin.users', [
            'title' => 'All Users',
            'active' => 'Admin Users',
            'users' => $users
        ]);
    }

    public function Adminuseredit(User $user) {
        $this->authorize('update', $user);
        return view('dashboard.admin.edit', [
            'title' => 'Edit Users',
            'active' => 'Admin Users',
            'user' => $user // Add this line to pass the user to the view
        ]);
    }

    public function Adminuserupdate(Request $request, User $user) {
        $this->authorize('update', $user);
        // dd($request->all());
        // // Debugging statement to check if the method is called
        // Log::info('Update method called for user: ' . $user->id);
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'phone' => 'required|digits_between:10,13|numeric',
            'gender' => 'required',
        ];
        
        $validatedData = $request->validate($rules);

        // try {
        //     $validatedData = $request->validate($rules);
        //     // Debugging statement to check if validation passes
        //     Log::info('Validation passed for user: ' . $user->id);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Log validation errors
        //     Log::error('Validation failed for user: ' . $user->id, $e->errors());
        //     return redirect()->back()->withErrors($e->errors())->withInput();
        // }
        
        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete('public/' . $request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('profile-photos', 'public');
        }

        if($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $valid = User::where('id', $user->id)
            ->update($validatedData);

        // // Debugging statement to check if update is successful
        // Log::info('User updated: ' . $user->id);       
            
        if($valid) {
            return redirect()->route('dashboard.admin.users')->with('success', 'User updated successfully!');
        }
        else {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notifications()
    {
        return view('notifications.index');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function updateProfile(User $user)
    {

        $validated = request()->validate([
            'name' => 'required|string|min:3',
            'school_id' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'contact_number' => 'required|string|min:3',
            'birthdate' => 'required',
            'course' => 'required|string|min:3',
            'password' => 'sometimes|nullable|min:6|confirmed',
        ]);

        if($validated['password'] == null){
            unset($validated['password']);
        }

        if($validated['password']){
            $password = $validated['password'];
            $validated['password'] = Hash::make($password);
        }

        $user->update($validated);

        return back()->with('profile_updated','Success');

    }
}

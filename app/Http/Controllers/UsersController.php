<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('active', true)->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(User $user)
    {       
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {

        $validated = request()->validate([
            'name' => 'required|string|min:3',
            'school_id' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'contact_number' => 'required|string|min:3',
            'birthdate' => 'required',
            'account_type' => 'required', 
            'course' => 'required',
        ]);

        // dd($user->verified, $user->borrow_status);
        if(request('verified')){
            $validated['verified'] = true;
        } else {
            $validated['verified'] = false;
        }

        if(request('borrow_status')) {
            $validated['borrow_status'] = true;
        } else {
            $validated['borrow_status'] = false;
        }

        $user->update($validated);

        return redirect('/users')->with('user_updated','Success');
    }

    public function destroy(User $user)
    {
        $user->update([ 'active' => false]);

        return back()->with('user_deleted', 'Success');
    }
}

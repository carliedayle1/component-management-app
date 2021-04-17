<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Room;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store()
    {

        $validated = request()->validate([
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5|max:255',
            'type' => 'required|string',
        ]);
        $validated['id'] = Carbon::now()->format('YmdHis');
        Room::forceCreate($validated);

        return redirect('/rooms')->with('room_created','Success');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Component;
use App\Borrow;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Component $component)
    {
        $validated = request()->validate([
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'reason' => 'required|string|min:5|max:255'
        ]);
        
        $validated['id'] = Carbon::now()->format('YmdHis');
        $validated['user_id'] = Auth::user()->id;
        $validated['component_archive_id'] = $component->id;
        $validated['borrower_name'] = Auth::user()->name;
        $validated['borrower_type'] = Auth::user()->account_type;
        $validated['status'] = 'PENDING';

        $component->update([ 'status' => 'BORROWED']);

        Borrow::forceCreate($validated);

        return redirect('/components')->with('component_borrowed', 'Success');
    }

    public function logs()
    {
        $logs = Borrow::all();

        return view('borrows.index', compact('logs'));
    }

    public function edit(Borrow $borrow)
    {
        return view('borrows.edit', compact('borrow'));
    }

    public function update(Borrow $borrow)
    {
        $validated = request()->validate([
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'reason' => 'required|string|min:5|max:255',
            'status' => 'sometimes|string',
        ]);

        $borrow->update($validated);

        return redirect('/borrowlogs')->with('borrow_updated', 'Success');
    }
}

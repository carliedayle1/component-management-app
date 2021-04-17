<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Component;
use App\Report;
use App\ReportTransaction;
use App\ReportArchive;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function view(Report $report)
    {

        return view('reports.view', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Report $report)
    {
        $validated = request()->validate([
            'issue' => 'required|min:5|max:255|string'
        ]);

        $report->update($validated);
        $reportArchive = ReportArchive::findOrFail($report->id);
        $reportArchive->update($validated);

        $validated['component_id'] = $report->componentArchive->id;
        $validated['user_id'] = Auth::user()->id;
        $validated['report_id'] = $report->id; 
        $validated['submitted_by'] = Auth::user()->name;
        self::storeTransaction($validated, 'UPDATE');

        return redirect('/reports')->with('report_updated','Success');
    }

    public function transactions()
    {
        $transactions = ReportTransaction::all();
        return view('reports.transactions', compact('transactions'));
    }

    public function archives()
    {
        $archives = ReportArchive::where('active', true)->get();
        return view('reports.archive', compact('archives'));
    }

    private function storeTransaction($data, $action)
    {
        $data['id'] = Carbon::now()->format('YmdHis');
        $data['action'] = $action;
        return ReportTransaction::forceCreate($data);
    }

    public function store(Component $component)
    {

        $validate = request()->validate([
            'issue' => 'required|min:3|max:255',
        ]);
        $validate['id'] = Carbon::now()->format('YmdHis');
        $validate['component_id'] = $component->id;
        $validate['user_id'] = Auth::user()->id;
        $validate['submitted_by'] = Auth::user()->name;

        Report::forceCreate($validate);
        ReportArchive::forceCreate($validate);

        $validate['report_id'] = $validate['id'];
        self::storeTransaction($validate, 'STORE');

        return redirect('/reports')->with('report_created',' Success');
    }

    public function destroy(Report $report)
    {
        $reportArchive = ReportArchive::findOrFail($report->id);
        $reportArchive->update([
            'active' => true
        ]);

        $validated['component_id'] = $report->componentArchive->id;
        $validated['user_id'] = Auth::user()->id;
        $validated['report_id'] = $report->id; 
        $validated['submitted_by'] = Auth::user()->name;
        $validated['issue'] = $report->issue;
        self::storeTransaction($validated, 'DELETE');

        $report->delete();

        return redirect('/reports')->with('report_deleted', 'Success');

    }

    public function restore(ReportArchive $archive)
    {

        $data = [
            'id' => $archive->id,
            'component_id' => $archive->component_id,
            'user_id' => $archive->user_id,
            'issue' => $archive->issue,
            'submitted_by' =>  $archive->submitted_by,
        ];

        $archive->update(['active' => false]);
        Report::forceCreate($data);

        $data['report_id'] = $data['id'];
        self::storeTransaction($data, 'RESTORE');

        return redirect('/reports')->with('report_restored','Success');

    }   
}

<?php

namespace App\Http\Controllers;

use App\Models\Rewinding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class RewindingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        $shifts = DB::table('shifts')->get();
        $machine = DB::table('machine')->get();
        $operator = DB::table('users')->where('role_id',5)->get();

        return view('rewinding.index', compact('categories', 'products','shifts','machine','operator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // dd($request->all());
    $validated = $request->validate([
        'rewind_date' => 'required|date',
        'shift_id' => 'required|integer',
        'operator_id' => 'required|exists:users,id',
        // 'jobcard_id' => 'required|exists:jobcards,id',
        'jobcard_id' => 'required',
        'machine_id' => 'required|exists:machine,id',
    ]);
    $validated['status'] = "1";

    Rewinding::create($validated);
        return response()->json(['status' => true, 'message' => 'Rewinding record created successfully.']);

}

    /**
     * Display the specified resource.
     */
    public function created_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Rewinding::with(['user', 'operator', 'jobcard', 'machine'])->where('rewindings.status',1)->select('rewindings.*');
            return DataTables::of($data)
                ->addColumn('user', fn ($row) => $row->user->name ?? '-')
                ->addColumn('operator', fn ($row) => $row->operator->name ?? '-')
                ->addColumn('jobcard', fn ($row) => $row->jobcard->jobcard_no ?? '-')
                ->addColumn('machine', fn ($row) => $row->machine->name ?? '-')
                ->editColumn('status', function ($row) {
                    $statusLabels = [
                        1 => 'Created',
                        2 => 'In-Progres',
                        3 => 'Completed',
                        4 => 'Cancelled',

                    ];

                    $badgeColors = [
                    
                        1 => 'info',
                        2 => 'warning',
                        3 => 'success',
                        3 => 'danger',
                    ];

                    return '<span class="badge bg-' . ($badgeColors[$row->status] ?? 'dark') . '">' . ($statusLabels[$row->status] ?? 'Unknown') . '</span>';
                })
                ->addColumn('action', function ($row) {
    return '
    <div class="d-flex gap-2 justify-content-center">
        <button type="button" class="btn btn-sm btn-outline-primary" title="Move to Issued">
            <i class="bi bi-send-check"></i> Issue
        </button>
        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit">
            <i class="bi bi-pencil-square"></i> Edit
        </button>
        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete">
            <i class="bi bi-trash"></i> Delete
        </button>
    </div>';
})

                ->rawColumns(['status','action']) // Required to render badge HTML
                ->make(true);
        }
    }

    public function inprogress_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Rewinding::with(['user', 'operator', 'jobcard', 'machine'])->where('rewindings.status',2)->select('rewindings.*');
            return DataTables::of($data)
                ->addColumn('user', fn ($row) => $row->user->name ?? '-')
                ->addColumn('operator', fn ($row) => $row->operator->name ?? '-')
                ->addColumn('jobcard', fn ($row) => $row->jobcard->jobcard_no ?? '-')
                ->addColumn('machine', fn ($row) => $row->machine->name ?? '-')
                ->editColumn('status', function ($row) {
                    $statusLabels = [
                        1 => 'Created',
                        2 => 'In-Progres',
                        3 => 'Completed',
                        4 => 'Cancelled',

                    ];

                    $badgeColors = [
                    
                        1 => 'info',
                        2 => 'warning',
                        3 => 'success',
                        3 => 'danger',
                    ];

                    return '<span class="badge bg-' . ($badgeColors[$row->status] ?? 'dark') . '">' . ($statusLabels[$row->status] ?? 'Unknown') . '</span>';
                })
                    ->addColumn('action', function ($row) {
                        return '<a href="#" 
   class="btn btn-sm btn-primary me-1" 
   data-bs-toggle="modal" 
   data-bs-target="#completeModal">
   ✏️ Move to complete
</a>
                    
                        
                        ';
                })

                ->rawColumns(['status','action']) // Required to render badge HTML
                ->make(true);
        }
    }

    public function completed_list(Request $request)
    {

        if ($request->ajax()) {
            $data = Rewinding::with(['user', 'operator', 'jobcard', 'machine'])->where('rewindings.status',3)->select('rewindings.*');
            return DataTables::of($data)
                ->addColumn('user', fn ($row) => $row->user->name ?? '-')
                ->addColumn('operator', fn ($row) => $row->operator->name ?? '-')
                ->addColumn('jobcard', fn ($row) => $row->jobcard->jobcard_no ?? '-')
                ->addColumn('machine', fn ($row) => $row->machine->name ?? '-')
                ->editColumn('status', function ($row) {
                    $statusLabels = [
                        1 => 'Created',
                        2 => 'In-Progres',
                        3 => 'Completed',
                        4 => 'Cancelled',

                    ];

                    $badgeColors = [
                    
                        1 => 'info',
                        2 => 'warning',
                        3 => 'success',
                        4 => 'danger',
                    ];

                    return '<span class="badge bg-' . ($badgeColors[$row->status] ?? 'dark') . '">' . ($statusLabels[$row->status] ?? 'Unknown') . '</span>';
                })
                    ->addColumn('action', function ($row) {

                         return '<a href="#" 
   class="btn btn-sm btn-primary me-1" 
   data-bs-toggle="modal" 
   data-bs-target="#MovetoProduction">
   📃 Move 
</a>';
                })

                ->rawColumns(['status','action']) // Required to render badge HTML
                ->make(true);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rewinding $rewinding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rewinding $rewinding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rewinding $rewinding)
    {
        //
    }
}

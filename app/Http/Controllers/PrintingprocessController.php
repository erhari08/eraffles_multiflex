<?php

namespace App\Http\Controllers;

use App\Models\Printingprocess;
use Illuminate\Http\Request;
use App\Models\Jobcard;
use Illuminate\Support\Facades\DB;
use DataTables;

class PrintingprocessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
            $products = DB::table('products')->get();
         if ($request->ajax()) {
        $data = Jobcard::query();

        return DataTables::of($data)
            ->addColumn('printing', function ($row) {
                $printing = json_decode($row->printing, true);
                if (!$printing) return '-';

     $html = "<div class='table-responsive'>";
$html .= "<table class='table table-bordered table-striped table-sm mb-0'>";
$html .= "<thead class='table-primary text-center'>";
$html .= "<tr>
    <th>Material</th>
    <th>Colors</th>
    <th>Cylinder</th>
    <th>Skills</th>
    <th>Film Qty</th>
    <th>Solvents</th>
    <th>Solvent Qty</th>
    <th>Fresh Ink</th>
    <th>Fresh Ink Qty</th>
    <th>Mixed Ink</th>
    <th>Mixed Ink Qty</th>
</tr>";
$html .= "</thead><tbody><tr>";

$html .= "<td>" . (is_array($printing['material_list'] ?? null) ? implode(', ', $printing['material_list']) : ($printing['material_list'] ?? '-')) . "</td>";
$html .= "<td>" . ($printing['noofcolors'] ?? '-') . "</td>";
$html .= "<td>" . ($printing['cyclinder'] ?? '-') . "</td>";
$html .= "<td>" . implode(', ', $printing['skills'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_film_qty'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_solvents'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_solvents_qty'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_freshink'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_freshink_qty'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_mixedink'] ?? []) . "</td>";
$html .= "<td>" . implode(', ', $printing['material_mixedink_qty'] ?? []) . "</td>";

$html .= "</tr></tbody></table></div>";

                return $html;
            })
           ->addColumn('lamination', function ($row) {
    $data = json_decode($row->lamination, true);
    if (!$data) return '-';

    $html = "<div class='table-responsive'>";
    $html .= "<table class='table table-bordered table-striped table-sm mb-0'>";
$html .= "<thead class='table-primary text-center'>";
$html .= "<tr>

                <th>Roll Qty</th>
                <th>Solvent</th>
                <th>Solvent Qty</th>
                <th>Radio</th>
              </tr></thead><tbody><tr>";

    $html .= "<td>" . implode(', ', $data['lamin_roll_qty'] ?? []) . "</td>";
    $html .= "<td>" . implode(', ', $data['lamin_solvent'] ?? []) . "</td>";
    $html .= "<td>" . implode(', ', $data['lamin_solvent_qty'] ?? []) . "</td>";
    $html .= "<td>" . ($data['lamin_inlineRadioOptions'] ?? '-') . "</td>";

    $html .= "</tr></tbody></table></div>";
    return $html;
})
           ->addColumn('folding', function ($row) {
    $data = json_decode($row->folding, true);
    if (!$data) return '-';

    $html = "<div class='table-responsive'>";
       $html .= "<table class='table table-bordered table-striped table-sm mb-0'>";
$html .= "<thead class='table-primary text-center'>";
$html .= "<tr>
                <th>Roll Qty</th>
                <th>Radio</th>
              </tr></thead><tbody><tr>";

    $html .= "<td>" . implode(', ', $data['fold_roll_qty'] ?? []) . "</td>";
    $html .= "<td>" . ($data['fold_inlineRadioOptions'] ?? '-') . "</td>";

    $html .= "</tr></tbody></table></div>";
    return $html;
})
           ->addColumn('pouching', function ($row) {
    $data = json_decode($row->pouching, true);
    if (!$data) return '-';

    $html = "<div class='table-responsive'>";
       $html .= "<table class='table table-bordered table-striped table-sm mb-0'>";
$html .= "<thead class='table-primary text-center'>";
$html .= "<tr>
                <th>Roll Qty</th>
                <th>Radio</th>
                <th>Tape</th>
              </tr></thead><tbody><tr>";

    $html .= "<td>" . implode(', ', $data['pouch_roll_qty'] ?? []) . "</td>";
    $html .= "<td>" . ($data['pouch_inlineRadioOptions'] ?? '-') . "</td>";
    $html .= "<td>" . ($data['pouch_inlineTapeOptions'] ?? '-') . "</td>";

    $html .= "</tr></tbody></table></div>";
    return $html;
})
->editColumn('status', function ($row) {
                    $statusLabels = [
                        
                        1 => 'New',
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

                       return '
    <div class="d-flex gap-2">

        <button type="button" class="btn btn-sm btn-outline-primary"  title="Move to Issued">
            <i class="bi bi-send-check"></i> Issue
        </button>
        
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Edit">
            <i class="bi bi-pencil-square"></i> Edit
        </button>
        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete">
            <i class="bi bi-trash"></i> Delete
        </button>
    </div>';
                    
                        // return '<a href="#" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#MovetoProduction">
                        //      <i class="fas fa-cog fa-spin text-white"></i> Move to Production </a>';
                })

            ->rawColumns(['printing', 'lamination', 'folding', 'pouching','status','action'])
            ->make(true);
    }
        return view('printingprocess.index');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printingprocess $printingprocess)
    {
        //
    }
}

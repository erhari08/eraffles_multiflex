<?php

namespace App\Http\Controllers;
use DataTables;

use App\Models\Jobcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {   
        
    // }

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
                    
                        return '<a href="#" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#MovetoProduction">
                             <i class="fas fa-cog fa-spin text-white"></i> Move to Production </a>';
                })

            ->rawColumns(['printing', 'lamination', 'folding', 'pouching','status','action'])
            ->make(true);
    }
                return view('jobcards.index', compact('categories', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(Request $request)
{
    
    $validated = $request->validate([
        'job_name' => 'required|string',
        'tot_kgs' => 'nullable|string',
        'wastage' => 'nullable|string',
        'total' => 'nullable|string',
        'formOfOutput' => 'nullable|string',
        'wtperpouch' => 'nullable|string',
        'tot_roll_wt' => 'nullable|string',
    ]);

    // Build JSON structures from raw input
    $printing = [
        'material_list' => $request->input('material_list'),
        'noofcolors' => $request->input('noofcolors'),
        'cyclinder' => $request->input('cyclinder'),
        'skills' => $request->input('skills'),
        'material_film_qty' => $request->input('material_film_qty'),
        'material_solvents' => $request->input('material_solvents'),
        'material_solvents_qty' => $request->input('material_solvents_qty'),
        'material_freshink' => $request->input('material_freshink'),
        'material_freshink_qty' => $request->input('material_freshink_qty'),
        'material_mixedink' => $request->input('material_mixedink'),
        'material_mixedink_qty' => $request->input('material_mixedink_qty'),
    ];

    $lamination = [
        'lamin_roll_qty' => $request->input('lamin_roll_qty'),
        'lamin_solvent' => $request->input('lamin_solvent'),
        'lamin_solvent_qty' => $request->input('lamin_solvent_qty'),
        'lamin_inlineRadioOptions' => $request->input('lamin_inlineRadioOptions'),
    ];

    $folding = [
        'fold_roll_qty' => $request->input('fold_roll_qty'),
        'fold_inlineRadioOptions' => $request->input('fold_inlineRadioOptions'),
    ];

    $pouching = [
        'pouch_roll_qty' => $request->input('pouch_roll_qty'),
        'pouch_inlineRadioOptions' => $request->input('pouch_inlineRadioOptions'),
        'pouch_inlineTapeOptions' => $request->input('pouch_inlineTapeOptions'),
    ];

    $jobcardNo = 'JC-' . date('Ymd') . '-' . str_pad(Jobcard::count() + 1, 4, '0', STR_PAD_LEFT);

    // Save to DB
    $jobcard = Jobcard::create([
        'jobcard_no' => $jobcardNo,
        'job_name' => $validated['job_name'],
        'tot_kgs' => $validated['tot_kgs'],
        'wastage' => $validated['wastage'],
        'total' => $validated['total'],
        'formOfOutput' => $validated['formOfOutput'],
        'wtperpouch' => $validated['wtperpouch'],
        'tot_roll_wt' => $validated['tot_roll_wt'],
        'printing' => json_encode($printing),
        'lamination' => json_encode($lamination),
        'folding' => json_encode($folding),
        'pouching' => json_encode($pouching),
    ]);
    // dd($jobcard);

    return response()->json(['success' => true, 'data' => $jobcard]);
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
    public function show(Jobcard $jobcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobcard $jobcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobcard $jobcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobcard $jobcard)
    {
        //
    }

    public function get_material_details(Request $request){

      $product_lists=DB::table('grn_materials')->where('product_id',$request->id)->get()->toArray();
          $product_data='<select id="product_list" name="skills[]" class="form-control" >';
          $product_data.='<option selected disabled>----choose-----</option>';
      foreach($product_lists as $key => $value) {
        $product_data.='<option value="'.$value->id.'">'.$value->specification.'</option>';
      }
        $product_data.= "</select>";
        return ['product_data'=>$product_data];

    }

    public function get_material_stock(Request $request){
         $product_item=DB::table('grns')->where('id',$request->id)->first();
         if($product_item){

          $totproduct_qty=DB::table('grns')->where('product_id',$product_item->product_id)->where('specification',$product_item->specification)->sum('qty');
        
        return ['totproduct_qty'=>$totproduct_qty];

         }
         

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\GrnMaterial; // make sure the model exists
use App\Models\Grn;
use Illuminate\Http\Request;
use DataTables;

class GrnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        return view('goods-receipt-notes.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function getGrnData(Request $request)
{
    if ($request->ajax()) {
        $data = GrnMaterial::join('grns', 'grn_materials.grns_id', '=', 'grns.id')
            ->join('products', 'grn_materials.product_id', '=', 'products.id')
            ->join('categories', 'grn_materials.category_id', '=', 'categories.id')
            ->select([
                'grns.grn_number',
                'grns.grn_date',
                'grns.supplier_name',
                'grns.grn_doc',
                'grn_materials.specification',
                'grn_materials.qty',
                'grn_materials.unit',
                'grn_materials.rate_per_unit',
                'grn_materials.gst',
                'grn_materials.amount',
                'products.name as product_name',
                'categories.name as category_name',
            ]);

        return DataTables::of($data)
            ->addColumn('grn_doc_view', function ($row) {
                if ($row->grn_doc) {
                    $url = asset('storage/' . $row->grn_doc);
                    return '<a href="' . $url . '" target="_blank">📄 View</a>';
                }
                return 'N/A';
            })
            ->rawColumns(['grn_doc_view']) // allow HTML in this column
            ->make(true);
    }
}


 

public function store(Request $request)
{
    //  dd($request->all());
    // Optional: validate request
    $request->validate([
        'grn_date' => 'required|date',
        'grn_number' => 'required|string',
        'supplier_invoice_no' => 'required|string',
        'supplier_invoice_date' => 'required|date',
        'supplier_name' => 'required|string',
        'supplier_address' => 'required|string',
        'grn_file' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
        'product_id' => 'required|array',
        'category_id' => 'required|array',
        'specification' => 'required|array',
        'qty' => 'required|array',
        'unit' => 'required|array',
        'rate_per_unit'=>'required|array',
        'gst' => 'required|array',
        'amount' => 'required|array',
    ]);

    // Store file if present
    $filePath = null;
    if ($request->hasFile('grn_file')) {
        $filePath = $request->file('grn_file')->store('uploads/grns', 'public');
    }

    // Create GRN entry
    $grn = Grn::create([
        'grn_date' => $request->grn_date,
        'grn_number' => $request->grn_number,
        'supplier_invoice_no' => $request->supplier_invoice_no,
        'supplier_invoice_date' => $request->supplier_invoice_date,
        'supplier_name' => $request->supplier_name,
        'supplier_address' => $request->supplier_address,
        'grn_doc' => $filePath,
    ]);

    // Store materials (loop through array inputs)
    foreach ($request->product_id as $i => $productId) {
        GrnMaterial::create([
            'grns_id' => $grn->id,
            'product_id' => $productId,
            'category_id' => $request->category_id[$i],
            'specification' => $request->specification[$i],
            'qty' => $request->qty[$i],
            'unit' => $request->unit[$i],
            'rate_per_unit'=>$request->rate_per_unit[$i],
            'gst' => $request->gst[$i],
            'amount' => $request->amount[$i],
        ]);
    }

    return response()->json(['message' => 'GRN saved successfully']);
}


    public function update(Request $request, $id)
    {
        $grn = Grn::findOrFail($id);
        $grn->update($request->all());
        return response()->json(['success' => true, 'message' => 'GRN updated!']);
    }

    public function destroy($id)
    {
        Grn::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'GRN deleted!']);
    }

    public function show($id)
    {
        $grn = Grn::with(['product', 'category'])->findOrFail($id);
        return response()->json($grn);
    }


  
}

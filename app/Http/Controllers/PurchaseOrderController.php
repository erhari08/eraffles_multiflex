<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\POMaterial;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderMaterial;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
         return view('purchase-orders.index', compact('categories', 'products'));


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

 



public function list(Request $request)
{
    if ($request->ajax()) {
        $data = PurchaseOrder::select([

            'id', 'po_no', 'po_date', 'customer_name',
            'work_order_ref', 'quotation_ref', 'supplier_gstin',
            'state_name', 'state_code', 'place_of_supply', 'po_doc'
        ]);

        return DataTables::of($data)
            
             ->addColumn('po_doc', function ($row) {
                if ($row->po_doc) {
                    $url = asset('storage/' . $row->po_doc);
                    return '<a href="' . $url . '" target="_blank">📄 View</a>';
                }
                return 'N/A';
            })
          
            ->rawColumns(['po_doc'])
            ->make(true);
    }
}

  

public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'customer_name' => 'required|string',
        'po_no' => 'required|string',
        'po_date' => 'required|date',
        'work_order_ref' => 'nullable|string',
        'quotation_ref' => 'nullable|string',
        'state_name' => 'required|string',
        'state_code' => 'required|string',
        'place_of_supply' => 'required|string',
        'gstin' => 'required|string',
        'po_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'product_id.*' => 'required|exists:products,id',
        'product_spec.*' => 'nullable|string',
        'qty.*' => 'required|numeric|min:0',
        'unit.*' => 'required|string',
        'rate_per_unit.*' => 'required|numeric|min:0',
        'gst.*' => 'required|numeric|min:0',
        'total_amount.*' => 'required|numeric|min:0',
    ]);

    try {
        \DB::beginTransaction();

        // File Upload
        $filePath = null;
        if ($request->hasFile('po_file')) {
            $filePath = $request->file('po_file')->store('purchase_orders', 'public');
        }

        // Create Purchase Order
        $po = PurchaseOrder::create([
            'customer_name'     => $request->customer_name,
            'po_no'             => $request->po_no,
            'po_date'           => $request->po_date,
            'work_order_ref'    => $request->work_order_ref,
            'quotation_ref'     => $request->quotation_ref,
            'state_name'        => $request->state_name,
            'state_code'        => $request->state_code,
            'place_of_supply'   => $request->place_of_supply,
            'supplier_GSTIN'             => $request->gstin,
            'po_doc'           => $filePath,
        ]);

        // Store Materials
       foreach ($request->product_id as $i => $productId) {
  POMaterial::create([
        'po_id'            => $po->id, // ✅ Important line
        'product_id'       => $productId,
        'specification'    => $request->product_spec[$i],
        'qty'              => $request->qty[$i],
        'unit'             => $request->unit[$i],
        'rate_per_unit'    => $request->rate_per_unit[$i],
        'gst'              => $request->gst[$i],
        'amount'           => $request->total_amount[$i],
    ]);
}

        \DB::commit();
        return response()->json(['status' => true, 'message' => 'PO submitted successfully.']);

    } catch (\Exception $e) {
        \DB::rollback();
        return response()->json(['status' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}

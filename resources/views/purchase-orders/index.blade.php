@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Purchase Order')
@section('content_header_title', 'Purchase Order')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')




    <div class="container-fluid">
        <div class="card card-primary card-outline"
            style="border-top: 5px solid #462A75; max-height: 90vh; display: flex; flex-direction: column;">
            <div class="card-body overflow-auto" style="flex: 1 1 auto;">
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
                            📤 Upload PO Document
                        </h5>
                        <input type="file" class="form-control" id="po_file" name="po_file"
                            accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                </div>

                <div class="row">
                    <!-- Left Column: Form -->
                    <div class="col-lg-6 border-end">
                        <h4 class="bg-light border-start border-4 border-success ps-3 py-2 rounded fw-bold mb-4">
                            📝 PO Details
                        </h4>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Customer Name</label>

                                <input type="text" class="form-control" value="179/PM/25-26">
                            </div>
                        </div>
                        <div class="row mb-4">

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">PO No.</label>
                                <input type="text" class="form-control" value="179/PM/25-26">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Date</label>
                                <input type="date" class="form-control" value="2025-07-07">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Work Order Ref</label>
                                <input type="text" class="form-control" value="179/PM/25-26">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Quotation Ref.</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <!-- State, GST, PAN -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">State Name</label>
                                <input type="text" class="form-control" value="Puducherry">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">State Code</label>
                                <input type="text" class="form-control" value="34">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Place of Supply</label>
                                <input type="text" class="form-control" value="Puducherry">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Supplier's GSTIN</label>
                                <input type="text" class="form-control" value="34AAOFM0725A1ZR">
                            </div>
                        </div>

                        <div
                            class="d-flex justify-content-between align-items-center mt-4 mb-4 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                            <h5 class="mb-0 fw-semibold">📦 Product Details</h5>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addRowBtn">
                                ➕ Add Row
                            </button>
                        </div>

                      <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
    <table class="table table-bordered align-middle" id="productTable" style="min-width: 1200px;">
        <thead class="table-light">
            <tr>
                <th>Product Name</th>
                <th>Specification</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Rate/Unit</th>
                <th>GST</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="product_name[]" class="form-control" placeholder="Product Name" style="min-width: 150px;"></td>
                <td><input type="text" name="product_spec[]" class="form-control" placeholder="Specification" style="min-width: 180px;"></td>
                <td><input type="number" name="qty[]" class="form-control" min="0" step="any" style="min-width: 100px;"></td>
                <td>
                    <select name="unit[]" class="form-select" style="min-width: 100px;">
                        <option value="Kgs">Kgs</option>
                        <option value="Nos">Nos</option>
                        <option value="Mtrs">Mtrs</option>
                    </select>
                </td>
                <td><input type="number" name="rate_per_unit[]" class="form-control" min="0" step="any" style="min-width: 120px;"></td>
                <td><input type="number" name="gst[]" class="form-control" min="0" step="any" style="min-width: 80px;"></td>
                <td><input type="number" name="total_amount[]" class="form-control" min="0" step="any" style="min-width: 140px;"></td>
                <td class="text-center" style="min-width: 80px;">
                    <button type="button" class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>



                    </div>

                    <!-- Right Column: Preview -->
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <h5 class="bg-light border-start border-4 border-info ps-3 py-2 rounded fw-semibold mb-3">
                            📑 PO File Preview
                        </h5>
                        <iframe id="poPreview" class="w-100 border rounded shadow-sm"
                            style="height: 85vh; display: none;"></iframe>
                    </div>
                </div>




            </div>
            <div class="card-footer text-end">
                <button type="submit" form="grnForm" class="btn text-white" style="background-color: #462A75;">
                    <i class="fas fa-save me-1"></i> Create Job
                </button>
            </div>
        </div>

    </div>









@stop

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

@push('js')
    <!-- Dynamic Row & File Preview Script -->
    <script>
        $(document).ready(function() {
            // File Preview
            $('#po_file').change(function() {
                const file = this.files[0];
                if (!file) return;

                const preview = $('#poPreview');
                const fileURL = URL.createObjectURL(file);
                preview.attr('src', fileURL).show();
            });


        });
    </script>
@endpush

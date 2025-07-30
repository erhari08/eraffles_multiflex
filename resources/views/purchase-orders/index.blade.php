@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Purchase Order')
@section('content_header_title', 'Purchase Order')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')


    <div class="container-fluid px-2">
        <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
            <div class="card-body overflow-auto" style="flex: 1 1 auto;">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add PO
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">📝 Purchase Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form id="poForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- Upload Section -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5
                                                class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
                                                📤 Upload PO Document
                                            </h5>
                                            <input type="file" class="form-control" id="po_file" name="po_file"
                                                accept=".pdf,.jpg,.jpeg,.png">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Left: Form -->
                                        <div class="col-lg-6 border-end pe-lg-4">
                                            <h5
                                                class="bg-light border-start border-4 border-success ps-3 py-2 rounded fw-bold mb-4">
                                                📝 PO Details
                                            </h5>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control"
                                                    value="179/PM/25-26">
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">PO No.</label>
                                                    <input type="text" name="po_no" class="form-control"
                                                        value="179/PM/25-26">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Date</label>
                                                    <input type="date" name="po_date" class="form-control"
                                                        value="2025-07-07">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Work Order Ref</label>
                                                    <input type="text" name="work_order_ref" class="form-control"
                                                        value="179/PM/25-26">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Quotation Ref.</label>
                                                    <input type="text" name="quotation_ref" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">State Name</label>
                                                    <input type="text" name="state_name" class="form-control"
                                                        value="Puducherry">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">State Code</label>
                                                    <input type="text" name="state_code" class="form-control"
                                                        value="34">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label fw-semibold">Place of Supply</label>
                                                    <input type="text" name="place_of_supply" class="form-control"
                                                        value="Puducherry">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label fw-semibold">Supplier's GSTIN</label>
                                                    <input type="text" name="gstin" class="form-control"
                                                        value="34AAOFM0725A1ZR">
                                                </div>
                                            </div>

                                            <!-- Product Table -->
                                            <div
                                                class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded mb-3">
                                                <h5 class="mb-0 fw-semibold">📦 Product Details</h5>
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    id="addRowBtn">➕ Add Row</button>
                                            </div>

                                            <div class="table-responsive mb-4" style="max-height: 300px; overflow-y: auto;">
                                                <table class="table table-bordered align-middle" id="productTable"
                                                    style="min-width: 1100px;">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Specification</th>
                                                            <th>Qty</th>
                                                            <th>Unit</th>
                                                            <th>Rate</th>
                                                            <th>GST</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-select form-select-sm"
                                                                    name="product_id[]">
                                                                    <option disabled selected>--Choose--</option>
                                                                    @foreach ($products as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="product_spec[]"
                                                                    class="form-control"></td>
                                                            <td><input type="number" name="qty[]" class="form-control"
                                                                    min="0"></td>
                                                            <td>
                                                                <select name="unit[]" class="form-select">
                                                                    <option value="Kgs">Kgs</option>
                                                                    <option value="Nos">Nos</option>
                                                                    <option value="Mtrs">Mtrs</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="number" name="rate_per_unit[]"
                                                                    class="form-control" min="0"></td>
                                                            <td><input type="number" name="gst[]" class="form-control"
                                                                    min="0"></td>
                                                            <td><input type="number" name="total_amount[]"
                                                                    class="form-control" min="0"></td>
                                                            <td class="text-center">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Right: File Preview -->
                                        <div class="col-lg-6 mt-4 mt-lg-0">
                                            <h5
                                                class="bg-light border-start border-4 border-info ps-3 py-2 rounded fw-semibold mb-3">
                                                📑 PO File Preview
                                            </h5>
                                            <iframe id="poPreview" class="w-100 border rounded shadow-sm"
                                                style="height: 85vh; display: none;"></iframe>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn text-white" style="background-color: #462A75;">
                                        <i class="fas fa-save me-1"></i> Submit PO
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover nowrap" id="purchaseOrdersTable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>PO No</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Work Order Ref</th>
                                    <th>Quotation Ref</th>
                                    <th>GSTIN</th>
                                    <th>State</th>
                                    <th>State Code</th>
                                    <th>Place of Supply</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                        </table>

                    </div>









                </div>


            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- container-fluid -->











@stop

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

@push('js')
    <!-- Dynamic Row & File Preview Script -->
    <script>
        $(document).ready(function() {
            // Add row
            $('#addRowBtn').click(function() {
                let newRow = `
            <tr>
                 <td>
                <select name="product_id[]" class="form-select form-select-sm">
                    <option value="">--Choose Product--</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
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
        `;
                $('#productTable tbody').append(newRow);
            });

            // Remove row
            $(document).on('click', '.removeRowBtn', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#purchaseOrdersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('po/fetch') }}',
                columns: [{
                        data: 'po_no'
                    },
                    {
                        data: 'po_date'
                    },
                    {
                        data: 'customer_name'
                    },
                    {
                        data: 'work_order_ref'
                    },
                    {
                        data: 'quotation_ref'
                    },
                    {
                        data: 'supplier_gstin'
                    },
                    {
                        data: 'state_name'
                    },
                    {
                        data: 'state_code'
                    },
                    {
                        data: 'place_of_supply'
                    },
                    {
                        data: 'po_doc',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // File Preview
            $('#po_file').change(function() {
                const file = this.files[0];
                if (!file) return;

                const preview = $('#poPreview');
                const fileURL = URL.createObjectURL(file);
                preview.attr('src', fileURL).show();
            });


        });

        $('#poForm').submit(function(e) {
            e.preventDefault();
            let form = $('#poForm')[0];
            let formData = new FormData(form); // for file + input array support
            $.ajax({
                url: '{{ url('po/store') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(res) {
                    alert(res.message);
                    $('#grnForm')[0].reset();
                    fetchGrns();
                }
            });
        });
    </script>
@endpush

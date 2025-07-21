@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Goods-Receipt-Notes')
@section('content_header_title', 'Goods-Receipt-Notes')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')



<div >

    <div class="container-fluid" style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
        <div class="card card-primary card-outline"
            style="border-top: 5px solid #462A75; max-height: 100vh; display: flex; flex-direction: column;">
            <div class="card-body overflow-auto" style="flex: 1 1 auto;">

                <!-- Upload Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
                            📤 Upload GRN Document
                        </h5>
                        <input type="file" class="form-control" id="grn_file" name="grn_file"
                            accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                </div>

                <div class="row">
                    <!-- Left Column: Form -->
                    <div class="col-lg-6 border-end">
                        <h4 class="bg-light border-start border-4 border-success ps-3 py-2 rounded fw-bold mb-4">
                            📝 Good Receipt Note
                        </h4>

                        <form id="grnForm" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="grn_date" class="form-label">GRN Date</label>
                                    <input type="date" class="form-control" id="grn_date" name="grn_date">
                                </div>
                                <div class="col-sm-6">
                                    <label for="grn_number" class="form-label">GRN Number</label>
                                    <input type="text" class="form-control" id="grn_number" name="grn_number">
                                </div>

                                <div class="col-sm-6">
                                    <label for="supplier_invoice_no" class="form-label">Supplier Invoice No</label>
                                    <input type="text" class="form-control" id="supplier_invoice_no"
                                        name="supplier_invoice_no">
                                </div>
                                <div class="col-sm-6">
                                    <label for="supplier_invoice_date" class="form-label">Supplier Invoice
                                        Date</label>
                                    <input type="date" class="form-control" id="supplier_invoice_date"
                                        name="supplier_invoice_date">
                                </div>

                                <div class="col-sm-6">
                                    <label for="supplier_name" class="form-label">Supplier Name</label>
                                    <input type="text" class="form-control" id="supplier_name" name="supplier_name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="supplier_address" class="form-label">Supplier Address</label>
                                    <textarea class="form-control" id="supplier_address" name="supplier_address" rows="2"></textarea>
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
                                <table class="table table-bordered align-middle" id="productTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Specification</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="product_name[]" class="form-control"
                                                    placeholder="Product Name"></td>
                                            <td><input type="text" name="product_spec[]" class="form-control"
                                                    placeholder="Specification"></td>
                                            <td><input type="number" name="qty[]" class="form-control" min="0"
                                                    step="any"></td>
                                            <td>
                                                <select name="unit[]" class="form-select">
                                                    <option value="Kgs">Kgs</option>
                                                    <option value="Nos">Nos</option>
                                                    <option value="Mtrs">Mtrs</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </form>
                    </div>

                    <!-- Right Column: Preview -->
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <h5 class="bg-light border-start border-4 border-info ps-3 py-2 rounded fw-semibold mb-3">
                            📑 GRN File Preview
                        </h5>
                        <iframe id="grnPreview" class="w-100 border rounded shadow-sm"
                            style="height: 85vh; display: none;"></iframe>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" form="grnForm" class="btn text-white" style="background-color: #462A75;">
                    <i class="fas fa-save me-1"></i> Submit GRN
                </button>
            </div>
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
            $('#grn_file').change(function() {
                const file = this.files[0];
                if (!file) return;

                const preview = $('#grnPreview');
                const fileURL = URL.createObjectURL(file);
                preview.attr('src', fileURL).show();
            });

            // Add Row
            $('#addRowBtn').click(function() {
                const newRow = `
                <tr>
                    <td><input type="text" name="product_name[]" class="form-control" placeholder="Product Name"></td>
                    <td><input type="text" name="product_spec[]" class="form-control" placeholder="Specification"></td>
                    <td><input type="number" name="qty[]" class="form-control" min="0" step="any"></td>
                    <td>
                        <select name="unit[]" class="form-select">
                            <option value="Kgs">Kgs</option>
                            <option value="Nos">Nos</option>
                            <option value="Mtrs">Mtrs</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                    </td>
                </tr>
            `;
                $('#productTable tbody').append(newRow);
            });

            // Remove Row
            $(document).on('click', '.removeRowBtn', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endpush

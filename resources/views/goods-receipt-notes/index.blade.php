@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Goods-Receipt-Notes')
@section('content_header_title', 'Goods-Receipt-Notes')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')

    <!-- Button to trigger modal -->

    {{-- {{dd($categories->toArray())}} --}}


    <div class="container-fluid px-2">
        <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
            <div class="card-body overflow-auto" style="flex: 1 1 auto;">

                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold text-dark">📑 GRN Management</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ➕ Add GRN
                    </button>
                </div>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add GRN
                </button> --}}

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">📝 Good Receipt Note</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- Upload Section -->
                                <form id="grnForm" enctype="multipart/form-data">

                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5
                                                class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
                                                📤 Upload GRN Document
                                            </h5>
                                            <input type="file" class="form-control" id="grn_file" name="grn_file"
                                                accept=".pdf,.jpg,.jpeg,.png" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-lg-6 border-end pe-4">
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="grn_date" class="form-label">GRN Date</label>
                                                    <input type="date" class="form-control" id="grn_date"
                                                        name="grn_date">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="grn_number" class="form-label">GRN Number</label>
                                                    <input type="text" class="form-control" id="grn_number"
                                                        name="grn_number">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="supplier_invoice_no" class="form-label">Supplier Invoice
                                                        No</label>
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
                                                    <input type="text" class="form-control" id="supplier_name"
                                                        name="supplier_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="supplier_address" class="form-label">Supplier
                                                        Address</label>
                                                    <textarea class="form-control" id="supplier_address" name="supplier_address" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div
                                                class="d-flex justify-content-between align-items-center mt-4 mb-3 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                <h5 class="mb-0 fw-semibold">📦 Product Details</h5>
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    id="addRowBtn">➕ Add Row</button>
                                            </div>

                                            <div style="overflow-x: auto; max-width: 100%;">
                                                <table class="table table-bordered align-middle w-100" id="productTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th style="min-width: 150px;">Product Name</th>
                                                            <th style="min-width: 120px;">Category</th>
                                                            <th style="min-width: 100px;">Roll No</th>
                                                            <th style="min-width: 150px;">Specification</th>
                                                            <th style="min-width: 100px;">Quantity</th>
                                                            <th style="min-width: 100px;">Unit</th>
                                                            <th style="min-width: 100px;">Rate/Unit</th>
                                                            <th style="min-width: 100px;">GST</th>
                                                            <th style="min-width: 100px;">Amount</th>

                                                            <th style="min-width: 80px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-select form-select-sm"
                                                                    name="category_id[]">
                                                                    <option value="" selected disabled>--Choose--
                                                                    </option>
                                                                    @foreach ($categories->toArray() as $item)
                                                                        <option value="1">{{ $item->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-select-sm"
                                                                    name="product_id[]">
                                                                    <option value="" selected disabled>--Choose--
                                                                    </option>
                                                                    @foreach ($products->toArray() as $item)
                                                                        <option value="1">{{ $item->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="roll_no[]"
                                                                    class="form-control" placeholder="Roll No">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="specification[]"
                                                                    class="form-control" placeholder="lenth x mic">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="qty[]" class="form-control"
                                                                    min="0" step="any">
                                                            </td>

                                                            <td>
                                                                <select name="unit[]" class="form-select">
                                                                    <option value="Kgs">Kgs</option>
                                                                    <option value="Nos">Nos</option>
                                                                    <option value="Mtrs">Mtrs</option>
                                                                </select>
                                                            </td>
                                                            <td>

                                                                <input type="number" name="rate_per_unit[]"
                                                                    class="form-control" min="0" step="any">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="gst[]" class="form-control"
                                                                    min="0" step="any">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="amount[]"
                                                                    class="form-control" min="0" step="any">
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

                            <!-- Right Column -->
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <h5 class="bg-light border-start border-4 border-info ps-3 py-2 rounded fw-semibold mb-3">
                                    📑 GRN File Preview</h5>
                                <iframe id="grnPreview" class="w-100 border rounded shadow-sm"
                                    style="height: 85vh; display: none;"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" form="grnForm" class="btn text-white" style="background-color: #462A75;">
                            <i class="fas fa-save me-1"></i> Submit GRN
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="card-body table-responsive">
                
                <table class="table table-bordered table-hover table-sm align-middle nowrap" id="grnTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>GRN Number</th>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Specification</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Rate/Unit</th>
                            <th>GST</th>
                            <th>Amount</th>
                            <th>View</th>

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

            // $('#productTable').DataTable({
            //     responsive: true,
            // });
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
            <td>
                <select name="product_id[]" class="form-select form-select-sm">
                    <option value="">--Choose Product--</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="category_id[]" class="form-select form-select-sm">
                    <option value="">--Choose Category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="roll_no[]" class="form-control" step="any" placeholder="Roll No"></td>
            <td><input type="text" name="specification[]" class="form-control" placeholder="Specification"></td>
            <td><input type="number" name="qty[]" class="form-control" min="0" step="any" placeholder="Qty"></td>
            <td>
                <select name="unit[]" class="form-select form-select-sm">
                    <option value="Kgs">Kgs</option>
                    <option value="Nos">Nos</option>
                    <option value="Mtrs">Mtrs</option>
                </select>
            </td>
             <td><input type="number" name="rate_per_unit[]" class="form-control" min="0" step="any">
            </td>
            <td><input type="number" name="gst[]" class="form-control" step="any" placeholder="GST %"></td>
            <td><input type="number" name="amount[]" class="form-control" step="any" placeholder="Amount"></td>
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
    <script>
        $(document).ready(function() {
            // fetchGrns();

            $('#grnTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/grns/fetch') }}',
                columns: [{
                        data: 'grn_number'
                    },
                    {
                        data: 'grn_date'
                    },
                    {
                        data: 'supplier_name'
                    },
                    {
                        data: 'category_name'
                    },
                    {
                        data: 'product_name'
                    },
                    {
                        data: 'specification'
                    },
                    {
                        data: 'qty'
                    },
                    {
                        data: 'unit'
                    },
                    {
                        data: 'rate_per_unit'
                    },
                    {
                        data: 'gst'
                    },
                    {
                        data: 'amount'
                    },
                    { data: 'grn_doc_view', orderable: false, searchable: false }, // new

                ]
            });

            $('#grnForm').submit(function(e) {
                e.preventDefault();
                let form = $('#grnForm')[0];
                let formData = new FormData(form); // for file + input array support
                $.ajax({
                    url: '{{ url('grns/store') }}',
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



            // window.deleteGrn = function(id) {
            //     if (confirm('Are you sure?')) {
            //         $.ajax({
            //             url: '/grns/delete/' + id,
            //             type: 'DELETE',
            //             data: {
            //                 _token: '{{ csrf_token() }}'
            //             },
            //             success: function(res) {
            //                 alert(res.message);
            //                 fetchGrns();
            //             }
            //         });
            //     }
            // };

            // window.editGrn = function(id) {
            //     $.get('/grns/show/' + id, function(res) {
            //         // Populate form with res data for editing
            //     });
            // };
        });
    </script>
@endpush

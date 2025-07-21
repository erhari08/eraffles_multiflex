@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Job-Cards')
@section('content_header_title', 'Job-Cards')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')


    <div class="container-fluid px-2 px-md-4" >
        <div class="card card-primary card-outline"
            style="border-top: 5px solid #462A75; max-height: 90vh; display: flex; flex-direction: column;">
           
            <div class="card-body overflow-auto" style="flex: 1 1 auto;">
                <div class="container border rounded p-3 p-md-4">

                    <!-- Section: Job & Operator Details -->
                    <h5 class="bg-light border-start border-4 border-dark ps-3 py-2 rounded fw-semibold mb-4">
                        📋 Job & Operator Details
                    </h5>

                    <!-- Letter for Address Section -->



                    <div class="row g-3 mb-3">
                        <!-- Row 1: Key Details -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Job Name</label>
                            <input type="text" class="form-control" placeholder="Job Name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Material</label>
                            <input type="text" class="form-control" placeholder="PET / BOPP / etc.">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">No. of Colours</label>
                            <input type="number" class="form-control" placeholder="e.g. 6">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Cylinder Circumference</label>
                            <input type="text" class="form-control" placeholder="e.g. 350mm">
                        </div>
                    </div>



                    <div class="row g-3">
                        <!-- Row 3: Signatures -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">👨‍🔧 Operator Name & Signature</label>
                            <input type="text" class="form-control" placeholder="Operator Name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">🧑‍🔧 Assistant Name & Signature</label>
                            <input type="text" class="form-control" placeholder="Assistant Name">
                        </div>
                    </div>


                    <!-- Section 2: Film Input & Output -->
                    <div class="row mt-4">
                        <div
                            class="d-flex justify-content-between align-items-center mt-4 mb-4 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                            <h5 class="mb-0 fw-semibold">
                                🎞️ Input & Output of Film
                            </h5>
                            <button class="btn btn-sm btn-outline-primary" onclick="addRow('inouttableBody')">➕ Add
                                Row</button>

                            {{-- <button type="button" class="btn btn-sm btn-outline-primary" onclick="inoutaddRowBtn()" id="inoutaddRowBtn">
                                ➕ Add Row
                            </button> --}}
                        </div>


                        <div class="table-responsive">
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered text-center align-middle" id="dataTable">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th colspan="6">INPUT</th>
                                            <th colspan="4">OUTPUT</th>
                                            <th colspan="3">WASTE</th>
                                            <th rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                            <th>Roll No</th>
                                            <th>Size (MM x Mic)</th>
                                            <th>Gross Weight</th>
                                            <th>Core Weight</th>
                                            <th>Net Wt of Consumed Material</th>
                                            <th>Gross wt of Returned Material</th>

                                            <th>Roll No</th>
                                            <th>Net Wt</th>
                                            <th>Plain Film Waste</th>
                                            <th>Setting Waste</th>

                                            <th>Plain Film Waste</th>
                                            <th>Setting Waste</th>
                                            <th>Ink Gain</th>
                                        </tr>
                                    </thead>
                                    <tbody id="inouttableBody">
                                        <tr>
                                            <td><input class="form-control" type="text" /></td>
                                            <td><input class="form-control" type="text" /></td>
                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="text" /></td>
                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>

                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>

                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>
                                            <td><input class="form-control" type="number" /></td>

                                            <td>
                                                <button class="btn btn-sm"
                                                    onclick="deleteRow(this, 'inouttableBody')">❌</button>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                    <!-- Section 3: Mixed & Fresh Ink -->
                    <div class="row mt-4">
                        <div class="col-md-6">

                            <div
                                class="d-flex justify-content-between align-items-center mt-4 mb-4 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                <h5 class="mb-0 fw-semibold">
                                    🎨 Mixed Inks
                                </h5>
                                <button class="btn btn-sm btn-outline-primary" onclick="addRow('mixinktableBody')">➕ Add
                                    Row</button>


                            </div>


                            <table class="table table-bordered text-center align-middle" id="mixinktable">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Colour</th>
                                        <th>Issued</th>
                                        <th>Returned</th>
                                        <th>Consumed</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody id="mixinktableBody">
                                    <tr>
                                        <td><input class="form-control" type="text"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td>
                                            <button class="btn btn-sm"
                                                onclick="deleteRow(this, 'mixinktableBody')">❌</button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">


                            <div
                                class="d-flex justify-content-between align-items-center mt-4 mb-4 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                <h5 class="mb-0 fw-semibold">
                                    🧴 Fresh Inks
                                </h5>
                                <button class="btn btn-sm btn-outline-primary" onclick="addRow('inktableBody')">➕ Add
                                    Row</button>


                            </div>

                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-secondary" id="inktable">
                                    <tr>
                                        <th>Colour</th>
                                        <th>Issued</th>
                                        <th>Returned</th>
                                        <th>Consumed</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody id="inktableBody">
                                    <tr>
                                        <td><input class="form-control" type="text"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td>
                                            <button class="btn btn-sm"
                                                onclick="deleteRow(this, 'inktableBody')">❌</button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section 4: Solvents & Signatures -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="bg-light border-start border-4 border-danger ps-3 py-2 rounded fw-semibold mb-3">
                                🧪 Solvent Details
                            </h5>
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Solvent</th>
                                        <th>Issued</th>
                                        <th>Returned</th>
                                        <th>Consumed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-control" type="text" value="Ethyl Acetate"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control" type="text" value="Toluene"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                        <td><input class="form-control" type="number"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
                                🖊️ Remarks & Authorization
                            </h5>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">📝 General Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter any remarks..."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">👨‍🔧 Supervisor</label>
                                    <input class="form-control" type="text" placeholder="Name / Signature">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">🏭 Production Manager</label>
                                    <input class="form-control" type="text" placeholder="Name / Signature">
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end container -->
            </div> <!-- end card-body -->

            <!-- Footer -->
            <div class="card-footer text-end">
                <button type="submit" form="grnForm" class="btn text-white" style="background-color: #462A75;">
                    <i class="fas fa-save me-1"></i> Submit GRN
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
        function addRow(tableBodyId) {
            const tableBody = document.getElementById(tableBodyId);
            const newRow = tableBody.rows[0].cloneNode(true);

            newRow.querySelectorAll('input').forEach(input => input.value = '');
            tableBody.appendChild(newRow);
        }

        function deleteRow(button, tableBodyId) {
            const tableBody = document.getElementById(tableBodyId);
            if (tableBody.rows.length > 1) {
                button.closest('tr').remove();
            } else {
                alert("At least one row is required.");
            }
        }
    </script>
@endpush

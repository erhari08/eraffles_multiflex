@extends('layouts.master')

@section('subtitle', 'Printing')
@section('content_header_title', 'Printing')
@section('content_header_subtitle', '')

@section('content_body')
    <div class="modal fade" id="MovetoProduction" tabindex="-1" aria-labelledby="MovetoProductionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-3 shadow">
                <div class="modal-header bg-purple text-white">
                    <h5 class="modal-title" id="MovetoProductionLabel">
                        <i class="fas fa-industry me-2"></i> Move to Production
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="jobcard_id" id="jobcard_id">

                    <div class="modal-body fs-6">
                        <div class="mb-3">
                            <label for="process_type" class="form-label fw-semibold">Select Process Type:</label>
                            <select class="form-select" name="process_type" id="process_type" required>
                                <option value="">-- Choose Process --</option>
                                <option value="printing">🖨️ Printing</option>
                                <option value="inspection">🔍 Inspection</option>
                                <option value="lamination">🎞️ Lamination</option>
                                <option value="slitting">✂️ Slitting</option>
                                <option value="folding">📄 Folding</option>
                                <option value="pouching">📦 Pouching</option>
                            </select>
                        </div>
                        <p class="text-muted">Are you sure you want to move this job card to the selected production
                            process?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes, Move</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="completeModalLabel">Confirm Completion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Section -->
                    <form id="rewindingForm" enctype="multipart/form-data">
                        <div class="row g-3 mb-4">
                            <div class="col-sm-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="rewind_date" name="rewind_date">
                            </div>
                            <div class="col-sm-4">
                                <label for="shift" class="form-label">Shift</label>
                                <input type="text" class="form-control" id="jobcard_id" name="jobcard_id">

                            </div>
                            <div class="col-sm-4">
                                <label for="machine_no" class="form-label">Machine No</label>
                                <input type="text" class="form-control" id="jobcard_id" name="jobcard_id">

                            </div>

                            <div class="col-sm-6">
                                <label for="operator_name" class="form-label">Operator Name</label>

                                <input type="text" class="form-control" id="jobcard_id" name="jobcard_id">

                            </div>
                            <div class="col-sm-6">
                                <label for="job_order_no" class="form-label">Job Order No</label>
                                <input type="text" class="form-control" id="jobcard_id" name="jobcard_id">
                            </div>
                        </div>

                        <div
                            class="d-flex justify-content-between align-items-center mt-4 mb-3 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                            <h5 class="mb-0 fw-semibold">📄 Details</h5>

                        </div>

                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-bordered align-middle" id="slittingTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Input Roll No</th>
                                        <th>Input Weight (Kgs)</th>
                                        <th>Output Roll No</th>
                                        <th>Output Weight (Kgs)</th>
                                        <th>Width</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="input_roll_no[]" class="form-control"></td>
                                        <td><input type="number" name="input_weight[]" class="form-control"
                                                step="any">
                                        </td>
                                        <td><input type="text" name="output_roll_no[]" class="form-control"></td>
                                        <td><input type="number" name="output_weight[]" class="form-control"
                                                step="any"></td>
                                        <td><input type="text" name="width[]" class="form-control"></td>
                                        <td><input type="text" name="remarks[]" class="form-control"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Yes, Complete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-2">
        <div class="card card-primary card-outline shadow-sm" style="border-top: 5px solid #462A75;">
            <div class="card-body overflow-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold text-dark">📑 Printing Management</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        ➕ Create Printing
                    </button>
                </div>


                <div class="container">

                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-2 fs-5 fw-semibold position-relative" id="home-tab"
                                data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                aria-controls="home" aria-selected="true">
                                📩 Inbox
                                <span
                                    class="badge bg-primary position-absolute top-0 start-100 translate-middle rounded-pill">
                                    3
                                    <span class="visually-hidden">create tasks</span>
                                </span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2 fs-5 fw-semibold position-relative" id="profile-tab"
                                data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                aria-controls="profile" aria-selected="false">
                                📦 In-Progress
                                <span
                                    class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle rounded-pill">
                                    7
                                    <span class="visually-hidden">in-progress tasks</span>
                                </span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-2 fs-5 fw-semibold position-relative" id="contact-tab"
                                data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                aria-controls="contact" aria-selected="false">
                                ✅ Completed
                                <span
                                    class="badge bg-success position-absolute top-0 start-100 translate-middle rounded-pill">
                                    15
                                    <span class="visually-hidden">completed tasks</span>
                                </span>
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content border border-top-0 p-4 bg-white" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm align-middle nowrap"
                                    id="rewindingcreatedTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Jobcard No</th>
                                            <th>Job Name</th>
                                            <th>Total Kgs</th>
                                            <th>Wastage</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Actions</th>


                                            <th>Form of Output</th>
                                            <th>Weight per Pouch</th>
                                            <th>Total Roll Wt</th>

                                            <th>Printing</th>
                                            <th>Lamination</th>
                                            <th>Folding</th>
                                            <th>Pouching</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="d-flex justify-content-between align-items-center mb-3">

                            </div>

                            <!-- Main Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm align-middle nowrap"
                                    id="rewindinginprogressTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Jobcard No</th>
                                            <th>Job Name</th>
                                            <th>Total Kgs</th>
                                            <th>Wastage</th>
                                            <th>Total</th>


                                            <th>Form of Output</th>
                                            <th>Weight per Pouch</th>
                                            <th>Total Roll Wt</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                            <th>Printing</th>
                                            <th>Lamination</th>
                                            <th>Folding</th>
                                            <th>Pouching</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Dynamic rows --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="d-flex justify-content-between align-items-center mb-3">

                            </div>

                            <!-- Main Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm align-middle nowrap"
                                    id="rewindingcompletedTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Jobcard No</th>
                                            <th>Job Name</th>
                                            <th>Total Kgs</th>
                                            <th>Wastage</th>
                                            <th>Total</th>


                                            <th>Form of Output</th>
                                            <th>Weight per Pouch</th>
                                            <th>Total Roll Wt</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                            <th>Printing</th>
                                            <th>Lamination</th>
                                            <th>Folding</th>
                                            <th>Pouching</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Dynamic rows --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal: Create Job-Card -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">
                <div class="modal-header  text-white" style="background-color:#462A75">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">📝 Create Printing</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <div class="container border rounded p-3 p-md-4">

                        <!-- Title -->
                        <h4 class=" rounded fw-bold mb-4 text-center">
                            🖨️ 8 Colour Printing Machine Report
                        </h4>

                        <!-- Section: Job & Operator Details -->
                        <h5 class="bg-light border-start border-4 border-dark ps-3 py-2 rounded fw-semibold mb-4">
                            📋 Job & Operator Details
                        </h5>

                        <!-- Letter for Address Section -->


                        <div class="row g-3 mb-3 align-items-start">
                            <!-- Letter Content (Dotted Box) -->
                            <div class="col-12 col-md-9">
                                <div class="p-3 mt-2"
                                    style="min-height: 150px; border: 3px dotted #f10808; border-radius: 10px; background-color: #f0f795;">

                                    <h5 class="fw-bold text-purple">🧾 Jobcard No: JC/2025/0456</h5>
                                    <h6 class="mb-3 text-dark">Job Name: <span class="fw-semibold text-danger">Premium
                                            Coffee Pouch</span></h6>

                                    <div class="row mb-2">
                                        <div class="col-sm-4"><strong>Total Kgs:</strong> 450</div>
                                        <div class="col-sm-4"><strong>Wastage:</strong> 20</div>
                                        <div class="col-sm-4"><strong>Total Output:</strong> 430</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Form of Output:</strong> Pouch</div>
                                        <div class="col-sm-4"><strong>Weight/Pouch:</strong> 25g</div>
                                        <div class="col-sm-4"><strong>Total Roll Weight:</strong> 120kg</div>
                                    </div>

                                    <hr class="mb-2 mt-1">

                                    <h6 class="text-decoration-underline">📌 Process Flow</h6>
                                    <ul class="mb-0">
                                        <li>🖨️ <strong>Printing:</strong> 4-color front print, Date code: July 2025</li>
                                        <li>🎞️ <strong>Lamination:</strong> Gloss finish, 25-micron BOPP film</li>
                                        <li>📄 <strong>Folding:</strong> Z-fold, 2 inch width</li>
                                        <li>📦 <strong>Pouching:</strong> Stand-up pouch, center seal, tear notch</li>
                                    </ul>
                                </div>
                            </div>
                            

                            <!-- Date & Shift Fields -->
                            <div class="col-12 col-md-3">
                                <div class="mb-2">
                                    <label for="letter_date" class="form-label fw-semibold">📅 Date</label>
                                    <input type="date" id="letter_date" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="letter_shift" class="form-label fw-semibold">🕒 Shift</label>
                                    <input type="text" id="letter_shift" class="form-control"
                                        placeholder="Day / Night">
                                </div>
                            <div class="mb-2">
                                <label class="form-label fw-semibold">👨‍🔧 Operator Name & Signature</label>
                                <input type="text" class="form-control" placeholder="Operator Name">
                            </div>
                            <div class="mb-2">
                                <label class="form-label fw-semibold">🧑‍🔧 Assistant Name & Signature</label>
                                <input type="text" class="form-control" placeholder="Assistant Name">
                            </div>
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

                            </div>


                            <div class="table-responsive">
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered text-center align-middle" id="dataTable">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th colspan="4">INPUT</th>
                                                <th rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                                <th>Roll No</th>
                                                <th>Size (MM x Mic)</th>
                                                <th>Gross Weight</th>
                                                <th>Core Weight</th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody id="inouttableBody">
                                            <tr>
                                                <td><input class="form-control" type="text" /></td>
                                                <td><input class="form-control" type="text" /></td>
                                                <td><input class="form-control" type="number" /></td>
                                                <td><input class="form-control" type="text" /></td>


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
                                    <button class="btn btn-sm btn-outline-primary" onclick="addRow('mixinktableBody')">➕
                                        Add
                                        Row</button>


                                </div>


                                <table class="table table-bordered text-center align-middle" id="mixinktable">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>Colour</th>
                                            <th>Issued</th>
                                           
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody id="mixinktableBody">
                                        <tr>
                                            <td><input class="form-control" type="text"></td>
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
                                           
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody id="inktableBody">
                                        <tr>
                                            <td><input class="form-control" type="text"></td>
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
                                <h5
                                    class="bg-light border-start border-4 border-danger ps-3 py-2 rounded fw-semibold mb-3">
                                    🧪 Solvent Details
                                </h5>
                                <table class="table table-bordered text-center align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>Solvent</th>
                                            <th>Issued</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody id="solventtableBody">
                                        <tr>
                                            <td><input class="form-control" type="text" value="Ethyl Acetate"></td>
                                            <td><input class="form-control" type="number"></td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    onclick="deleteRow(this, 'solventtableBody')">❌</button>

                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5
                                    class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
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

                    </div>


                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" form="printingForm" class="btn text-white"
                        style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Submit GRN
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create Job-Card -->
    <div class="modal fade" id="exampleModal_inprogress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">
                <div class="modal-header  text-white" style="background-color:#462A75">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">📝 Create Printing</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <div class="container border rounded p-3 p-md-4">

                        <!-- Title -->
                        <h4 class=" rounded fw-bold mb-4 text-center">
                            🖨️ 8 Colour Printing Machine Report
                        </h4>

                        <!-- Section: Job & Operator Details -->
                        <h5 class="bg-light border-start border-4 border-dark ps-3 py-2 rounded fw-semibold mb-4">
                            📋 Job & Operator Details
                        </h5>

                        <!-- Letter for Address Section -->


                        <div class="row g-3 mb-3 align-items-start">
                            <!-- Letter Content (Dotted Box) -->
                            <div class="col-12 col-md-9">
                                <div class="p-3 mt-2"
                                    style="min-height: 150px; border: 3px dotted #f10808; border-radius: 10px; background-color: #f0f795;">

                                    <h5 class="fw-bold text-purple">🧾 Jobcard No: JC/2025/0456</h5>
                                    <h6 class="mb-3 text-dark">Job Name: <span class="fw-semibold text-danger">Premium
                                            Coffee Pouch</span></h6>

                                    <div class="row mb-2">
                                        <div class="col-sm-4"><strong>Total Kgs:</strong> 450</div>
                                        <div class="col-sm-4"><strong>Wastage:</strong> 20</div>
                                        <div class="col-sm-4"><strong>Total Output:</strong> 430</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Form of Output:</strong> Pouch</div>
                                        <div class="col-sm-4"><strong>Weight/Pouch:</strong> 25g</div>
                                        <div class="col-sm-4"><strong>Total Roll Weight:</strong> 120kg</div>
                                    </div>

                                    <hr class="mb-2 mt-1">

                                    <h6 class="text-decoration-underline">📌 Process Flow</h6>
                                    <ul class="mb-0">
                                        <li>🖨️ <strong>Printing:</strong> 4-color front print, Date code: July 2025</li>
                                        <li>🎞️ <strong>Lamination:</strong> Gloss finish, 25-micron BOPP film</li>
                                        <li>📄 <strong>Folding:</strong> Z-fold, 2 inch width</li>
                                        <li>📦 <strong>Pouching:</strong> Stand-up pouch, center seal, tear notch</li>
                                    </ul>
                                </div>
                            </div>
                            

                            <!-- Date & Shift Fields -->
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="letter_date" class="form-label fw-semibold">📅 Date</label>
                                    <input type="date" id="letter_date" class="form-control">
                                </div>
                                <div>
                                    <label for="letter_shift" class="form-label fw-semibold">🕒 Shift</label>
                                    <input type="text" id="letter_shift" class="form-control"
                                        placeholder="Day / Night">
                                </div>
                            </div>
                        </div>


                        <br>
                        {{-- <div class="row g-3 mb-3">
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
                    </div> --}}



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
                                    <button class="btn btn-sm btn-outline-primary" onclick="addRow('mixinktableBody')">➕
                                        Add
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
                                <h5
                                    class="bg-light border-start border-4 border-danger ps-3 py-2 rounded fw-semibold mb-3">
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
                                <h5
                                    class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
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

                    </div>


                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" form="printingForm" class="btn text-white"
                        style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Submit GRN
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create Job-Card -->
    <div class="modal fade" id="exampleModal_completed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">
                <div class="modal-header  text-white" style="background-color:#462A75">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">📝 Create Printing</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <div class="container border rounded p-3 p-md-4">

                        <!-- Title -->
                        <h4 class=" rounded fw-bold mb-4 text-center">
                            🖨️ 8 Colour Printing Machine Report
                        </h4>

                        <!-- Section: Job & Operator Details -->
                        <h5 class="bg-light border-start border-4 border-dark ps-3 py-2 rounded fw-semibold mb-4">
                            📋 Job & Operator Details
                        </h5>

                        <!-- Letter for Address Section -->


                        <div class="row g-3 mb-3 align-items-start">
                            <!-- Letter Content (Dotted Box) -->
                            <div class="col-12 col-md-9">
                                <div class="p-3 mt-2"
                                    style="min-height: 150px; border: 3px dotted #f10808; border-radius: 10px; background-color: #f0f795;">

                                    <h5 class="fw-bold text-purple">🧾 Jobcard No: JC/2025/0456</h5>
                                    <h6 class="mb-3 text-dark">Job Name: <span class="fw-semibold text-danger">Premium
                                            Coffee Pouch</span></h6>

                                    <div class="row mb-2">
                                        <div class="col-sm-4"><strong>Total Kgs:</strong> 450</div>
                                        <div class="col-sm-4"><strong>Wastage:</strong> 20</div>
                                        <div class="col-sm-4"><strong>Total Output:</strong> 430</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Form of Output:</strong> Pouch</div>
                                        <div class="col-sm-4"><strong>Weight/Pouch:</strong> 25g</div>
                                        <div class="col-sm-4"><strong>Total Roll Weight:</strong> 120kg</div>
                                    </div>

                                    <hr class="mb-2 mt-1">

                                    <h6 class="text-decoration-underline">📌 Process Flow</h6>
                                    <ul class="mb-0">
                                        <li>🖨️ <strong>Printing:</strong> 4-color front print, Date code: July 2025</li>
                                        <li>🎞️ <strong>Lamination:</strong> Gloss finish, 25-micron BOPP film</li>
                                        <li>📄 <strong>Folding:</strong> Z-fold, 2 inch width</li>
                                        <li>📦 <strong>Pouching:</strong> Stand-up pouch, center seal, tear notch</li>
                                    </ul>
                                </div>
                            </div>
                            

                            <!-- Date & Shift Fields -->
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="letter_date" class="form-label fw-semibold">📅 Date</label>
                                    <input type="date" id="letter_date" class="form-control">
                                </div>
                                <div>
                                    <label for="letter_shift" class="form-label fw-semibold">🕒 Shift</label>
                                    <input type="text" id="letter_shift" class="form-control"
                                        placeholder="Day / Night">
                                </div>
                            </div>
                        </div>


                        <br>
                        {{-- <div class="row g-3 mb-3">
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
                    </div> --}}



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
                                    <button class="btn btn-sm btn-outline-primary" onclick="addRow('mixinktableBody')">➕
                                        Add
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
                                <h5
                                    class="bg-light border-start border-4 border-danger ps-3 py-2 rounded fw-semibold mb-3">
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
                                <h5
                                    class="bg-light border-start border-4 border-primary ps-3 py-2 rounded fw-semibold mb-3">
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

                    </div>


                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" form="printingForm" class="btn text-white"
                        style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Submit GRN
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .modal-body {
            max-height: 80vh;
            overflow-y: auto;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {

            $('#rewindingcreatedTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('printingprocess.index') }}",
                columns: [{
                        data: 'jobcard_no',
                        name: 'jobcard_no',
                        render: function(data) {
                            return `<span class="badge bg-purple text-white fw-bold">${data}</span>`;
                        }
                    },
                    {
                        data: 'job_name',
                        name: 'job_name',
                        render: function(data) {
                            return `<span class="badge bg-success text-white fw-bold">${data}</span>`;
                        }

                    },
                    {
                        data: 'tot_kgs',
                        name: 'tot_kgs'
                    },
                    {
                        data: 'wastage',
                        name: 'wastage'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',

                    },

                    {
                        data: 'formOfOutput',
                        name: 'formOfOutput'
                    },
                    {
                        data: 'wtperpouch',
                        name: 'wtperpouch'
                    },
                    {
                        data: 'tot_roll_wt',
                        name: 'tot_roll_wt'
                    },

                    {
                        data: 'printing',
                        name: 'printing',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'lamination',
                        name: 'lamination',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'folding',
                        name: 'folding',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'pouching',
                        name: 'pouching',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });

        $('#material_list').change(function(e) {
            e.preventDefault();
            var materialId = $(this).val();
            if (materialId === "") return;

            $.ajax({
                url: '{{ 'get_material_details' }}', // Laravel route
                type: 'post',
                data: {
                    id: materialId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    $('#product_dimmsion_list').html(response.product_data);
                },
                error: function(xhr) {
                    console.log("Error: ", xhr.responseText);
                }

            });


        });

        $('#rewindingForm').submit(function(e) {
            e.preventDefault();
            let form = $('#rewindingForm')[0];
            let formData = new FormData(form); // for file + input array support
            $.ajax({
                url: '{{ url('rewinding/store') }}',
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



        $('#rewindinginprogressTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('jobcards.index') }}",
            columns: [{
                    data: 'jobcard_no',
                    name: 'jobcard_no',
                    render: function(data) {
                        return `<span class="badge bg-purple text-white fw-bold">${data}</span>`;
                    }
                },
                {
                    data: 'job_name',
                    name: 'job_name',
                    render: function(data) {
                        return `<span class="badge bg-success text-white fw-bold">${data}</span>`;
                    }

                },
                {
                    data: 'tot_kgs',
                    name: 'tot_kgs'
                },
                {
                    data: 'wastage',
                    name: 'wastage'
                },
                {
                    data: 'total',
                    name: 'total'
                },

                {
                    data: 'formOfOutput',
                    name: 'formOfOutput'
                },
                {
                    data: 'wtperpouch',
                    name: 'wtperpouch'
                },
                {
                    data: 'tot_roll_wt',
                    name: 'tot_roll_wt'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',

                },
                {
                    data: 'printing',
                    name: 'printing',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'lamination',
                    name: 'lamination',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'folding',
                    name: 'folding',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'pouching',
                    name: 'pouching',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#rewindingcompletedTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('jobcards.index') }}",
            columns: [{
                    data: 'jobcard_no',
                    name: 'jobcard_no',
                    render: function(data) {
                        return `<span class="badge bg-purple text-white fw-bold">${data}</span>`;
                    }
                },
                {
                    data: 'job_name',
                    name: 'job_name',
                    render: function(data) {
                        return `<span class="badge bg-success text-white fw-bold">${data}</span>`;
                    }

                },
                {
                    data: 'tot_kgs',
                    name: 'tot_kgs'
                },
                {
                    data: 'wastage',
                    name: 'wastage'
                },
                {
                    data: 'total',
                    name: 'total'
                },

                {
                    data: 'formOfOutput',
                    name: 'formOfOutput'
                },
                {
                    data: 'wtperpouch',
                    name: 'wtperpouch'
                },
                {
                    data: 'tot_roll_wt',
                    name: 'tot_roll_wt'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',

                },
                {
                    data: 'printing',
                    name: 'printing',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'lamination',
                    name: 'lamination',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'folding',
                    name: 'folding',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'pouching',
                    name: 'pouching',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
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

@extends('layouts.master')

@section('subtitle', 'Job-Cards')
@section('content_header_title', 'Job-Cards')
@section('content_header_subtitle', '')

@section('content_body')


<div class="modal fade" id="MovetoProduction" tabindex="-1" aria-labelledby="MovetoProductionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow">
            <div class="modal-header bg-purple text-white">
                <h5 class="modal-title" id="MovetoProductionLabel">
                    <i class="fas fa-industry me-2"></i> Move to Production
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <p class="text-muted">Are you sure you want to move this job card to the selected production process?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Yes, Move</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="container-fluid px-2">
        <div class="card card-primary card-outline shadow-sm" style="border-top: 5px solid #462A75;">
            <div class="card-body overflow-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold text-dark">📑 Job-Card Management</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ➕ Create Job-Card
                    </button>
                </div>



                <ul class="nav nav-tabs justify-content-center">
    <li class="nav-item" role="presentation">
        <button class="nav-link active d-flex justify-content-between align-items-center px-4 py-2 fs-5 fw-semibold position-relative"
            id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">
            📩 Inbox
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                5
                <span class="visually-hidden">unread</span>
            </span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link d-flex justify-content-between align-items-center px-4 py-2 fs-5 fw-semibold position-relative"
            id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">
            📦 In-Progress
            <span class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle rounded-pill">
                12
                <span class="visually-hidden">in progress</span>
            </span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link d-flex justify-content-between align-items-center px-4 py-2 fs-5 fw-semibold position-relative"
            id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
            role="tab" aria-controls="contact" aria-selected="false">
            ✅ Completed
            <span class="badge bg-success position-absolute top-0 start-100 translate-middle rounded-pill">
                8
                <span class="visually-hidden">completed</span>
            </span>
        </button>
    </li>
</ul>
                <!-- Tab Content -->
                <div class="tab-content border border-top-0 p-4 bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">




                        <!-- Main Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm align-middle nowrap" id="jobcard-table"
                                style="width:100%">
                                <thead class="table-light text-center">
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">

                        </div>

                        <!-- Main Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm align-middle nowrap"
                                id="rewindinginprogressTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rewind Date</th>
                                        <th>Shift</th>
                                        <th>User</th>
                                        <th>Operator</th>
                                        <th>Jobcard</th>
                                        <th>Machine</th>
                                        <th>Status</th>
                                        <th>Action</th>

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
                                        <th>ID</th>
                                        <th>Rewind Date</th>
                                        <th>Shift</th>
                                        <th>User</th>
                                        <th>Operator</th>
                                        <th>Jobcard</th>
                                        <th>Machine</th>
                                        <th>Status</th>
                                        <th>Action</th>

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

    <!-- Modal: Create Job-Card -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow">
                <div class="modal-header  text-white" style="background-color:#462A75">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">📝 Job-Card Estimation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Form Inputs -->
                    <form id="multistepForm">

                        <div class="row g-3">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-semibold">Job Name</label>
                                <input type="text" class="form-control" name="job_name" id="job_name"
                                    placeholder="Enter job name" required>
                            </div>
                            <div class="row  mb-3">

                                <div class="col-md-2">
                                    <label class="form-label fw-semibold">Total Kgs/Nos</label>
                                    <input type="number" class="form-control" name="tot_kgs" id="tot_kgs"
                                        placeholder="0" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label fw-semibold">Wastage (%)</label>
                                    <input type="number" class="form-control" name="wastage" id="wastage"
                                        placeholder="%" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label fw-semibold">Total Required</label>
                                    <input type="number" class="form-control" name="total" id="total"
                                        placeholder="Required qty" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label fw-semibold">Form of Output</label>
                                    <select class="form-select" id="formOfOutput" name="formOfOutput" required>
                                        <option selected disabled>-- Choose --</option>
                                        <option value="1">Pouch</option>
                                        <option value="2">Roll (kg)</option>
                                        <option value="3">Both</option>
                                    </select>
                                </div>

                                <div class="col-md-2" id="pouchDiv" style="display: none;">
                                    <label class="form-label fw-semibold">Weight per pouch</label>
                                    <input type="number" class="form-control" name="wtperpouch" id="wtperpouch"
                                        placeholder="Weight (g)" required>
                                </div>

                                <div class="col-md-2" id="rollDiv" style="display: none;">
                                    <label class="form-label fw-semibold">Total Roll Weight</label>
                                    <input type="number" class="form-control" name="tot_roll_wt" id="tot_roll_wt"
                                        placeholder="Roll weight (kg)" required>
                                </div>

                                <!-- Material Combination -->
                                <div class="col-md-4">
                                    <h6 class="fw-bold text-muted">⚙️ Material Combination %</h6>
                                    <table class="table table-bordered table-striped table-sm align-middle text-center">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Material (MAT)</th>
                                                <th>MIC</th>
                                                <th>Density</th>
                                                <th>J.GSM</th>
                                                <th>PRCNT (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Matt Bopp</td>
                                                <td>50</td>
                                                <td>0.92</td>
                                                <td>46</td>
                                                <td>53.2654</td>
                                            </tr>
                                            <tr>
                                                <td>PET</td>
                                                <td>12</td>
                                                <td>1.40</td>
                                                <td>16.8</td>
                                                <td>19.4535</td>
                                            </tr>
                                            <tr>
                                                <td>M.Bopp</td>
                                                <td>18</td>
                                                <td>0.92</td>
                                                <td>16.56</td>
                                                <td>19.1755</td>
                                            </tr>
                                            <tr>
                                                <td>LAM</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>2.5</td>
                                                <td>2.8949</td>
                                            </tr>
                                            <tr>
                                                <td>LAM</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>2.5</td>
                                                <td>2.8949</td>
                                            </tr>
                                            <tr>
                                                <td>PRINT</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>2</td>
                                                <td>2.3159</td>
                                            </tr>
                                            <tr class="fw-bold table-warning">
                                                <td>Total</td>
                                                <td>80</td>
                                                <td>-</td>
                                                <td>86.36</td>
                                                <td>100.00</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>



                        </div>

                        <!-- Bill of Materials Section -->
                        <div class="mt-5">


                            <div class="card card-primary card-outline mt-3" style="border-top: 5px solid #462A75;">
                                <div class="card-body">
                                    <!-- Nav Tabs -->
                                    <ul class="nav nav-tabs justify-content-center mb-3" id="processTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active px-4 py-2 fs-5 fw-semibold" id="printing-tab"
                                                data-bs-toggle="tab" data-bs-target="#printing" type="button"
                                                role="tab">
                                                🖨️ Printing
                                            </button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                        <button class="nav-link  px-4 py-2 fs-5 fw-semibold" id="inspection-tab"
                                            data-bs-toggle="tab" data-bs-target="#inspection" type="button"
                                            role="tab">
                                            🔎 Inspection
                                        </button>
                                    </li> --}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link  px-4 py-2 fs-5 fw-semibold" id="lamination-tab"
                                                data-bs-toggle="tab" data-bs-target="#lamination" type="button"
                                                role="tab">
                                                📔 Lamination
                                            </button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                        <button class="nav-link  px-4 py-2 fs-5 fw-semibold" id="slitting-tab"
                                            data-bs-toggle="tab" data-bs-target="#slitting" type="button"
                                            role="tab">
                                            ✂️ Slitting
                                        </button>
                                    </li> --}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link  px-4 py-2 fs-5 fw-semibold" id="folding-tab"
                                                data-bs-toggle="tab" data-bs-target="#folding" type="button"
                                                role="tab">
                                                📂 Folding
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link  px-4 py-2 fs-5 fw-semibold" id="pouching-tab"
                                                data-bs-toggle="tab" data-bs-target="#pouching" type="button"
                                                role="tab">
                                                🎁 Pouching
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab Panes -->
                                    <div class="tab-content" id="processTabsContent">
                                        <div class="tab-pane fade show active" id="printing" role="tabpanel">
                                            <div class="container-fluid px-2">

                                                <!-- Material Selection Section -->
                                                <div class="row mt-4 g-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Material</label>
                                                        <select class="form-select form-select" name="material_list"
                                                            id="material_list" required>
                                                            <option value="" selected disabled>--Choose--
                                                            </option>
                                                            @foreach ($products->toArray() as $item)
                                                                <option value={{ $item->id }}>{{ $item->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">No. of Colours</label>
                                                        <input type="number" class="form-control" name="noofcolors"
                                                            id="noofcolors" placeholder="e.g. 6" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Cylinder - (Length x
                                                            Circum)</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="e.g. 800 x 300" id="cyclinder" name="cyclinder"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- 🎞️ Film Materials Table -->
                                                <div class="row mt-5 g-4">
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🎞️ Film Materials</h5>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('inouttableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th style="width:50%">Size (MM x Mic)</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="inouttableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <div id="product_dimmsion_list"></div>
                                                                        </td>
                                                                        <td><input class="form-control required-qty"
                                                                                type="number" name="material_film_qty[]"
                                                                                required /></td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'inouttableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalFilmQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- 🧪 Solvent Details -->
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧪 Solvent Details</h5>
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('solventtableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2" class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th>Solvent</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="solventtableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-select form-select"
                                                                                name="material_solvents[]" required>
                                                                                <option value="" selected disabled>
                                                                                    --Choose--
                                                                                </option>
                                                                                @foreach ($products->toArray() as $item)
                                                                                    <option value={{ $item->id }}>
                                                                                        {{ $item->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td><input class="form-control" type="number"
                                                                                name="material_solvents_qty[]" required>
                                                                        </td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'solventtableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalSolventQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <!-- Fresh Inks -->
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧴 Fresh Inks</h5>
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('inktableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2" class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th>Colour</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="inktableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-select"
                                                                                name="material_freshink[]" required>
                                                                                <option selected disabled>--Choose--
                                                                                </option>
                                                                                <option value="1">🟩 Green</option>
                                                                                <option value="2">🟥 Red</option>
                                                                                <option value="3">🟨 Yellow</option>
                                                                                <option value="4">⬛ Black</option>
                                                                                <option value="5">🟪 Violet</option>
                                                                                <option value="6">🟦 Cyan</option>
                                                                                <option value="7">⬜ White</option>
                                                                                <option value="8">🟧 Magenta</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input class="form-control" type="number"
                                                                                name="material_freshink_qty[]" required>
                                                                        </td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'inktableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalFreshInkQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- Mixed Inks -->
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🎨 Mixed Inks</h5>
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('mixinktableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                class="table-responsive mt-2"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th>Colour</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="mixinktableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-select"
                                                                                name="material_mixedink[]" required>
                                                                                <option selected disabled>--Choose--
                                                                                </option>
                                                                                <option value="1">🟩 Green</option>
                                                                                <option value="2">🟥 Red</option>
                                                                                <option value="3">🟨 Yellow</option>
                                                                                <option value="4">⬛ Black</option>
                                                                                <option value="5">🟪 Violet</option>
                                                                                <option value="6">🟦 Cyan</option>
                                                                                <option value="7">⬜ White</option>
                                                                                <option value="8">🟧 Magenta</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input class="form-control" type="number"
                                                                                name="material_mixedink_qty[]" required>
                                                                        </td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'mixinktableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalMixedInkQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        {{-- <div class="tab-pane fade" id="inspection" role="tabpanel">
                                        <p>🔎 Inspection section content goes here.</p>
                                    </div> --}}
                                        <div class="tab-pane fade" id="lamination" role="tabpanel">
                                            <div class="container-fluid px-2">
                                                <div class="row mt-5 g-4">
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🎞️ Printed Film </h5>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('inouttableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th style="width:50%">Size (MM x Mic)</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="inouttableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <div id="lamination_product_dimmsion_list">
                                                                            </div>
                                                                        </td>
                                                                        <td><input class="form-control required-qty"
                                                                                type="number" name="lamin_roll_qty[]"
                                                                                required /></td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'inouttableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalFilmQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- 🧪 Solvent Details -->
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧪 Solvent Details</h5>
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('solventtableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2" class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th>Solvent</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="solventtableBody">
                                                                    <tr>
                                                                        <td><input class="form-control" type="text"
                                                                                name="lamin_solvent[]" required>
                                                                        </td>
                                                                        <td><input class="form-control" type="number"
                                                                                name="lamin_solvent_qty[]" required>
                                                                        </td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'solventtableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalSolventQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <!-- Fresh Inks -->
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧴 Choose Layer</h5>

                                                        </div>

                                                        <div class="table-responsive mt-2 ml-4">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lamin_inlineRadioOptions" id="inlineRadio1"
                                                                    value="option1" required>
                                                                <label class="form-check-label" for="inlineRadio1">
                                                                    <b>Two Layer</b> <small>(LD-MET or PET-MET)</small>
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lamin_inlineRadioOptions" id="inlineRadio2"
                                                                    value="option2" required>
                                                                <label class="form-check-label" for="inlineRadio2">
                                                                    <b>Three Layer</b> <small>(LD-MET and PET-MET)</small>
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lamin_inlineRadioOptions" id="inlineRadio3"
                                                                    value="option3" required>
                                                                <label class="form-check-label" for="inlineRadio3">
                                                                    <b>No Layer</b>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                        {{-- <div class="tab-pane fade" id="slitting" role="tabpanel">
                                        <p>✂️ Slitting section content goes here.</p>
                                    </div> --}}
                                        <div class="tab-pane fade" id="folding" role="tabpanel">

                                            <div class="container-fluid px-2">
                                                <div class="row mt-5 g-4">
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🎞️ Printed Film </h5>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('inouttableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th style="width:50%">Size (MM x Mic)</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="inouttableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <div id="product_dimmsion_list"></div>
                                                                        </td>
                                                                        <td><input class="form-control required-qty"
                                                                                type="number" name="fold_roll_qty[]"
                                                                                required /></td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'inouttableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalFilmQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <!-- Fresh Inks -->
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧴 Choose Layer</h5>

                                                        </div>

                                                        <div class="table-responsive mt-2 ml-4">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="fold_inlineRadioOptions" id="inlineRadio1"
                                                                    value="option1" required>
                                                                <label class="form-check-label" for="inlineRadio1">
                                                                    <b>With Pearl Layer</b>
                                                                </label>
                                                            </div>



                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="fold_inlineRadioOptions" id="inlineRadio3"
                                                                    value="option3" required>
                                                                <label class="form-check-label" for="inlineRadio3">
                                                                    <b>No Layer</b>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pouching" role="tabpanel">
                                            <div class="container-fluid px-2">
                                                <div class="row mt-5 g-4">
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🎞️ Printed Film </h5>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="addRow('inouttableBody')">➕ Add Row</button>
                                                        </div>

                                                        <div class="table-responsive mt-2">
                                                            <table class="table table-bordered text-center align-middle"
                                                                style="transform: scale(0.85); transform-origin: top left; width: 117.65%;">
                                                                <thead class="table-secondary">
                                                                    <tr>
                                                                        <th style="width:50%">Size (MM x Mic)</th>
                                                                        <th>Required qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="inouttableBody">
                                                                    <tr>
                                                                        <td>
                                                                            <div id="product_dimmsion_list"></div>
                                                                        </td>
                                                                        <td><input class="form-control required-qty"
                                                                                type="number" name="pouch_roll_qty[]"
                                                                                required /></td>
                                                                        <td><button class="btn btn-sm"
                                                                                onclick="deleteRow(this, 'inouttableBody')">❌</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="table-light">
                                                                    <tr>
                                                                        <th>Total</th>
                                                                        <th><span id="totalFilmQty">0</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <!-- Fresh Inks -->
                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧴 Choose Layer</h5>

                                                        </div>

                                                        <div class="table-responsive mt-2 ml-4">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pouch_inlineRadioOptions" id="inlineRadio1"
                                                                    value="option1" required>
                                                                <label class="form-check-label" for="inlineRadio1">
                                                                    <b>With Pearl Layer</b>
                                                                </label>
                                                            </div>



                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pouch_inlineRadioOptions" id="inlineRadio3"
                                                                    value="option3" required>
                                                                <label class="form-check-label" for="inlineRadio3">
                                                                    <b>No Layer</b>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                                                            <h5 class="mb-0 fw-semibold">🧴 Choose Tape</h5>

                                                        </div>

                                                        <div class="table-responsive mt-2 ml-4">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pouch_inlineTapeOptions" id="inlineTape1"
                                                                    value="option1" required>
                                                                <label class="form-check-label" for="inlineTape1">
                                                                    <b>With Slicking</b>
                                                                </label>
                                                            </div>



                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pouch_inlineTapeOptions" id="inlineTape2"
                                                                    value="option3" required>
                                                                <label class="form-check-label" for="inlineTape2">
                                                                    <b>No Tape</b>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div> <!-- modal-body -->
                <div class="modal-footer">
                    {{-- <button type="button" id="customSubmitBtn" class="btn btn-primary">Submit</button> --}}
                    <button class="btn btn-primary" id="nextTab">Next</button>

                    {{-- <button type="button"  class="btn text-white"
                        style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Submit Estimation
                    </button> --}}
                </div>
                </form>
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {

            const tabs = $('.nav-tabs .nav-link');
            let currentIndex = tabs.index($('.nav-tabs .nav-link.active'));

            $("#nextTab").click(function() {
                const currentTab = tabs.eq(currentIndex);
                const currentForm = $(currentTab.attr("href")).closest("form");

                if (currentForm.length && !currentForm.valid()) {
                    return; // Prevent tab switch if form is invalid
                }

                if (currentIndex < tabs.length - 1) {
                    tabs.eq(currentIndex).removeClass("active");
                    $(tabs.eq(currentIndex).attr("href")).removeClass("show active");

                    currentIndex++;
                    tabs.eq(currentIndex).addClass("active");
                    $(tabs.eq(currentIndex).attr("href")).addClass("show active");
                }
            });


            $("form").each(function() {

                // Setup validator with custom submitHandler
                $("#multistepForm").validate({
                    errorClass: 'text-danger', // this applies Bootstrap's red color

                    submitHandler: function(form) {
                        let formData = new FormData(form);

                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to submit this again!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, submit it!",
                            cancelButtonText: "No, cancel!",
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#formLoader').show(); // Optional loading indicator

                                $.ajax({
                                    url: '{{ route('jobcard.create') }}',
                                    type: 'POST',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        $('#formLoader').hide();
                                        Swal.fire("Submitted!",
                                                "Application submitted successfully!",
                                                "success")
                                            .then(() => {
                                                $('#multistepForm')[0]
                                                    .reset();
                                                $('#completeModal')
                                                    .modal(
                                                        'hide'
                                                    ); // Hide modal
                                                location
                                                    .reload(); // Or use AJAX to refresh part of the page
                                            });
                                    },
                                    error: function(xhr) {
                                        $('#formLoader').hide();
                                        if (xhr.status === 422) {
                                            const errors = xhr.responseJSON
                                                .errors;
                                            let errorMsg = '';
                                            Object.keys(errors).forEach((
                                                key) => {
                                                errorMsg +=
                                                    `${errors[key][0]}\n`;
                                            });
                                            Swal.fire("Validation Error",
                                                errorMsg,
                                                "error");
                                        } else {
                                            Swal.fire("Error",
                                                "Something went wrong!",
                                                "error");
                                        }
                                    }
                                });
                            }
                        });
                    }
                });




            });



            $('#jobcard-table').DataTable({
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



        });



        document.getElementById('formOfOutput').addEventListener('change', function() {
            const value = this.value;
            const pouchDiv = document.getElementById('pouchDiv');
            const rollDiv = document.getElementById('rollDiv');

            pouchDiv.style.display = 'none';
            rollDiv.style.display = 'none';

            if (value === '1') {
                pouchDiv.style.display = 'block';
            } else if (value === '2') {
                rollDiv.style.display = 'block';
            } else if (value === '3') {
                pouchDiv.style.display = 'block';
                rollDiv.style.display = 'block';
            }
        });
    </script>
    <script>
        function addRow(tableId) {
            const tbody = document.getElementById(tableId);
            let newRow;

            switch (tableId) {
                case 'inouttableBody': // 🎞️ Film Materials
                    newRow = `
                    <tr>
                        <td><div id="product_dimmsion_list"></div></td>
                        <td><input class="form-control required-qty" name="material_film_qty[]" type="number" required /></td>
                        <td><button class="btn btn-sm" onclick="deleteRow(this, '${tableId}')">❌</button></td>
                    </tr>
                `;
                    break;

                case 'solventtableBody': // 🧪 Solvent Details
                    newRow = `
                    <tr>
                        <td><input class="form-control" type="text" name="material_solvents[]" required></td>
                        <td><input class="form-control" type="number" name="material_solvents_qty[]" required></td>
                        <td><button class="btn btn-sm" onclick="deleteRow(this, '${tableId}')">❌</button></td>
                    </tr>
                `;
                    break;

                case 'inktableBody':
                    newRow = `
                    <tr>
                        <td>
                            <select class="form-select"  name="material_freshink[]" required>
                                <option selected disabled>--Choose--</option>
                                <option value="1">🟩 Green</option>
                                <option value="2">🟥 Red</option>
                                <option value="3">🟨 Yellow</option>
                                <option value="4">⬛ Black</option>
                                <option value="5">🟪 Violet</option>
                                <option value="6">🟦 Cyan</option>
                                <option value="7">⬜ White</option>
                                <option value="8">🟧 Magenta</option>
                            </select>
                        </td>
                        <td><input class="form-control" type="number" name="material_freshink[]" required></td>
                        <td><button class="btn btn-sm" onclick="deleteRow(this, '${tableId}')">❌</button></td>
                    </tr>
                `;
                    break;
                case 'mixinktableBody': // 🎨 Mixed Inks
                    newRow = `
                    <tr>
                        <td>
                            <select class="form-select"  name="material_mixedink[]" required>
                                <option selected disabled>--Choose--</option>
                                <option value="1">🟩 Green</option>
                                <option value="2">🟥 Red</option>
                                <option value="3">🟨 Yellow</option>
                                <option value="4">⬛ Black</option>
                                <option value="5">🟪 Violet</option>
                                <option value="6">🟦 Cyan</option>
                                <option value="7">⬜ White</option>
                                <option value="8">🟧 Magenta</option>
                            </select>
                        </td>
                        <td><input class="form-control" type="number" name="material_mixedink_qty[]" required></td>
                        <td><button class="btn btn-sm" onclick="deleteRow(this, '${tableId}')">❌</button></td>
                    </tr>
                `;
                    break;

                default:
                    return;
            }

            tbody.insertAdjacentHTML('beforeend', newRow);
            updateTotal(tableId); // optional: update totals if needed
        }

        function deleteRow(button, tableId) {
            const row = button.closest("tr");
            row.remove();
            updateTotal(tableId); // optional: update totals if needed
        }

        // (Optional) Recalculate total qty after add/delete
        function updateTotal(tableId) {
            let total = 0;
            const tbody = document.getElementById(tableId);
            tbody.querySelectorAll('input[type="number"]').forEach(input => {
                const val = parseFloat(input.value);
                if (!isNaN(val)) total += val;
            });

            let spanId = '';
            switch (tableId) {
                case 'inouttableBody':
                    spanId = 'totalFilmQty';
                    break;
                case 'solventtableBody':
                    spanId = 'totalSolventQty';
                    break;
                case 'inktableBody':
                    spanId = 'totalFreshInkQty';
                    break;
                case 'mixinktableBody':
                    spanId = 'totalMixedInkQty';
                    break;
            }

            if (spanId) {
                document.getElementById(spanId).textContent = total;
            }
        }
    </script>
    <script>
        $('#material_list').change(function(e) {
            e.preventDefault();
            var materialId = $(this).val();
            if (materialId === "") return;

            $.ajax({
                url: "{{ 'get_material_details' }}", // Laravel route
                type: 'post',
                data: {
                    id: materialId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    $('#product_dimmsion_list').html(response.product_data);
                    $('#lamination_product_dimmsion_list').html(response.product_data)
                },
                error: function(xhr) {
                    console.log("Error: ", xhr.responseText);
                }

            });


        });





        // hsc,affidavit,transfer_certificate
    </script>
@endpush

@extends('layouts.master')

@section('subtitle', 'Re-winding')
@section('content_header_title', 'Re-winding')
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
                    <h5 class="mb-0 fw-bold text-dark">📑 Re-winding Management</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        ➕ Create Re-winding
                    </button>
                </div>


                <div class="container">

                    {{-- <!-- Centered Logo -->
                    <div class="text-center mb-4">
                        <img src="https://dummyimage.com/200x60/462A75/ffffff&text=Elegant+Logo" alt="Logo"
                            class="img-fluid">
                    </div> --}}

                    <!-- Nav Tabs -->
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



                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover nowrap" id="rewindingcreatedTable"
                                    style="width:100%">
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
    </div>

    <!-- Modal: Create Job-Card -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow">
                <div class="modal-header  text-white" style="background-color:#462A75">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">📝 Create Rewinding</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                                <select class="form-select" id="shift_id" name="shift_id">
                                    <option value="" selected disabled>---Choose---</option>
                                    @foreach ($shifts->toArray() as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="machine_no" class="form-label">Machine No</label>
                                <select class="form-select" id="machine_id" name="machine_id">
                                    <option value="" selected disabled>---Choose---</option>

                                    @foreach ($machine->toArray() as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="operator_name" class="form-label">Operator Name</label>

                                <select class="form-select" id="operator_id" name="operator_id">
                                    <option value="" selected disabled>---Choose---</option>

                                    @foreach ($operator->toArray() as $item)
                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
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

                                        <th>Width</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="input_roll_no" class="form-control"></td>
                                        <td><input type="number" name="input_weight" class="form-control"
                                                step="any"></td>

                                        <td><input type="text" name="width" class="form-control"></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>



                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" form="rewindingForm" class="btn text-white"
                        style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Create Re-winding
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

        $('#rewindingcreatedTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('/rewinding/created_fetch') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'rewind_date',
                    name: 'rewind_date'
                },
                {
                    data: 'shift_id',
                    name: 'shift_id'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'operator',
                    name: 'operator.name'
                },
                {
                    data: 'jobcard',
                    name: 'jobcard.jobcard_no'
                },
                {
                    data: 'machine',
                    name: 'machine.name'
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
            ]
        });

        $('#rewindinginprogressTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('/rewinding/inprogress_fetch') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'rewind_date',
                    name: 'rewind_date'
                },
                {
                    data: 'shift_id',
                    name: 'shift_id'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'operator',
                    name: 'operator.name'
                },
                {
                    data: 'jobcard',
                    name: 'jobcard.jobcard_no'
                },
                {
                    data: 'machine',
                    name: 'machine.name'
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
            ]
        });

        $('#rewindingcompletedTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('/rewinding/completed_fetch') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'rewind_date',
                    name: 'rewind_date'
                },
                {
                    data: 'shift_id',
                    name: 'shift_id'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'operator',
                    name: 'operator.name'
                },
                {
                    data: 'jobcard',
                    name: 'jobcard.jobcard_no'
                },
                {
                    data: 'machine',
                    name: 'machine.name'
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
            ]
        });
    </script>
@endpush

@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'CPE Request')
@section('content_header_title', 'CPE Request')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')
  <!-- Modal -->
    <div class="modal fade" id="programModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="programForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Program Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="program_id">
                        <div class="mb-3">
                            <label>Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label>Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="btnSave">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">

                     <!-- Sidebar Tabs -->
                    <div class="col-12 col-md-3 mb-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-addqualification-tab" data-toggle="pill"
                                href="#v-pills-addqualification" role="tab">✅ Good standing </a>

                            <a class="nav-link" id="v-pills-track-tab" data-toggle="pill" href="#v-pills-track"
                                role="tab">✅ Track Registration</a>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="col-12 col-md-9">
                        <div class="tab-content" id="v-pills-tabs-tabContent">
                            {{-- @if ($data->status >= 0) --}}
                            <div class="tab-pane fade show active" id="v-pills-addqualification" role="tabpanel"
                                aria-labelledby="vert-tabs-addqualification-tab">
                                <div class="overlay-wrapper">

                                    <form id="multistepForm" enctype="multipart/form-data">
                                        <div class="card">
                                            <div class="card-body overflow-auto" style="max-height: 60vh;">

                                                <nav class="overflow-auto mb-3">
                                                    <div class="nav nav-tabs flex-nowrap" id="nav-tab" role="tablist"
                                                        style="white-space: nowrap;">
                                                        <a class="nav-item nav-link active" id="nav-inner-pi-tab"
                                                            data-toggle="tab" href="#nav-inner-pi" role="tab">✅
                                                            Good Standing
                                                        </a>


                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active tab-pane-scrollable"
                                                        id="nav-inner-pi" role="tabpanel">


                                                        <div class="container mt-4 mb-5">
                                                            <!-- Document Uploads -->
                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Pharmacist Registration
                                                                    Certificate *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_ppc" name="upload_ppc" accept="image/*"
                                                                    onchange="previewImage(event, 'upload_ppc')" required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_ppc" data-bs-toggle="modal"
                                                                    data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_ppc"
                                                                    onclick="deleteImage('upload_ppc')"
                                                                    style="display:none;">Delete</button>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Last Renewal Receipt
                                                                    *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_lastrenewalreceipt"
                                                                    name="upload_lastrenewalreceipt" accept="image/*"
                                                                    onchange="previewImage(event, 'upload_lastrenewalreceipt')"
                                                                    required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_lastrenewalreceipt"
                                                                    data-bs-toggle="modal" data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_lastrenewalreceipt"
                                                                    onclick="deleteImage('upload_lastrenewalreceipt')"
                                                                    style="display:none;">Delete</button>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Diploma/Degree/PharmD
                                                                    Provisional *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_degree" name="upload_degree"
                                                                    accept="image/*"
                                                                    onchange="previewImage(event, 'upload_degree')"
                                                                    required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_degree" data-bs-toggle="modal"
                                                                    data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_degree"
                                                                    onclick="deleteImage('upload_degree')"
                                                                    style="display:none;">Delete</button>

                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Aadhaar Card *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_aadhar" name="upload_aadhar"
                                                                    accept="image/*"
                                                                    onchange="previewImage(event, 'upload_aadhar')"
                                                                    required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_aadhar" data-bs-toggle="modal"
                                                                    data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_aadhar"
                                                                    onclick="deleteImage('upload_aadhar')"
                                                                    style="display:none;">Delete</button>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Photo *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_photo" name="upload_photo"
                                                                    accept="image/*"
                                                                    onchange="previewImage(event, 'upload_photo')"
                                                                    required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_photo" data-bs-toggle="modal"
                                                                    data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_photo"
                                                                    onclick="deleteImage('upload_photo')"
                                                                    style="display:none;">Delete</button>
                                                            </div>

                                                            <!-- Payment Section -->
                                                            <div class="mb-3">
                                                                <label class="form-label">Transcation No</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Receipt No" name="receiptno"
                                                                    id="receiptno" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Payment Type </label>
                                                                <select class="form-select" id="payment_type"
                                                                    name="payment_type" required>
                                                                    <option selected disabled>Select payment type
                                                                    </option>
                                                                    <option value="cash">Bank Transfer</option>
                                                                    <option value="online">Online-(GPay/PhonePe/UPI)
                                                                    </option>
                                                                    <option value="dd">Demand Draft</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label class="col-sm-3 col-form-label">Payment
                                                                    Amount</label>
                                                                <div class="col-sm-9 d-flex align-items-center gap-3">
                                                                    <div id="">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#qrModal">
                                                                            <img src="{{ asset('storage/images/ppcqrcode-small.png') }}"
                                                                                alt="QR Code"
                                                                                class="img-fluid rounded mb-2"
                                                                                style="max-height: 200px; object-fit: contain;">
                                                                        </a>
                                                                        <i class="fas fa-rupee-sign"
                                                                            style="font-size:22px;color:rgb(31, 114, 14)"></i>


                                                                        <span class="text-success fs-3"> <i
                                                                                class="fa fa-inr" aria-hidden="true"></i>
                                                                            <b>2500</b></span>



                                                                    </div>


                                                                </div>


                                                            </div>

                                                            <div class="mb-3">
                                                                {{-- <label class="form-label">Amount *</label> --}}
                                                                <input type="number" class="form-control d-none"
                                                                    id="payment_amount" name="payment_amount"
                                                                    value="2500" required readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Payment Date </label>
                                                                <input type="date" class="form-control"
                                                                    name="payment_date" id="payment_date" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Payment Receipt
                                                                    *</label>
                                                                <input type="file" class="form-control"
                                                                    id="upload_payreceipt" name="upload_payreceipt"
                                                                    accept="image/*"
                                                                    onchange="previewImage(event, 'upload_payreceipt')"
                                                                    required>
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="viewBtn-upload_payreceipt" data-bs-toggle="modal"
                                                                    data-bs-target="#previewModal"
                                                                    style="display:none;">View</button>
                                                                <button class="btn btn-outline-danger" type="button"
                                                                    id="deleteBtn-upload_payreceipt"
                                                                    onclick="deleteImage('upload_payreceipt')"
                                                                    style="display:none;">Delete</button>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Remark *</label>
                                                                <textarea class="form-control" rows="3" placeholder="Enter your remarks" name="remarks" id="remarks"
                                                                    required></textarea>
                                                            </div>


                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <div class="d-flex justify-content-between mt-4">
                                                    <button class="btn btn-secondary" id="prevTab">Previous</button>
                                                    <button class="btn btn-info" id="nextTab">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- @endif --}}

                            {{-- @if ($data->status >= 0) --}}
                            <div class="tab-pane fade" id="v-pills-track" role="tabpanel"
                                aria-labelledby="vert-tabs-track-tab">
                                <div class="overlay-wrapper">
                                    <div class="row">

                                        <div class="table table-bordered table-hover nowrap">
                                            <table class="table table-bordered" id="goodstandingtable"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Receipt No</th>
                                                        <th>Payment Type</th>
                                                        <th>Amount</th>
                                                        <th>Payment Date</th>
                                                        <th>PPC Cert</th>
                                                        <th>Last Renewal Receipt</th>
                                                        <th>Degree</th>
                                                        <th>Aadhaar</th>
                                                        <th>Photo</th>
                                                        <th>Payment Receipt</th>
                                                        <th>Remark</th>
                                                        <th>Submitted At</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h3>CPE Programs</h3>
        <button class="btn btn-primary mb-3" id="btnAdd">+ Add Program</button>

        <table class="table table-bordered" id="programTable">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

  

@stop

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            fetchPrograms();

            function fetchPrograms() {
                $.get("{{ route('cpe.index') }}", function(res) {
                    const tbody = $("#programTable tbody");
                    tbody.empty();
                    res.programs.forEach(function(p) {
                        tbody.append(`
                    <tr>
                        <td>${p.date}</td>
                        <td>${p.title}</td>
                        <td>${p.venue}</td>
                        <td>
                            <button class="btn btn-sm btn-warning btnEdit" data-id="${p.id}">Edit</button>
                            <button class="btn btn-sm btn-danger btnDelete" data-id="${p.id}">Delete</button>
                        </td>
                    </tr>
                `);
                    });
                });
            }

            $('#btnAdd').click(function() {
                $('#programForm')[0].reset();
                $('#program_id').val('');
                $('#programModal').modal('show');
            });

            // Save
            $('#programForm').submit(function(e) {
                e.preventDefault();
                const id = $('#program_id').val();
                const formData = {
                    _token: '{{ csrf_token() }}',
                    date: $('#date').val(),
                    title: $('#title').val(),
                    venue: $('#venue').val()
                };

                const url = id ? `/cpe-programs/update/${id}` : '{{ route('cpe.store') }}';
                $.post(url, formData, function(res) {
                    $('#programModal').modal('hide');
                    fetchPrograms();
                });
            });

            // Edit
            $(document).on('click', '.btnEdit', function() {
                const id = $(this).data('id');
                $.get(`/cpe-programs/edit/${id}`, function(res) {
                    $('#program_id').val(res.id);
                    $('#date').val(res.date);
                    $('#title').val(res.title);
                    $('#venue').val(res.venue);
                    $('#programModal').modal('show');
                });
            });

            // Delete
            $(document).on('click', '.btnDelete', function() {
                if (!confirm('Delete this record?')) return;
                const id = $(this).data('id');

                $.ajax({
                    url: `/cpe-programs/delete/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        fetchPrograms();
                    }
                });
            });
        });
    </script>
@endpush

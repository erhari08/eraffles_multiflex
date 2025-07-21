@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Masters')
@section('content_header_title', 'Masters')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')

    <div class="container-fluid" >
        <!-- Modal -->
        <div class="modal fade" id="addFeeModal" tabindex="-1" role="dialog" aria-labelledby="addFeeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="form-horizontal m-4" action="" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addFeeModalLabel">Add New Fee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- Name field -->
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Fee Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" name="name"
                                        placeholder="Enter Fee Name" required>
                                </div>
                            </div>

                            <!-- Price field -->
                            <div class="form-group row">
                                <label for="inputPrice" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number" step="0.01" class="form-control" id="inputPrice" name="price"
                                        placeholder="Enter Price" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save Fee</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="addProgramModal" tabindex="-1" role="dialog" aria-labelledby="addProgramModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="programForm" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProgramModalLabel">Add Programme </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- Name field -->
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Programme Name</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="name" name="name" placeholder="Enter Programme Name "
                                        required></textarea>
                                </div>
                            </div>

                            <!-- Price field -->
                            <div class="form-group row">
                                <label for="inputPrice" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control" id="date" name="date"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Venue</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="venue" name="venue" placeholder="Enter Venue " required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Certificate Template</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="certificate_template"
                                        name="certificate_template" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputcourse" class="col-sm-3 col-form-label">Course Content ( * Online link-Zoom/GoogleMeet/YouTube link etc.,)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="course_content" name="course_content"
                                        placeholder="" required></input>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
          <div class="modal fade" id="updateProgramModal" tabindex="-1" role="dialog" aria-labelledby="addProgramModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="updateprogramForm" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProgramModalLabel">Add Programme </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- Name field -->
                            <input type="text" class="form-control" id="update_id" name="update_id"
                                        required hidden>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Programme Name</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="update_name" name="update_name" placeholder="Enter Programme Name "
                                        ></textarea>
                                </div>
                            </div>

                            <!-- Price field -->
                            <div class="form-group row">
                                <label for="inputPrice" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="update_date" name="update_date"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Venue</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="update_venue" name="update_venue" placeholder="Enter Venue " ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Certificate Template</label>
                                <div class="col-sm-9">
                                    <a href="#" class="btn btn-outline-primary btn-sm" target="_blank"
                                                        id="showviewBtn-cctemplate" data-src="">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                     
                                    <input type="file" class="form-control" id="update_certificate_template"
                                        name="update_certificate_template" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputcourse" class="col-sm-3 col-form-label">Course Content ( * Online link-Zoom/GoogleMeet/YouTube link etc.,)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="update_course_content" name="update_course_content"
                                        placeholder="" ></input>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-success card-outline">
            <div class="card-body">
                <div class="row">

                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="vert-tabs-fees-tab" data-toggle="pill" href="#vert-tabs-fees"
                                role="tab" aria-controls="vert-tabs-fees" aria-selected="true"> ✅ Manage Fees</a>
                            <a class="nav-link" id="vert-tabs-program-tab" data-toggle="pill" href="#vert-tabs-program"
                                role="tab" aria-controls="vert-tabs-program" aria-selected="true"> ✅ CPE
                                programme</a>

                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane fade active show" id="vert-tabs-fees" role="tabpanel"
                                aria-labelledby="vert-tabs-fees-tab">
                                <div class="container mt-4">

                                    <div class="card">
                                        <div class="card-header">
                                            {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
                                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                                data-target="#addFeeModal">
                                                Add Fee
                                            </button>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search"
                                                        class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap" id="">
                                                <table class="table table-bordered" id="productTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Price (₹)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>

                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>


                                </div>

                            </div>
                            <div class="tab-pane fade" id="vert-tabs-program" role="tabpanel"
                                aria-labelledby="vert-tabs-program-tab">
                                <div class="container mt-4">

                                    <div class="card" >
                                        <div class="card-header">
                                            {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
                                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                                data-target="#addProgramModal">
                                                Add CPE
                                            </button>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search"
                                                        class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0 " style="max-height: 400px; overflow-y: auto;">
                                            <table class="table table-hover text-nowrap mb-2" id="cpeTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Venue</th>
                                                        <th>Certificate</th>
                                                        <th>Course Content</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/products/data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'amount'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });


            $('#cpeTable').DataTable({
                processing: true,
                serverSide: true,
                searching: true, // disable built-in search
                responsive: true,
                ajax: '{{ route('masterscpe-programs.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'venue'
                    },
                    {
                        data: 'certificate_template',

                    },
                    {
                        data: 'course_content',

                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'actions'
                    },


                ]
            });

            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.get(`/cpe-programs/edit/${id}`, function(data) {
                    $('#cpe_id').val(data.id);
                    $('#date').val(data.date);
                    $('#name').val(data.name);
                    $('#venue').val(data.venue);
                    $('#certificate_template').val('');
                    $('#cpeModal').modal('show');
                });
            });

            $('#cpeForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let id = $('#cpe_id').val();
                let url = id ? `/cpe-programs/update/${id}` : '/cpe-programs/store';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#cpeForm')[0].reset();
                        $('#cpe_id').val('');
                        $('#cpeModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire('Success', 'Saved Successfully!', 'success');
                    },
                    error: function(xhr) {
                        Swal.fire('Error', 'Something went wrong', 'error');
                    }
                });
            });
            $.validator.addMethod("pdfOnly", function(value, element) {
                if (element.files.length === 0) return false;
                const file = element.files[0];
                return file.name.toLowerCase().endsWith(".pdf");
            }, "Only PDF files are allowed");

            $("#programForm").validate({
                errorClass: 'text-danger',
                rules: {
                    certificate_template: {
                        required: true,
                        pdfOnly: true
                    }
                },
                messages: {
                    certificate_template: {
                        required: "Please upload a certificate template",
                        pdfOnly: "Only PDF files are allowed"
                    }
                },
                submitHandler: function(form) {
                    let formData = new FormData(form);
                    let $submitBtn = $(form).find('[type="submit"]');

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });

                    swalWithBootstrapButtons.fire({
                        title: "Are you sure?",
                        text: "You are about to submit data.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, submit it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#formLoader').show();
                            $submitBtn.prop('disabled', true);

                            $.ajax({
                                url: '{{ route('cpe.store') }}',
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    $('#formLoader').hide();
                                    $submitBtn.prop('disabled', false);

                                    $('#programModal').modal('hide');
                                    Swal.fire({
                                        title: "Submitted!",
                                        text: "Your application has been submitted successfully!",
                                        icon: "success",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $('#programForm')[0].reset();
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(xhr) {
                                    $('#formLoader').hide();
                                    $submitBtn.prop('disabled', false);

                                    if (xhr.status === 422) {
                                        const errors = xhr.responseJSON.errors;
                                        let errorMsg = '';
                                        Object.keys(errors).forEach((key) => {
                                            errorMsg +=
                                                `${errors[key][0]}<br>`;
                                        });

                                        Swal.fire({
                                            title: 'Validation Error',
                                            html: errorMsg,
                                            icon: 'error'
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error',
                                            text: 'Something went wrong while submitting.',
                                            icon: 'error'
                                        });
                                    }
                                }
                            });

                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire(
                                "Cancelled",
                                "Your form was not submitted.",
                                "error"
                            );
                        }
                    });
                }
            });

            $(document).on('click', '.deleteBtn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('cpe-programs.destroy') }}',
                            type: 'DELETE',
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                Swal.fire('Deleted!', res.message, 'success');
                                $('#cpeTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });
                    }
                });
            });

        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('date');
            const now = new Date();

            // Format date to "YYYY-MM-DDTHH:MM"
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');

            const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            input.min = minDateTime;
        });

        document.getElementById('date').addEventListener('submit', function(e) {
            const input = document.getElementById('date');
            if (new Date(input.value) < new Date()) {
                e.preventDefault();
                alert("Please select a future date and time.");
            }
        });
    var baseUrl = "{{ url('/') }}";
    baseUrl = baseUrl.replace(/\/index\.php(\/)?/, '').replace(/\/$/, '');


        function editProgram(id) {
            $.ajax({
                url: '{{ route('cpe-programs.edit') }}',
                type: 'GET',
                 data: {
                                id: id
                            },
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                success: function(data) {
                    
                    $('#update_id').val(data.data.id);
                    $('#update_name').val(data.data.name);
                    $('#update_date').val(data.data.date);
                    $('#update_venue').val(data.data.venue);
                    $('#update_certificate_template').val(''); // Reset file input
                      $('#showviewBtn-cctemplate').attr('href', baseUrl + '/storage/' + data
                            .data.certificate_template);
                    $('#update_course_content').val(data.data.course_content);
                    $('#updateProgramModal').modal('show');
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Something went wrong while fetching program data.', 'error');
                }
            });
        }
        $('#updateprogramForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let formData = new FormData(this);
            formData.append('id', id); // Add method override for PUT request
            let url = "{{ route('cpe-programs.update')}}";

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#updateProgramModal').modal('hide');
                    Swal.fire('Success', 'Program updated successfully!', 'success');
                    $('#cpeTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Something went wrong while updating program.', 'error');
                }
            });
        });
    </script>
@endpush

@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Address Change Request')
@section('content_header_title', 'Address Change Request')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')
    <!-- Track Modal -->
    <div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Track Details</h5>
                    <button type="button" class="close" data-dismiss="modal" id="addressmodalbtnclose">&times;</button>
                </div>
                <div class="modal-body" id="trackModalBody">Loading...</div>
            </div>
        </div>
    </div>


    <!-- File Viewer Modal -->
    <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        id="addressfilepreviewbtnclose"></button>
                </div>
                <div class="modal-body text-center" id="filePreviewBody">
                    Loading...
                </div>
            </div>
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
                                href="#v-pills-addqualification" role="tab">✅ Address change Request </a>

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
                                    <div id="responseMsg" class="mt-3"></div>
                                    <div class="card">

                                        <form id="addressChangeForm" enctype="multipart/form-data" class="p-4">
                                            @csrf
                                                <div class="card-body overflow-auto" style="max-height: 60vh;">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <label>New Address 1</label>
                                                            <input type="text" name="new_address_1" class="form-control"
                                                                placeholder="Door No, Street" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>New Address 2</label>
                                                            <input type="text" name="new_address_2" class="form-control"
                                                                placeholder="Village, Town, District" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>New Address 3</label>
                                                            <input type="text" name="new_address_3" class="form-control"
                                                                placeholder="State, Country" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>New Pin Code</label>
                                                            <input type="text" name="new_pin_code" class="form-control"
                                                                placeholder="Pin Code" required>
                                                        </div>

                                                        <div class="col-md-6 mb-2">
                                                            <label>Previous Org. Name</label>
                                                            <input type="text" name="prev_org_name" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>Previous Org. Address</label>
                                                            <textarea name="prev_org_address" class="form-control" required></textarea>
                                                        </div>

                                                        <div class="col-md-6 mb-2">
                                                            <label>Present Org. Name</label>
                                                            <input type="text" name="present_org_name"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>Present Org. Address</label>
                                                            <textarea name="present_org_address" class="form-control" required></textarea>
                                                        </div>

                                                        <div class="col-md-6 mb-2">
                                                            <label>Upload Residence Certificate *</label>
                                                            <input type="file" name="upload_residence"
                                                                class="form-control" accept="image/*" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>Upload Photo *</label>
                                                            <input type="file" name="upload_photo"
                                                                class="form-control" accept="image/*" required>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label>Upload Signature *</label>
                                                            <input type="file" name="upload_signature"
                                                                class="form-control" accept="image/*" required>
                                                        </div>
                                                        {{-- <div class="col-md-6 mb-2">
                                                            <label>Upload Blood Group *</label>
                                                            <input type="file" name="upload_bloodgroup"
                                                                class="form-control" accept="image/*" required>
                                                        </div> --}}
                                                        <div class="col-md-6 mb-2">
                                                            <label> Blood Group *</label>
                                                            <input type="text" name="upload_bloodgroup"
                                                                class="form-control"  required>
                                                        </div>
                                                    </div>

                                                </div>
                                            
                                            <div class="card-footer text-muted">
                                                <div class="d-flex justify-content-between mt-4">
                                                    <button class="btn btn-secondary" id="prevTab">Previous</button>
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-track" role="tabpanel"
                                aria-labelledby="vert-tabs-track-tab">
                                <div class="overlay-wrapper">
                                    <div class="row">


                                        <div class="table table-bordered table-hover nowrap">
                                            <table class="table table-bordered" id="addressTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>New Address</th>
                                                        <th>Pin Code</th>
                                                        <th>Previous Org</th>
                                                        <th>Present Org</th>
                                                        <th>upload_residence</th>
                                                        <th>upload_photo</th>
                                                        <th>upload_signature</th>
                                                        <th>bloodgroup</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
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


@stop
{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush
@push('js')
    <script>
        $('#v-pills-track-tab').click(function(e) {
            $('#addressTable').DataTable().ajax.reload();
        });
        $(document).ready(function() {
            $('#addressTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.addresschange.data') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'new_address'
                    },
                    {
                        data: 'new_pin_code'
                    },
                    {
                        data: 'previous_organization'
                    },
                    {
                        data: 'present_organization'
                    },
                    {
                        data: 'upload_residence'
                    },
                    {
                        data: 'upload_photo'
                    },
                    {
                        data: 'upload_signature'
                    },
                    {
                        data: 'upload_bloodgroup'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'actions'
                    }
                ]
            });
        });
        $('#addressChangeForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            $('#responseMsg').html('Submitting...');

            $.ajax({
                url: "{{ route('address.change.store') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,

                success: function(res) {
                    $('#responseMsg').html('<div class="alert alert-success">' + res.message +
                        '</div>');
                    $('#addressChangeForm')[0].reset();
                },

                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorList = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorList += '<li>' + value[0] + '</li>';
                        });
                        errorList += '</ul></div>';
                        $('#responseMsg').html(errorList);
                    } else {
                        $('#responseMsg').html(
                            '<div class="alert alert-danger">Something went wrong. Please try again.</div>'
                        );
                    }
                }
            });
        });
    </script>
    <script>
        function trackRequest(id) {
            $('#trackModalBody').html('Loading...');
            $('#trackModal').modal('show');

            $.ajax({
                url: "{{ route('admin.addresschange.track') }}",
                type: 'get',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Render response data inside the modal
                    $('#trackModalBody').html(response);
                },
                error: function() {
                    $('#trackModalBody').html('<p class="text-danger">Failed to load tracking data.</p>');
                }
            });
        }
    </script>
    <script>
        function viewFilePopup(url) {
            let ext = url.split('.').pop().toLowerCase();
            let content = '';

            if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(ext)) {
                content = `<img src="${url}" class="img-fluid rounded" style="max-height:80vh;" />`;
            } else if (ext === 'pdf') {
                content = `<embed src="${url}" type="application/pdf" width="100%" height="600px">`;
            } else {
                content = `<a href="${url}" target="_blank">Download File</a>`;
            }

            $('#filePreviewBody').html(content);
            $('#fileViewerModal').modal('show');
        }

        $('#addressmodalbtnclose ,#addressfilepreviewbtnclose').click(function(e) {
            $('#trackModal').modal('hide');
            $('#fileViewerModal').modal('hide');

        });
    </script>
@endpush

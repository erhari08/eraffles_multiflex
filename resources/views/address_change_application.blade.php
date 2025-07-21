@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Address Application')
@section('content_header_title', 'Address Application')
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
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover nowrap" id="addressTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>New Address</th>
                                    <th>Pin Code</th>
                                    <th>Previous Org</th>
                                    <th>Present Org</th>
                                    <th>upload_residence</th>
                                    <th>upload_photo</th>
                                    <th>upload_signature</th>
                                    <th>upload_bloodgroup</th>
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


@stop
{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush
@push('js')
    <script>
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
                        data: 'name'
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

        function approveRequest(id) {
            if (confirm('Are you sure to approve this request?')) {
                $.post("{{ route('admin.addresschange.approve') }}", {
                    _token: "{{ csrf_token() }}",
                    id: id
                }, function(res) {
                    alert(res.message);
                    $('#addressTable').DataTable().ajax.reload();
                });
            }
        }

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

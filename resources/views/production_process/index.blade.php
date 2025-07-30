@extends('layouts.master')
@section('subtitle', 'Production Process Report')
@section('content_header_title', 'Production Process Report')
@section('content_body')

    <div class="container-fluid">
        <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
            <div class="card-body overflow-auto">

                <div class="container py-5">

                    <!-- Logo + Title -->
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/4712/4712035.png" width="80" class="mb-2"
                            alt="Logo">
                        <h3 class="fw-bold text-primary">🧠 Smart Process Tracker</h3>
                        <p class="text-muted">Track production stages with real-time status</p>
                    </div>

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs justify-content-center" id="processTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="printing-tab" data-bs-toggle="tab"
                                data-bs-target="#printing" type="button" role="tab">
                                <i class="fas fa-print text-success"></i> Printing
                                <span class="badge bg-success ms-1">✅</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="inspection-tab" data-bs-toggle="tab" data-bs-target="#inspection"
                                type="button" role="tab">
                                <i class="fas fa-search text-success"></i> Inspection
                                <span class="badge bg-success ms-1">✅</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lamination-tab" data-bs-toggle="tab" data-bs-target="#lamination"
                                type="button" role="tab">
                                <i class="fas fa-layer-group text-warning"></i> Lamination
                                <span class="badge bg-warning text-dark ms-1">⏳</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="slitting-tab" data-bs-toggle="tab" data-bs-target="#slitting"
                                type="button" role="tab">
                                <i class="fas fa-cut text-secondary"></i> Slitting
                                <span class="badge bg-secondary ms-1">⏺</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="folding-tab" data-bs-toggle="tab" data-bs-target="#folding"
                                type="button" role="tab">
                                <i class="fas fa-compress-arrows-alt text-secondary"></i> Folding
                                <span class="badge bg-secondary ms-1">⏺</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pouching-tab" data-bs-toggle="tab" data-bs-target="#pouching"
                                type="button" role="tab">
                                <i class="fas fa-box-open text-secondary"></i> Pouching
                                <span class="badge bg-secondary ms-1">⏺</span>
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content p-4 bg-white shadow-sm rounded-bottom" id="processTabsContent">
                        <div class="tab-pane fade show active" id="printing" role="tabpanel">
                            <h5><i class="fas fa-print text-success me-2"></i>Printing</h5>
                            <p>Status: <span class="badge bg-success">✅ Completed</span></p>
                            <p>This process has been successfully completed.</p>
                        </div>
                        <div class="tab-pane fade" id="inspection" role="tabpanel">
                            <h5><i class="fas fa-search text-success me-2"></i>Inspection</h5>
                            <p>Status: <span class="badge bg-success">✅ Completed</span></p>
                            <p>All printed materials passed quality checks.</p>
                        </div>
                        <div class="tab-pane fade" id="lamination" role="tabpanel">
                            <h5><i class="fas fa-layer-group text-warning me-2"></i>Lamination</h5>
                            <p>Status: <span class="badge bg-warning text-dark">⏳ In Progress</span></p>
                            <p>Currently being laminated for protection and durability.</p>
                        </div>
                        <div class="tab-pane fade" id="slitting" role="tabpanel">
                            <h5><i class="fas fa-cut text-secondary me-2"></i>Slitting</h5>
                            <p>Status: <span class="badge bg-secondary">⏺ Pending</span></p>
                            <p>Waiting to begin slitting process.</p>
                        </div>
                        <div class="tab-pane fade" id="folding" role="tabpanel">
                            <h5><i class="fas fa-compress-arrows-alt text-secondary me-2"></i>Folding</h5>
                            <p>Status: <span class="badge bg-secondary">⏺ Pending</span></p>
                            <p>This step will fold the material as per design.</p>
                        </div>
                        <div class="tab-pane fade" id="pouching" role="tabpanel">
                            <h5><i class="fas fa-box-open text-secondary me-2"></i>Pouching</h5>
                            <p>Status: <span class="badge bg-secondary">⏺ Pending</span></p>
                            <p>The final stage to create finished pouches.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" form="pouchReportForm" class="btn text-white" style="background-color: #462A75;">
                    <i class="fas fa-save me-1"></i> Submit Report
                </button>
            </div>
        </div>
    </div>
    

@endsection

@push('css')
    <!-- Bootstrap CSS & FontAwesome -->

    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush



@push('js')
    <script>
        $(document).ready(function() {
            // Add new row
            $('#addRowBtn').click(function() {
                const row = `
            <tr>
                <td><input name="roll_no[]" class="form-control"></td>
                <td><input name="size[]" class="form-control"></td>
                <td><input name="gross_weight[]" class="form-control"></td>
                <td><input name="core_weight[]" class="form-control"></td>
                <td><input name="net_weight[]" class="form-control"></td>
                <td><input name="returned_material[]" class="form-control"></td>
                <td><input name="sealing_tape[]" class="form-control"></td>
                <td><input name="bopp_roll_no[]" class="form-control"></td>
                <td><input name="bopp_size[]" class="form-control"></td>
                <td><input name="bopp_net_wt[]" class="form-control"></td>
                <td><input name="open_reading[]" class="form-control"></td>
                <td><input name="close_reading[]" class="form-control"></td>
                <td><input name="total_pcs[]" class="form-control"></td>
                <td><input name="wastage[]" class="form-control"></td>
                <td><input name="ok_qty[]" class="form-control"></td>
                <td><input name="rejected_qty[]" class="form-control"></td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                </td>
            </tr>`;
                $('#reportTable tbody').append(row);
            });

            // Remove row
            $(document).on('click', '.removeRowBtn', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endpush

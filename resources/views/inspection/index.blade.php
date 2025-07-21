@extends('layouts.master')

@section('subtitle', 'Inspection Report')
@section('content_header_title', 'Inspection Report')
@section('content_header_subtitle', '')

@section('content_body')
<div class="container-fluid">
    <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
        <div class="card-body">
            <form id="inspectionForm">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Operator Name & Signature</label>
                        <input type="text" name="operator" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Assistant Name & Signature</label>
                        <input type="text" name="assistant" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Job Name</label>
                        <input type="text" name="job_name" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Shift</label>
                        <input type="text" name="shift" class="form-control" placeholder="Day/Night">
                    </div>
                </div>

                <!-- Unified Input/Output Table -->
                <h5 class="bg-light border-start border-4 border-warning ps-3 py-2 rounded fw-semibold mb-3">
                    🔄 Input & Output Details
                </h5>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th colspan="4">Input</th>
                                <th colspan="6">Output</th>
                            </tr>
                            <tr>
                                <th>Roll No.</th>
                                <th>Gross</th>
                                <th>Core</th>
                                <th>Net</th>
                                <th>Roll No.</th>
                                <th>Gross</th>
                                <th>Core</th>
                                <th>Net</th>
                                <th>Print Wastage</th>
                                <th>Trim Wastage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Input -->
                                <td><input type="text" name="input_roll[]" class="form-control"></td>
                                <td><input type="number" name="input_gross[]" class="form-control"></td>
                                <td><input type="number" name="input_core[]" class="form-control"></td>
                                <td><input type="number" name="input_net[]" class="form-control"></td>

                                <!-- Output -->
                                <td><input type="text" name="output_roll[]" class="form-control"></td>
                                <td><input type="number" name="output_gross[]" class="form-control"></td>
                                <td><input type="number" name="output_core[]" class="form-control"></td>
                                <td><input type="number" name="output_net[]" class="form-control"></td>
                                <td><input type="number" name="printing_wastage[]" class="form-control"></td>
                                <td><input type="number" name="trimming_wastage[]" class="form-control"></td>
                            </tr>
                            <!-- You can copy <tr>...</tr> to add more rows manually or use JS to add dynamically -->
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="card-footer text-end">
            <button type="submit" form="inspectionForm" class="btn text-white" style="background-color: #462A75;">
                <i class="fas fa-save me-1"></i> Submit Report
            </button>
        </div>
    </div>
</div>
@stop

@push('css')
@endpush

@push('js')
@endpush

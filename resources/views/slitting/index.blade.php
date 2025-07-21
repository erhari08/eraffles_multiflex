@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Slitting-Machine-Report')
@section('content_header_title', 'Slitting Machine Report')
@section('content_header_subtitle', '')
{{-- Content body: main page content --}}

@section('content_body')
<div class="container-fluid">
    <div class="card card-primary card-outline" style="border-top: 5px solid #462A75; max-height: 90vh; display: flex; flex-direction: column;">
        <div class="card-body overflow-auto" style="flex: 1 1 auto;">

            <!-- Form Section -->
            <form id="slittingForm" enctype="multipart/form-data">
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="col-sm-4">
                        <label for="shift" class="form-label">Shift</label>
                        <select class="form-select" id="shift" name="shift">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="machine_no" class="form-label">Machine No</label>
                        <input type="text" class="form-control" id="machine_no" name="machine_no">
                    </div>

                    <div class="col-sm-6">
                        <label for="operator_name" class="form-label">Operator Name</label>
                        <input type="text" class="form-control" id="operator_name" name="operator_name">
                    </div>
                    <div class="col-sm-6">
                        <label for="job_order_no" class="form-label">Job Order No</label>
                        <input type="text" class="form-control" id="job_order_no" name="job_order_no">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 mb-3 bg-light border-start border-4 border-warning ps-3 py-2 rounded">
                    <h5 class="mb-0 fw-semibold">📄 Slitting Details</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="addSlittingRow">➕ Add Row</button>
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
                                <td><input type="number" name="input_weight[]" class="form-control" step="any"></td>
                                <td><input type="text" name="output_roll_no[]" class="form-control"></td>
                                <td><input type="number" name="output_weight[]" class="form-control" step="any"></td>
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
        <div class="card-footer text-end">
            <button type="submit" form="slittingForm" class="btn text-white" style="background-color: #462A75;">
                <i class="fas fa-save me-1"></i> Submit Report
            </button>
        </div>
    </div>
</div>
@stop

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#addSlittingRow').click(function() {
            const row = `
                <tr>
                    <td><input type="text" name="input_roll_no[]" class="form-control"></td>
                    <td><input type="number" name="input_weight[]" class="form-control" step="any"></td>
                    <td><input type="text" name="output_roll_no[]" class="form-control"></td>
                    <td><input type="number" name="output_weight[]" class="form-control" step="any"></td>
                    <td><input type="text" name="width[]" class="form-control"></td>
                    <td><input type="text" name="remarks[]" class="form-control"></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger removeRowBtn">🗑</button>
                    </td>
                </tr>`;
            $('#slittingTable tbody').append(row);
        });

        $(document).on('click', '.removeRowBtn', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush

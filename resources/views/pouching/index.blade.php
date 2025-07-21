@extends('layouts.master')
@section('subtitle', 'Side Seal Pouch Report')
@section('content_header_title', 'Side Seal Pouch Report')
@section('content_body')

<div class="container-fluid">
    <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
        <div class="card-body overflow-auto">

            {{-- Basic Info --}}
            <form id="pouchReportForm">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Operator Name & Signature</label>
                        <input type="text" name="operator_signature" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Assistant Name & Signature</label>
                        <input type="text" name="assistant_signature" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="report_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Shift</label>
                        <select name="shift" class="form-select">
                            <option value="Day">Day</option>
                            <option value="Night">Night</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name of Job</label>
                        <input type="text" name="job_name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Size of Job</label>
                        <input type="text" name="job_size" class="form-control">
                    </div>
                </div>

                {{-- Table Section --}}
                <div class="d-flex justify-content-between align-items-center mt-4 mb-2 bg-light border-start border-4 border-success ps-3 py-2 rounded">
                    <h5 class="mb-0 fw-semibold">📦 Input / Output Details</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="addRowBtn">➕ Add Row</button>
                </div>

                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table table-bordered align-middle small" id="reportTable">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Roll No.</th>
                                <th>Size (W × Micron)</th>
                                <th>Gross Wt.</th>
                                <th>Core Wt.</th>
                                <th>Net Wt.</th>
                                <th>Returned</th>
                                <th>Sealing Tape (Rolls)</th>
                                <th>BOPP Roll No.</th>
                                <th>Size</th>
                                <th>BOPP Net Wt.</th>
                                <th>Opening</th>
                                <th>Closing</th>
                                <th>Total Pcs</th>
                                <th>Wastage</th>
                                <th>OK Qty</th>
                                <th>Rejected</th>
                                <th>🗑</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </form>
        </div>

        <div class="card-footer text-end">
            <button type="submit" form="pouchReportForm" class="btn text-white" style="background-color: #462A75;">
                <i class="fas fa-save me-1"></i> Submit Report
            </button>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        // Add new row
        $('#addRowBtn').click(function () {
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
        $(document).on('click', '.removeRowBtn', function () {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush

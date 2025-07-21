@extends('layouts.master')

@section('subtitle', 'Folding Machine Report')
@section('content_header_title', 'Folding Machine Report')
@section('content_header_subtitle', '')

@section('content_body')
<div class="container-fluid">
    <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
        <div class="card-body">
            <form method="POST" >
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name & Signature of Operator(s)</label>
                        <input type="text" class="form-control" name="operator_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name & Signature of Assistant(s)</label>
                        <input type="text" class="form-control" name="assistant_name">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Machine Name</label>
                        <input type="text" class="form-control" name="machine_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Job Code</label>
                        <input type="text" class="form-control" name="job_code">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Job Quantity</label>
                        <input type="text" class="form-control" name="job_quantity">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Name of Job</label>
                        <input type="text" class="form-control" name="job_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Size of Job</label>
                        <input type="text" class="form-control" name="job_size">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="report_date">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Shift</label>
                        <input type="text" class="form-control" name="shift">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Time In</label>
                        <input type="time" class="form-control" name="time_in">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Time Out</label>
                        <input type="time" class="form-control" name="time_out">
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered text-nowrap table-sm align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th rowspan="2">ROLL No.</th>
                                <th colspan="4">PLAIN / PRINTED BOPP</th>
                                <th colspan="5">PEARLISED BOPP</th>
                                <th colspan="5">OUTPUT</th>
                            </tr>
                            <tr>
                                <th>SIZE (W×μ)</th>
                                <th>GROSS WT.</th>
                                <th>CORE WT.</th>
                                <th>NET RETURNED</th>

                                <th>ROLL No.</th>
                                <th>SIZE (W×μ)</th>
                                <th>GROSS WT.</th>
                                <th>CORE WT.</th>
                                <th>CONSUMED WT.</th>

                                <th>ROLL No.</th>
                                <th>GROSS WT.</th>
                                <th>CORE WT.</th>
                                <th>NET WT.</th>
                                <th>WASTAGE</th>
                            </tr>
                        </thead>
                        <tbody id="reportBody">
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][plain_roll_no]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][film_size]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][gross_weight_plain]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][core_weight_plain]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][net_returned_plain]"></td>

                                <td><input type="text" class="form-control form-control-sm" name="roll[0][pearl_roll_no]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][pearl_size]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][gross_weight_pearl]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][core_weight_pearl]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][consumed_weight]"></td>

                                <td><input type="text" class="form-control form-control-sm" name="roll[0][output_roll_no]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][gross_weight_output]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][core_weight_output]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][net_weight_output]"></td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[0][wastage]"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="addRowBtn" class="btn btn-outline-primary btn-sm">➕ Add Row</button>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="form-label">Wastage Quantity (kg/mtrs)</label>
                        <input type="text" class="form-control" name="wastage_quantity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Final Signature (Supervisor/QC)</label>
                        <input type="text" class="form-control" name="final_signature">
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" name="remarks" rows="3"></textarea>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn text-white" style="background-color: #462A75;">
                        <i class="fas fa-save me-1"></i> Submit Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    let rowIndex = 1;
    document.getElementById('addRowBtn').addEventListener('click', () => {
        const tableBody = document.getElementById('reportBody');
        const newRow = tableBody.rows[0].cloneNode(true);
        Array.from(newRow.querySelectorAll('input')).forEach(input => {
            input.value = '';
            input.name = input.name.replace(/\[\d+\]/, `[${rowIndex}]`);
        });
        tableBody.appendChild(newRow);
        rowIndex++;
    });
</script>
@endpush

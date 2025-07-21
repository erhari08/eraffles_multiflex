@extends('layouts.master')

@section('subtitle', 'Lamination Machine Report')
@section('content_header_title', 'Lamination Machine Report')
@section('content_header_subtitle', '')

@section('content_body')
<div class="container-fluid">
    <div class="card card-primary card-outline" style="border-top: 5px solid #462A75;">
        <div class="card-body">
            <form id="laminationForm">
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
                        <label class="form-label">Name of Job</label>
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

                <h5 class="bg-light border-start border-4 border-warning ps-3 py-2 rounded fw-semibold mb-3">
                    🔄 Input & Output (Roll-wise)
                </h5>

                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th colspan="6">Printed Film (Input)</th>
                                <th colspan="6">LD/MET PET/MET BOPP (Input)</th>
                                <th colspan="6">Laminated Film (Output)</th>
                            </tr>
                            <tr>
                                <!-- Printed Film -->
                                <th>Roll No</th>
                                <th>Size</th>
                                <th>Gross</th>
                                <th>Core</th>
                                <th>Net Consumed</th>
                                <th>Returned</th>

                                <!-- LD/MET -->
                                <th>Roll No</th>
                                <th>Size</th>
                                <th>Gross</th>
                                <th>Core</th>
                                <th>Net Consumed</th>
                                <th>Returned</th>

                                <!-- Laminated Output -->
                                <th>Roll No</th>
                                <th>Gross</th>
                                <th>Core</th>
                                <th>Net</th>
                                <th>Lamination Wastage</th>
                                <th>Plain Film Wastage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Printed Film Input -->
                                <td><input type="text" name="printed_roll[]" class="form-control"></td>
                                <td><input type="text" name="printed_size[]" class="form-control"></td>
                                <td><input type="number" name="printed_gross[]" class="form-control"></td>
                                <td><input type="number" name="printed_core[]" class="form-control"></td>
                                <td><input type="number" name="printed_net[]" class="form-control"></td>
                                <td><input type="number" name="printed_returned[]" class="form-control"></td>

                                <!-- LD/MET Input -->
                                <td><input type="text" name="ld_roll[]" class="form-control"></td>
                                <td><input type="text" name="ld_size[]" class="form-control"></td>
                                <td><input type="number" name="ld_gross[]" class="form-control"></td>
                                <td><input type="number" name="ld_core[]" class="form-control"></td>
                                <td><input type="number" name="ld_net[]" class="form-control"></td>
                                <td><input type="number" name="ld_returned[]" class="form-control"></td>

                                <!-- Laminated Film Output -->
                                <td><input type="text" name="output_roll[]" class="form-control"></td>
                                <td><input type="number" name="output_gross[]" class="form-control"></td>
                                <td><input type="number" name="output_core[]" class="form-control"></td>
                                <td><input type="number" name="output_net[]" class="form-control"></td>
                                <td><input type="number" name="lam_waste[]" class="form-control"></td>
                                <td><input type="number" name="plain_waste[]" class="form-control"></td>
                            </tr>
                            <!-- Duplicate rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Chemical Issued Qty -->
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label class="form-label">Ethyl Acetate</label>
                        <input type="text" name="ethyl_acetate" class="form-control" placeholder="Qty">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Adhesive</label>
                        <input type="text" name="adhesive" class="form-control" placeholder="Qty">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Hardener</label>
                        <input type="text" name="hardener" class="form-control" placeholder="Qty">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Diesel</label>
                        <input type="text" name="diesel" class="form-control" placeholder="Qty">
                    </div>
                </div>

                <!-- Remarks -->
                <div class="row mt-4">
                    <div class="col-12">
                        <label class="form-label">Remarks</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer text-end">
            <button type="submit" form="laminationForm" class="btn text-white" style="background-color: #462A75;">
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

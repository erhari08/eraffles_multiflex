@extends('adminlte::page')

@section('title', 'User Registration')

@section('content_header')
    <h1>User Registration</h1>
@stop

@section('content')
<form id="userForm">
    <ul class="nav nav-tabs" id="tabMenu">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1">Personal Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2">Contact Info</a>
        </li>
    </ul>

    <div class="tab-content border p-3">
        <!-- Tab 1 -->
        <div class="tab-pane fade show active" id="tab1">
            <div class="form-group">
                <label for="name">Full Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="button" class="btn btn-primary next-tab">Next</button>
        </div>

        <!-- Tab 2 -->
        <div class="tab-pane fade" id="tab2">
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="button" class="btn btn-secondary prev-tab">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@stop

@section('js')
    <!-- Load only the plugin, not jQuery again -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            console.log("Validation function:", typeof $.fn.validate); // Should be "function"

            $('#userForm').validate({
                rules: {
                    name: { required: true },
                    email: { required: true, email: true }
                }
            });
        });
    </script>
@stop


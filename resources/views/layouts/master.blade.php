@extends('adminlte::page')
{{-- Extend and customize the browser title --}}
@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop
{{-- Extend and customize the page content header --}}
@section('content_header')
    @hasSection('content_header_title')
        <div class="d-flex" >
            
            <h1 class="text-muted">
                @yield('content_header_title')
                @hasSection('content_header_subtitle')
                    <small class="text-dark">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                        @yield('content_header_subtitle')
                    </small>
                @endif
            </h1>
            <img src="{{ asset('storage/multiflex/logo/logo.png') }}" alt="Multiflex Logo" class="img-fluid ms-auto"
                style="height: 60px;">
        </div>



    @endif

@stop
{{-- Rename section content to content_body --}}
@section('content')
    <!-- Full Page Loader Overlay -->
    <div id="formLoader"
        style="display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.5);z-index: 9999;display: flex;align-items: center;justify-content: center;flex-direction: column;text-align: center;">
        <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div style="margin-top: 10px; color: white;">Loading your application, please wait...</div>
    </div>
    
    @yield('content_body')
    
@stop

{{-- Create a common footer --}}
@section('footer')
    {{-- <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div> --}}
    {{-- <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong> --}}
@stop
{{-- Add common Javascript/Jquery code --}}
@push('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap Bundle (AdminLTE uses this) -->
    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <!-- Required for Excel/PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


    <script>
        let timeout;

        // 🔄 Keep Laravel session alive every 2 minutes
        setInterval(() => {
            fetch("{{ route('keep-alive') }}", {
                credentials: 'same-origin'
            }).catch(err => console.warn('Keep-alive failed', err));
        }, 15 * 60 * 1000); // 2 minutes

        // 🔐 Auto logout after 5 minutes of inactivity
        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                // alert("You have been inactive. Logging out...");
                // window.location.href = "{{ route('auto.logout') }}";
                window.location.href = "{{ url('/') }}";

                // document.getElementById('logout-form').submit();
            }, 15 * 60 * 1000); // 5 minutes
        }

        // ⏱ Track user activity
        window.onload = resetTimer;
        window.onmousemove = resetTimer;
        window.onkeypress = resetTimer;
        window.onclick = resetTimer;
        window.ontouchstart = resetTimer;
    </script>


    <script>
        //    $('#multiStepForm input[type="text"], #multiStepForm textarea').prop('readonly', true);
        //     $('#multiStepForm input[type="file"], #multiStepForm input[type="radio"], #multiStepForm input[type="number"], #multiStepForm input[type="date"], #multiStepForm select')
        //         .prop('disabled', true);
        $(document).ready(function() {
            $('#formLoader').hide();


        });
        $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
            if (jqxhr.status === 419) {
                alert('Session expired! Logging out...');
                // window.location.href = "/logout";
                //  window.location.href = "{{ route('auto.logout') }}";

            }
        });
    </script>
@endpush
{{-- Add common CSS customizations --}}
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

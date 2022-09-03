<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
<!-- Content Wrapper -->
<div class="login-wrapper">
    <div class="back-link">
        <a href="{{ url('/') }}" class="btn btn-success">Homepage</a>
    </div>
    @yield('content')
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#btnloader").hide();
        $("#registerBtn").click(function(){
            $("#btnloader").show();
        });
    });
</script>
</body>

</html>

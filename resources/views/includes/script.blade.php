<!-- Bootstrap core JavaScript-->
<script src="{{asset ('/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset ('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset ('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset ('/admin/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->


<!-- Page level custom scripts -->

{{-- <script src="{{asset ('/admin/js/demo/chart-pie-demo.js')}}"></script> --}}
{{-- <script src="{{asset ('/admin/js/demo/chart-pie.js')}}"></script> --}}

<!-- SweetAlert IziToast-->
<script src="{{ asset('/admin/dist/js/iziToast.js')}}">
</script>


@if (session('success'))
<script>
    iziToast.success({
        title: 'INFO!!!',
        message: "{{ session('success') }}"
    });
</script>
@endif

@if (session('delete'))
<script>
    iziToast.warning({
        title: 'INFO!!!',
        message: "{{ session('delete') }}"
    });
</script>
@endif

@if (session('error'))
<script>
    iziToast.error({
        title: 'INFO!!!',
        message: "{{ session('error') }}"
    });
</script>
@endif
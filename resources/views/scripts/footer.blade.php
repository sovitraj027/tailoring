

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


@if(Session::has('success') || Session::has('error'))

<!-- BEGIN THEME GLOBAL STYLE -->

<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>

<!-- END THEME GLOBAL STYLE -->



<script>
    // $('.mixin').on('click', function () {
      const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        padding: '2em'
      });

      toast({
        type: "{{session("success") ? 'success' : 'error'}}",
        title: "{{session("success") ?? session("error")}}",
        padding: '2em',
      })

    // })
</script>
@endif
<script>
    $(document).ready(function() {
        App.init();
    });


</script>

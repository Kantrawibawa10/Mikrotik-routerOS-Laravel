<!-- Vendor JS Files -->
<script src="{{ URL::to('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ URL::to('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ URL::to('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Template Main JS File -->
<script src="{{ URL::to('assets/js/main.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
</script>


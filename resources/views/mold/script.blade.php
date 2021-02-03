        <script src="../../dist/plugins/jquery/jquery.min.js" data-turbolinks-track="reload"></script>

<!-- Bootstrap 4 -->
<script src="../../dist/plugins/bootstrap/js/bootstrap.bundle.min.js" data-turbolinks-track="reload"></script>
<!-- Select2 -->
<script src="../../dist/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../dist/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../dist/plugins/moment/moment.min.js"></script>
<script src="../../dist/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../dist/plugins/daterangepicker/daterangepicker.js" data-turbolinks-track="reload"></script>
<!-- bootstrap color picker -->
<script src="../../dist/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../dist/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../dist/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../dist/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js" data-turbolinks-track="reload"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js" data-turbolinks-track="reload"></script>
    <!-- DataTables  & dist/plugins -->
    <script src="../../dist/plugins/datatables/jquery.dataTables.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-responsive/js/dataTables.responsive.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-buttons/js/dataTables.buttons.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/jszip/jszip.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/pdfmake/pdfmake.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/pdfmake/vfs_fonts.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-buttons/js/buttons.html5.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-buttons/js/buttons.print.min.js" data-turbolinks-track="reload"></script>
    <script src="../../dist/plugins/datatables-buttons/js/buttons.colVis.min.js" data-turbolinks-track="reload"></script>
    
    <!-- Page specific script -->
    <script  data-turbolinks-track="reload">
      $(document).on('turbolinks:load',function() {
    //infinite_scroll()
    console.log('turbolinks:load fired');
});
        $(function () {
            var t = $("#tabel1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,"fixedColumns": false,
                "buttons": ["copy", "excel",{extend: 'pdf', orientation: 'landscape',columns: ':visible'}, "print", "colvis",],
                // "buttons": ["copy", "csv", "excel",{extend: 'pdfHtml5', orientation: 'landscape'}, "print", "colvis",],
                "columnDefs": [ {"searchable": false, "orderable": false, "targets": 0 } ], 
                "order": [[ 1, 'asc' ]]
            }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // // for sidebar menu and treeview
    //$('ul.nav-treeview a').filter(function () {
      //  return this.href == url;
    //}).parentsUntil(".nav-sidebar > .nav-treeview")
        // .css({'display': 'block'})
        // .addClass('menu-open').prev('a')
        // .addClass('active');
    
});

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#tgl_mulai').datetimepicker({
        format: 'YYYY/MM/DD'
    });
    $('#tgl_selesai').datetimepicker({
        format: 'YYYY/MM/DD'  
    });
    //Date range picker 
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'DD/MM/YYYY'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#dropzone1");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>

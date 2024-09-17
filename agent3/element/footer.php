
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets2/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
    
    <!-- Bootstrap tether Core JavaScript -->
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets2/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets2/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets2/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets2/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets2/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets2/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets2/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets2/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets2/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets2/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      
    </script>
    
    <footer class="footer text-center">
          All Rights Reserved by Ispark Data Connect and Developed by
          <a href="https://www.dialdesk.in">Dialdesk</a>.
        </footer>
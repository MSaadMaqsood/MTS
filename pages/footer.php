    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <!-- Anything you want -->
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <a href="">AL-SYED.org</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)

    //Selection input js
    $(document).ready(function() {
        $('#exampleSelectBorder').select2();
    });
    $(document).ready(function() {
        $('#exampleSelectBorder2').select2();
    });

    //Dashboard shortcut js
    document.onkeydown = function KeyPress(e) {
      var evtobj = window.event? event : e
      if (evtobj.keyCode == 65 && evtobj.altKey) window.location.href="dashboard.php"; // ALT + a
      else if (evtobj.keyCode == 71 && evtobj.altKey) window.location.href="salesReport.php"; // ALT + g
      else if (evtobj.keyCode == 73 && evtobj.altKey) window.location.href="bookReport.php"; // ALT + i
      else if (evtobj.keyCode == 74 && evtobj.altKey) window.location.href="purchaseReport.php"; // ALT + j
      else if (evtobj.keyCode == 67 && evtobj.altKey) window.location.href="category.php"; // ALT + c
      else if (evtobj.keyCode == 80 && evtobj.altKey) window.location.href="addBook.php"; // ALT + p
      else if (evtobj.keyCode == 76 && evtobj.altKey) window.location.href="bookList.php"; // ALT + l
      else if (evtobj.keyCode == 83 && evtobj.altKey) window.location.href="orderStatus.php"; // ALT + s
      else if (evtobj.keyCode == 66 && evtobj.altKey) window.location.href="orderList.php"; // ALT + b
      else if (evtobj.keyCode == 90 && evtobj.altKey) window.location.href="changePassword.php"; // ALT + z
      else if (evtobj.keyCode == 88 && evtobj.altKey) window.location.href="changeEmail.php"; // ALT + x
      else if (evtobj.keyCode == 72 && evtobj.altKey) window.location.href="help.php"; // ALT + h
      else if (evtobj.keyCode == 190 && evtobj.altKey) window.location.href="logout.php"; // ALT + .
    }

    //Search item in table js
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    //Subtraction in js
    setInterval(subtract, 100);

    function subtract() {
        var num1 = parseInt(document.getElementsByClassName("a1")[0].value);
        var num2 = parseInt(document.getElementsByClassName("a2")[0].value);

        var result = num1 - num2;

        if (!isNaN(result)) {
            document.getElementsByClassName("ra")[0].value = result;   
        }
        else document.getElementsByClassName("ra")[0].value = num1;
    }

    subtract();

    //History Deletion
    if ( window.history.replaceState ) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<!-- Window reload form resolve -->
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href);
}
</script>
<footer>
  <div class="pull-right">
    @ Made By Fahmi Aquinas
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<script type="text/javascript">
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}



  function isInputChar(evt) {
    var char = String.fromCharCode(evt.which);
    if (!(/[a-z]/[A-Z]/.test(char))) {
      evt.preventDefault();

    }

  }

</script>
<script type="text/javascript">
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}

setInputFilter(document.getElementById("nis"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("tahun_ajaran"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("agama"), function(value) {
  return /^\D*$/.test(value); });
setInputFilter(document.getElementById("nama_depan"), function(value) {
  return /^\D*$/.test(value); });
setInputFilter(document.getElementById("nama_belakang"), function(value) {
  return /^\D*$/.test(value); });
setInputFilter(document.getElementById("nama_industri"), function(value) {
  return /^\D*$/.test(value); });
setInputFilter(document.getElementById("tempat_lahir"), function(value) {
  return /^\D*$/.test(value); });

  function isInputNumber(evt) {
    var char = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(char))) {
      evt.preventDefault();

    }

  }

</script>

<script type="text/javascript">

$(function(){

$.ajaxSetup({
 type:"post",
 cache:false,
 dataType: "json"
})

$(document).on("click",".aktifasi",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi",
   text:"Yakin akan konfirmasi siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/aktifasi_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();

       });

     }
    });
    location.reload();
 });

});

$(document).on("click",".hapus-siswa",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Hapus Siswa",
   text:"Yakin akan menghapus data siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "hapus",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/hapus_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});



$(document).on("click",".administrasi-siswa",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi Siswa",
   text:"Yakin akan konfirmasi data siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/administrasi_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                messageTop: 'This print was produced using the Print button for DataTables'
            }
        ]
    } );
} );
$(document).on("click",".nilai-siswa",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi Siswa",
   text:"Yakin akan konfirmasi data siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/nilai_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});
$(document).on("click",".pinjam-siswa",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi Siswa",
   text:"Yakin akan konfirmasi data siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/administrasi_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});

$(document).on("click",".batal_siswa",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Batalkan Siswa",
   text:"Yakin akan menghapus data siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "hapus",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/batal_siswa'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});

$(document).on("click",".hapus-industri",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Hapus industri",
   text:"Yakin akan menghapus data industri ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "hapus",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/hapus_industri'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
    location.reload();
 });
});

});
</script>
<script src="<?php echo base_url(); ?>assets/vendor/tilt/tilt.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
<script >
  $('.js-tilt').tilt({
    scale: 1.1
  })
</script>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->

<!-- jQuery Sparklines -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Flot -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/dashboard/build/js/custom.min.js"></script>
</body>
</html>

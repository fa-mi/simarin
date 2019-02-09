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

$(function(){

$.ajaxSetup({
 type:"post",
 cache:false,
 dataType: "json"
})

$(document).on("click",".update",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"update",
   text:"Masukkan nama industri",
   type: "input",
   showCancelButton: true,
   confirmButtonText: "update",
   closeOnConfirm: true,
   inputPlaceholder: "Nama Industri"
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/update'); ?>",
     data:{id:id},
     type: "POST",
    });
 });

});

$(document).on("click",".validasi",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Validasi",
   text:"Yakin akan validasi siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "validasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_guru/validasi'); ?>",
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
   title:"Hapus Industri",
   text:"Yakin akan menghapus data ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Hapus",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/delete'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
 });
});

});
</script>

<!-- jQuery -->

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

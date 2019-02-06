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

$(document).on("click",".konfirmasi",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi",
   text:"Yakin akan konfirmasi siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/konfirmasi'); ?>",
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
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/dashboard/build/js/custom.min.js"></script>
</body>
</html>
